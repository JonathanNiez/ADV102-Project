<?php 
require_once "controllerUserData.php";

$email = $_SESSION['email'];
    $sql = "SELECT * FROM adv102_projectv2 WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="accman.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Account - ComEx</title>
</head>
<body>
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="images/logo.png" alt="logo">
                </div>
                <div class="col-8">
                    <h2 class="text-center">Manage Account</h2>
                </div>
                <div class="col">
                    <div class="home-logo">
                        <a href="index.php">
                            <img src="images/homelogo.png" alt="homelogo">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="logout-logo">
                        <a href="logout.php">
                            <img src="images/logoutlogo.png" alt="logout">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top-page">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="user-info">
                        <div class="userinfo-name">
                            <h1 class="text-center"><?php echo $fetch_info['name'] ?></h1>
                        </div>
                        <form action="changeusername.php" method="POST">
                        <div class="change-username">
                        <button class="btn btn-info" name="change-user"><p class="text-center">Change Username</p>        
                        </button>
                        </div>
                        </form>
                        <form action="changepassword.php">
                        <div class="change-password">
                        <button class="btn btn-warning" name="change-pass"><p class="text-center">Change Password</p>        
                        </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                </div>
            </div>
        </div>
    </section>

    <section class="bottom-page">
        <div class="creator-names">
            <p class="text-center">Website Created by Jonathan A. Niez Jr. & Louis Andrew Roque</p>

        </div>

    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>