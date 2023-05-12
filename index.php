<?php
require_once "controllerUserData.php";

$email = $_SESSION['email'];
$sql = "SELECT * FROM adv102_projectv2 WHERE email = '$email'";
$run_Sql = mysqli_query($con, $sql);
if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
}    

//Read
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet">
    <meta charset="UTF-8">
    <script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComEx - Home of the Best and Cheap Video Games</title>
</head>
<body>
    <section class="header" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <img src="images/logo.png" alt="logo">
                    </div>
                    <?php if(!isset($_SESSION['email'])){
                    ?>
                    <div class="col">   
                        <a href="login.php">
                            <div class="login-card">
                                <h4 class="text-center">Login</h4>
                            </div>    
                        </a>
                    </div>   
                    <div class="col">
                        <a href="signup.php">
                            <div class="sign-up-card">
                                <h4 class="text-center">Sign-up</h4>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="col">                 
                        <div class="search-logo">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                            <img src="images/searchicon.png" alt="searchicon">
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Search Game</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h2 class="alert alert-danger text-center">Searchbar is Not Available at the Moment</h2>
                                <div class="form-group">
                                    <input type="text" name="searchtext" class="form-control">
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <form action="index.php" method="POST">
                                    <input type="hidden" name="id" id="id">
                                    <button type="submit" class="btn btn-info btn-lg" name="search">Search</button>
                                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>    
                    <?php if(isset($_SESSION['email'])){
                    ?> 
                    <div class="col">   
                        <div class="acc-manager">
                            <a href="accman.php">
                                <img src="images/userlogo.png" alt="user">

                            </a>
                        </div>
                    </div>  
                    <?php } ?>  
                    <?php if(isset($_SESSION['email'])){
                    ?>
                    <div class="col-2">
                        <div class="user-name">
                           <h3 class="text-center"><?php echo $fetch_info['name'] ?></h3>
                        </div>
                    </div>        
                <!-- <div class="col-2">
                    <a href="addtocart.php" class="cart">
                    <div class="cart-col">
                        <img src="images/cartlogo.png" alt="cart">
                    </div>
                    Item(s)<span> 0</span>
                    </a>
                </div> -->
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
        <div class="container">
            <div class="row">
                <div class="col">
                <div class="menu-cards-container">
                    <a style="text-decoration:none; color:black;" href="aboutus.html">
                    <div class="menu-cards">
                        <p class="fw-bold text-center">About Us</p>
                    </div>
                    </a>
                    <a style="text-decoration:none; color:black;" href="supportus.html">
                    <div class="menu-cards">
                        <p class="fw-bold text-center">Support Us</p>
                    </div>
                    </a>
                    <a style="text-decoration:none; color:black;" href="library.html">
                    <div class="menu-cards">
                        <p class="fw-bold text-center">Library</p>
                    </div>
                    </a>
                    <a style="text-decoration:none; color:black;" href="https://youtu.be/dQw4w9WgXcQ" target="_blank">
                    <div class="menu-cards">
                        <p class="fw-bold text-center">Giveaways</p>
                    </div>
                    </a>
                  </div>
                </div>
                <div class="col">
                <div class="featured">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">   
                <div class="carousel-inner">
                  <div class="carousel-item active">
                      <div class="carousel-game-image">
                        <img src="images/logo.png" class="img-fluid" alt="logo">
                      </div>
                  </div>
                  <div class="carousel-item">
                    <div class="carousel-game-image">
                        <img src="images/battlefield-2042-1.jpg" class="img-fluid" alt="image">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="carousel-game-image">
                        <img src="images/farcry6.png" class="img-fluid" alt="image">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="carousel-game-image">
                        <img src="images/forzahorizon5.png" class="img-fluid" alt="image">
                    </div>
                  </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="games-section">
        <h1 class="text-center">Top Games Available</h1>
        <div class="container">
            <div class="grid-container" id="productContainer">
            <?php 
            while ($rows=mysqli_fetch_assoc($result)){
            ?>
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
                        <form action="buynow.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $rows['ProductID']; ?>">
                        <button class="btn btn-danger btn-lg buynow"  name="buynow" type="submit"><h2>Buy Now</h2></button>
                        </form>
                    </div>
                    </div>
                </div>
                <?php 
                    };
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