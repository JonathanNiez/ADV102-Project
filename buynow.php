<?php
require_once "controllerUserData.php";

//Read
$id = $_POST['id'];
$query = "SELECT * FROM products WHERE ProductID = '$id'";
$result = mysqli_query($con, $query);

$email = $_SESSION['email'];
if($email == false){
  header('Location:login.php');
}else{
    $sql = "SELECT * FROM adv102_projectv2 WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet">
    <script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - ComEx</title>
</head>
<body>
    <section class="header" id="header">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="images/logo.png" alt="logo">
                </div>
                <?php if(!isset($_SESSION['email'])){
                ?>
                <?php } ?>
                <div class="col">                 
                    <div class="search-logo">
                        <img src="images/searchicon.png" alt="searchicon">
                    </div>
                </div>    
                <?php if(isset($_SESSION['email'])){
                ?>
                <div class="col-2">
                    <div class="user-name">
                       <h3 class="text-center"><?php echo $fetch_info['name'] ?></h3>
                    </div>
                </div>  
                <div class="col-2">
                <a href="index.php">
                <div class="home-logo">
                    <img src="images/homelogo.png" alt="home-logo">
                </div>
                </a>
            </div>      
                <div class="col">
                <div class="logout-logo">
                    <a href="logout.php">
                        <img src="images/logoutlogo.png" alt="logout">
                    </a>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
</section>

<section class="top-page">
    <div class="items">
    <div class="container">
            <div class="buynow-grid-container" id="productContainer">
            <?php while ($rows=mysqli_fetch_assoc($result)){?>
                <div class="col">
                    <div class="games-card">
                        <div class="game-image">
                        <img src="<?php echo $rows['ProductImage']; ?>" alt="game1">
                        </div>
                        <div class="game-price">
                            <h3>₱ <?php echo $rows['Price']; ?></h3>
                        </div>
                        <div class="game-name">
                            <h3 class="text-center"><?php echo $rows['ProductName']; ?></h3>
                        </div>
                    <div class="games-card-overlay">
                        <form action="#" method="POST">
                        <input type="hidden" name="id" value="<?php echo $rows['ProductID']; ?>">
                        <button class="btn btn-info btn-lg remove" name="buynow" type="remove">Remove</button>
                        </form>
                        
                    </div>
                    </div>
                </div>
            </div>
            <div class="checkout">
               <div class="totalprice">
               <h3 class="text-center"><?php echo $rows['ProductName']; ?></h3>
               <h3 class="text-center">₱ <?php echo $rows['Price']; ?></h3>
               </div> 
               <a style="text-decoration: none;" href="purchased.php">
               <button class="btn btn-info btn-lg mx-auto d-block placeorder">Place Order</button>
               </a>
               <a style="text-decoration: none;" href="index.php">
                <button style="margin-top: 20px; margin-bottom: 30px;" class="btn btn-danger btn-lg mx-auto d-block cancelorder">Cancel</button>
               </a>
            </div>
            <?php
            }
            ?>
    </div>
    </div>                   
    </section>

    <section class="bottom-page">
        <div class="container">
            <div class="row">
                <div class="col">
                <div class="creators-name">
            <p class="text-center">Website Created by Jonathan A. Niez Jr. & Louis Andrew Roque ™</p>
                </div>
                </div>
            </div>
        </div>
        <a href="#header">
        <div class="back-to-top">
                <p class="text-center">Back to Top</p>
        </div>
    </a>
    </section>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>