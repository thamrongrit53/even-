<?php 
require_once('condb.php');
require_once('session_std.php');
mysqli_set_charset($condb,"utf8");

$id=$_GET["id"];

$query = "SELECT * FROM even_36h WHERE id_e='$id' ORDER BY id_e DESC";
$result = mysqli_query($condb,$query);
$objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);
$std_id =$_SESSION["std_id"];
$f_name=$_SESSION["f_name"];
$l_name=$_SESSION["l_name"];
$clas=$_SESSION["class"];
$branch=$_SESSION["branch"];
$id_e=$objResult["id_e"];
$name_e=$objResult["name_e"];
$time=date("d-m-Y H:i:s");

         $check = "SELECT * FROM join_even WHERE std_id = '$std_id' AND id_e ='$id'";
            $result1 = mysqli_query($condb, $check) or die(mysqli_error());
            $num=mysqli_num_rows($result1);

    if($num > 0)
    {
    echo "<script>";
    echo "alert('เข้าร่วมไปแล้ว');";
    echo "window.history.back();";
    echo "</script>";
     exit();
    }else{

$sql="INSERT INTO `join_even`(`std_id`,`f_name`,`l_name`,`class`,`branch`,`id_e`,`name_e`, `join_time`) VALUES ('$std_id','$f_name','$l_name','$clas','$branch','$id_e','$name_e','$time')";
$query= mysqli_query( $condb, $sql);
         if (!$query) {
               echo "<script>";
                echo "alert('กรุณาลองใหม่อีกครั้ง !');";
                echo "window.history.back();";
                  echo "</script>";
            } else{
                echo "<script type='text/javascript'>";
                echo "alert('เข้าร่วมสำเร็จ');";
                echo "window.location = 'even_join.php'; ";
                echo "</script>";
            }
          }
?>
