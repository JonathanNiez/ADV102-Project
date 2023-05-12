<?php 
require "connection.php";

if(isset($_POST['delete'])){
    $id = $_POST['id'];

$delete_sql = "DELETE FROM adv102_projectv2 WHERE id = '$id'";
$res = mysqli_query($con, $delete_sql);
if($res){
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Deleted Successfully');
            window.location.href='admin.php';
            </script>");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
            window.alert('Failed to Delete');
            window.location.href='admin.php';
            </script>");
}
}
?>