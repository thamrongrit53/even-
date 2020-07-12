<?php
require_once('condb.php');
require_once('session_admin.php');


$id=$_GET["id"];
$password = $_POST['password'];
$password_encode=md5($password);

 $sql="UPDATE `std` SET `password`='$password_encode' WHERE id = '$id'";
  $query=mysqli_query($condb,$sql);   
  if ($query){
      echo "<script type='text/javascript'>";
                echo "alert('สำเร็จ');";
                echo "window.location = 'manager_user.php'; ";
                echo "</script>";
            }else{
      			echo "<script>";
                echo "alert('กรุณาเพิ่มใหม่อีกครั้ง !');";
                echo "window.history.back();";
                  echo "</script>";
            }
     
?>