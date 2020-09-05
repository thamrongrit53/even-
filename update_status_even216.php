<?php
require_once('condb.php');
require_once('session_admin.php');


$id=$_GET["id"];
$approve = $_POST['approve'];


 $sql="UPDATE `even_216h` SET `status`='$approve' WHERE id ='$id'";
  $query=mysqli_query($condb,$sql);   

       if ($query){
      echo "<script type='text/javascript'>";
                echo "alert('สำเร็จ');";
                echo "window.location = 'report_even_216h.php'; ";
                echo "</script>";
            }else{
      			echo "<script>";
                echo "alert('กรุณาเพิ่มใหม่อีกครั้ง !');";
                echo "window.history.back();";
                  echo "</script>";
            }
?>
