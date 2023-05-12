<?php 
require "connection.php";

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($con, $_POST['game-name']);
    $price = mysqli_real_escape_string($con, $_POST['game-price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];   
    $folder = "images/".$filename;

    $update_sql = "UPDATE products SET ProductName = '$name', Price = '$price', Quantity = '$quantity', ProductImage = '$folder' WHERE ProductID = '$id'";
    $res = mysqli_query($con, $update_sql);
    if($res){
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Updated Successfully');
                window.location.href='adminviewproducts.php';
                </script>");
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Failed to Update');
                window.location.href='';
                </script>");
    }
}
?>