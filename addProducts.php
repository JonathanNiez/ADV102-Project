<?php 
require "connection.php";

if(isset($_POST['insert'])){
    $name = mysqli_real_escape_string($con, $_POST['game-name']);
    $price = mysqli_real_escape_string($con, $_POST['game-price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "images/".$filename;

$insert_sql = "INSERT INTO products (ProductName, Price, Quantity, ProductImage) VALUES ('$name', '$price', '$quantity', '$folder')";
$res = mysqli_query($con, $insert_sql);
if($res){
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Product Added Successfully');
            window.location.href='adminviewproducts.php';
            </script>");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed to Add Product');
            window.location.href='adminviewproducts.php';
            </script>");
}
}
?>