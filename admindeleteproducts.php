<?php 
require_once "controllerUserData.php";

//Read
$id = $_POST['id'];
$query = "SELECT * FROM products WHERE ProductID = '$id'";
$result = mysqli_query($con, $query);
$rows=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Mode - ComEx</title>
</head>
<body>
<section class="header-admin" id="header">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <img src="images/logo.png" alt="logo">
                    </div>
                    <div class="col-3">
                        <h2 class="text-center">Administrator Mode</h2>
                    </div>
            </div>
            </div>
    </section>

    <section class="top-page-admin">
      <div class="container">
          <div class="row">
              <div class="col">
                <div class="wrapper">
                    <form action="deleteproducts.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $rows['ProductID'];  ?>">
                    <div class="form-group">
                    <input type="text" name="game-name" class="form-control" value="<?php echo $rows['ProductName'];  ?>" required placeholder="Game Name" readonly>
                    </div>
                    <div class="form-group">
                    <input type="text" name="game-image" class="form-control" value="<?php echo $rows['ProductImage'];  ?>" required placeholder="Game Image" readonly>
                    </div>
                    <div class="form-group">
                    <input type="text" name="game-price" class="form-control" value="₱ <?php echo $rows['Price'];  ?>" required placeholder="Price" readonly>
                    </div>
                    <div class="form-group">
                    <input type="text" name="quantity" class="form-control" value="<?php echo $rows['Quantity'];  ?>" required placeholder="Quanity" readonly>
                    </div>
                    <div class="form-group">
                    <img class="mx-auto d-block" style="width: 50%;" src="<?php echo $rows['ProductImage']; ?>" alt="gameImage">
                    </div>
                    <button type="submit" name="delete" class="btn btn-danger btn-lg mx-auto d-block">Delete</button>
                    <a href="adminviewproducts.php" class="btn btn-info btn-lg mx-auto d-block">Cancel</a>
                    </form>
                    </div>
              </div>
          </div>
        </div>
    </section>

    <section class="bottom-page-admin">
        <div class="container">
            <div class="row">
                <div class="col">
                <div class="creators-name">
            <p class="text-center">Website Created by Jonathan A. Niez Jr. & Louis Andrew Roque</p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>