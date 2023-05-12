<?php
require_once "controllerUserData.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>ComEx - Sign-up</title>
      <link rel="stylesheet" href="signup.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
    </script>
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
           ComEx Signup
         </div>
                 
         <form method="POST" action="signup.php">
         <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }else if(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
            <div class="field">
               <input type="text" name="name" required>
               <label>Username</label>
            </div>
            <div class="field">
               <input type="email" name="email" required>
               <label>Email</label>
            </div>
            <div class="field">
               <input id="password" type="password" name="password" required>
               <label>Password</label>
            </div>
            <div class="field">
               <input id="confirmpassword" type="password" name="cpassword" required>
               <label>Confirm Password</label>
            </div>
            <div class="content">
            <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off" onclick="showPassword()">
            <label class="btn btn-primary" for="btn-check">Show Password</label>             
             </div>
            <div class="field">
                    <input type="submit" name="signup" value="Sign-up">
            </div>
            <div class="signup-link">
               Already a Member? <a href="login.php">Login now</a>
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