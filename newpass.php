<?php
require_once "controllerUserData.php";

$email = $_SESSION['email'];
if($email == false){
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="verpage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - ComEx</title>
</head>
<body>
<div class="wrapper">
         <div class="title">
            Reset your Password
         </div>
         <form method="POST" action="newpass.php">
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
               <input type="password" name="password" id="password" required>
               <label>Create New Password</label>
            </div>
            <div class="field">
               <input type="password" name="cpassword" id="confirmpassword" required>
               <label>Confirm New Password</label>
            </div>
            <div class="content">
            <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off" onclick="showPassword()">
            <label class="btn btn-primary" for="btn-check">Show Password</label>             
             </div>
            <div class="field">
                    <input type="submit" name="change-password" value="Reset Password">
            </div>
         </form>
      </div>
      <script type="text/javascript">
         function showPassword(){
            var show = document.getElementById('password');
            var cshow = document.getElementById('confirmpassword');
            if (show.type == 'password'){
               show.type = 'text';
               cshow.type = 'text';
            } 
            else{
               show.type = 'password';
               cshow.type = 'password';
            }
         }
      </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>