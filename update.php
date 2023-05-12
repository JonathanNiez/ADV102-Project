<?php 
require "connection.php";

if(isset($_POST['update'])){
    $id = $_POST['id'];
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$code = mysqli_real_escape_string($con, $_POST['code']);
$status = mysqli_real_escape_string($con, $_POST['status']);

$update_sql = "UPDATE adv102_projectv2 SET name = '$name', email = '$email', password = '$password', code = '$code', status = '$status' WHERE id = '$id'";
$res = mysqli_query($con, $update_sql);
if($res){
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Updated Successfully');
            window.location.href='admin.php';
            </script>");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed to Update');
            window.location.href='adminupdate.php';
            </script>");
}
}
?>