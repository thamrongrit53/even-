<?php
require_once('condb.php');
require_once('session_admin.php');


$id=$_GET["id"];
$std_id = $_POST['std_id'];
$block = $_POST['block'];
$type = $_POST['type'];
$score = $_POST['score'];
$dis = $_POST['dis'];


 $sql="UPDATE `behavior` SET `block`='$block',`std_id`='$std_id',`be_type`='$type',`score`='$score',`dis`='$dis' WHERE id = '$id'";
  $query=mysqli_query($condb,$sql);   

       if ($query){
      echo "<script type='text/javascript'>";
                echo "alert('สำเร็จ');";
                echo "window.location = 'report_behavior.php'; ";
                echo "</script>";
            }else{
      			echo "<script>";
                echo "alert('กรุณาเพิ่มใหม่อีกครั้ง !');";
                echo "window.history.back();";
                  echo "</script>";
            }
?>
