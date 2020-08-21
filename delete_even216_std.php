 <?php
require_once('condb.php');
require_once('session_std.php');
	$id = $_GET["id"];
	$sql = "DELETE FROM even_216h WHERE  id = '".$id."' ";
	$query = mysqli_query($condb,$sql);
if ($query){
    echo "<script type='text/javascript'>";
                echo "alert('ลบข้อมูล สำเร็จ');";
                echo "window.location = 'std_report_even_216h.php'; ";
                echo "</script>";
            }else{
      			echo "<script>";
                echo "alert('ลบข้อมูลไม่ได้!');";
                echo "window.history.back();";
                  echo "</script>";
            }
?>
