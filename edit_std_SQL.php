<?php
require_once('condb.php');
require_once('session_admin.php');


$id=$_GET["id"];
$std_id = $_POST['std_id'];
$pre = $_POST['pre'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$clas = $_POST['class'];
$branch = $_POST['branch'];
$email = $_POST['email'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$status = $_POST['status'];

 $sql="UPDATE `std` SET `pre`='$pre',`std_id`='$std_id',`f_name`='$f_name',`l_name`='$l_name',`email`='$email',`class`='$clas',`branch`='$branch',`tel`='$tel',`address`='$address',`status`='$status' WHERE id = '$id'";
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
