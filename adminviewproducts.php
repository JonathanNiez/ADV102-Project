<?php 
require_once "controllerUserData.php";

//Read
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
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
                    <div class="col">
                        <a class="btn btn-info btn-lg" href="admin.php">Back</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-warning btn-lg" href="adminAddProducts.php">Add Products</a>
                    </div>
            </div>
            </div>
    </section>

    <section class="top-page-admin">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table" style="background: white; margin-top: 50px; margin-left:auto; margin-right:auto; border-radius: 10px; color:black; margin-bottom:50px; box-shadow: 0px 2px 13px 1px rgba(0,0,0,0.75);
    -webkit-box-shadow: 0px 2px 13px 1px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 2px 13px 1px rgba(0,0,0,0.75);
    background: white;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;">
                        <thead class="thead-dark">
                          <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>   
                            <th>Product Image</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($rows=mysqli_fetch_assoc($result)){
                            ?>
                          <tr>
                            <td><?php echo $rows['ProductID']; ?></td>
                            <td><?php echo $rows['ProductName']; ?></td>
                            <td>₱ <?php echo $rows['Price']; ?></td>
                            <td><?php echo $rows['Quantity']; ?></td>
                            <td><img style="width: 50%;" src="<?php echo $rows['ProductImage']; ?>" alt=""></td>
                            <td>
                                <form method="POST" action="adminUpdateProducts.php">
                                <input type="hidden" name="id" value="<?php echo $rows['ProductID']; ?>">
                                <button class="btn btn-success btn-lg" name="edit" type="submit">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="admindeleteproducts.php">
                                <input type="hidden" name="id" value="<?php echo $rows['ProductID']; ?>">
                                <button class="btn btn-danger btn-lg" name="delete" type="submit">Delete</button>
                                </form>
                            </td>   
                            <?php   
                                }
                            ?>
                          </tr>
                        </tbody>
                      </table>
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