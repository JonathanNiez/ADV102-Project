<?php 
require "connection.php";

if(isset($_POST['delete'])){
    $id = $_POST['id'];

$delete_sql = "DELETE FROM products WHERE ProductID = '$id'";
$res = mysqli_query($con, $delete_sql);
if($res){
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Deleted Successfully');
            window.location.href='adminviewproducts.php';
            </script>");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed to Delete');
            window.location.href='admindeleteproducts.php';
            </script>");
}
}
?>