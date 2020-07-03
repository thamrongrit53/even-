<?php
require_once('condb.php');
require_once('session_admin.php');


$id=$_GET["id"];
$password = $_POST['password'];
$password_encode=md5($password);

 $sql="UPDATE `std` SET `password`='$password_encode' WHERE id = '$id'";
  $query=mysqli_query($condb,$sql);   
  if ($query){
     header("location:manager_user.php");
            }else{
     header("location:error.php");
            }
     
?>
