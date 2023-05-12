<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//Signup
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm Password not Matched";
    }
    $email_check = "SELECT * FROM adv102_projectv2 WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email is Already Used";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "Not Verified";
        $insert_data = "INSERT INTO adv102_projectv2 (name, email, password, code, status) values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            header('Location: verpage.php');
        }else{
            $errors['db-error'] = "Signup Failed";
        }
    }
}
    //Verification code
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM adv102_projectv2 WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'Verified';
            $update_otp = "UPDATE adv102_projectv2 SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location:index.php');
                exit();
            }else{
                $errors['otp-error'] = "Updating Code Failed";
            }
        }else{
            $errors['otp-error'] = "Incorrect Code";
        }
    }

    //Login
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM adv102_projectv2 WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'Verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location:index.php');
                }
                else if($status == 'Deactivated'){
                    header('location:accountdeac.html');
                }
                else{
                    $info = "Your Email is not Verified - $email";
                    $_SESSION['info'] = $info;
                    header('location: verpage.php');
                }
            }else{
                $errors['email'] = "Incorrect Email or Password";
            }
        }else{
            $errors['email'] = "It looks like you're not yet a member. Click Signup";
        }
    }

    //Forgot Password
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM adv102_projectv2 WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE adv102_projectv2 SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                header('Location: resetpasscode.php');
            }else{
                $errors['db-error'] = "Something went Wrong";
            }
        }else{
            $errors['email'] = "Email Address does not Exist";
        }
    }
        
    //Password code
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM adv102_projectv2 WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Create a New Password";
            $_SESSION['info'] = $info;
            header('location: newpass.php');
            exit();
        }else{
            $errors['otp-error'] = "Incorrect Code";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Password not Matched";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE adv102_projectv2 SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your Password has Successfully Changed";
                $_SESSION['info'] = $info;
                header('Location: passchangesuccess.php');
            }else{
                $errors['db-error'] = "Failed to Change your Password";
            }
        }
    }
    
    //Change Password
    if(isset($_POST['change-new-password'])){
        $email = $_SESSION['email'];
        $newpass = mysqli_real_escape_string($con, $_POST['newpass']);
        $newconpass = mysqli_real_escape_string($con, $_POST['newconpass']);
        $encnewpass = password_hash($newpass, PASSWORD_BCRYPT);
        if ($newpass !== $newconpass){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Confirm Password did Not Matched');
            window.location.href='changepassword.php';
            </script>");
        }else{
            $update_sql = "UPDATE adv102_projectv2 SET password = '$encnewpass' WHERE email = '$email'";
            $run_query =  mysqli_query($con, $update_sql);
            if($run_query){
                header('location:passchangesuccess.php');
            }else{
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Password Failed to Change');
                window.location.href='accman.php';
                </script>");
            }
        }
        }
    

   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location:login.php');
    }

    
    if(isset($_POST['go-home'])){
        header('location:gohome.php');
    }
?>