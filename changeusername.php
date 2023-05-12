<?php
require_once "controllerUserData.php";

$email = $_SESSION['email'];
if(isset($_POST['change-username'])){
    $newusername = mysqli_real_escape_string($con, $_POST['newusername']);
        $update_sql = "UPDATE adv102_projectv2 SET name = '$newusername' WHERE email = '$email'";
        $run_query =  mysqli_query($con, $update_sql);
        if($run_query){
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Username Changed Successfully');
            window.location.href='accman.php';
            </script>");
        }else{
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Username Failed to Change');
            window.location.href='accman.php';
            </script>");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="verpage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Username - ComEx</title>
</head>
<body>
<div class="wrapper">
         <div class="title">
            Change Username
         </div>
         <form method="POST" action="changeusername.php">
         <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

            <div class="field">
            <input type="text" name="newusername" id="newusername" required>
               <label>Enter New Username</label>

            </div>
            <div class="field">
                    <input type="submit" name="change-username" value="Change Username">
            </div>
            <div class="field">
                <a href="accman.php"><input type="button" value="Cancel"></a>
            </div>
         </form>
      </div>

</body>
</html>