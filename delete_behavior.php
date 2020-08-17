<?php
require_once('condb.php');
require_once('session_admin.php');
	$id = $_GET["id"];
	$sql = "DELETE FROM behavior WHERE  id = '".$id."' ";
	$query = mysqli_query($condb,$sql);
if ($query){
    echo "<script type='text/javascript'>";
                echo "alert('ลบข้อมูล สำเร็จ');";
                echo "window.location = 'report_behavior.php'; ";
                echo "</script>";
            }else{
      			echo "<script>";
                echo "alert('ลบข้อมูลไม่ได้!');";
                echo "window.history.back();";
                  echo "</script>";
            }
?>
