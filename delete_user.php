<?php
require_once('condb.php');
require_once('session_admin.php');
	$id = $_GET["id"];
	$sql = "DELETE FROM std WHERE  id = '".$id."' ";
	$query = mysqli_query($condb,$sql);
if ($query){
     header("location:manager_user.php");
      			}else{
     header("location:error.php");
      			}
?>
