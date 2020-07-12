<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<?php  
require_once('condb.php');
require_once('session_admin.php');

$output = '';
$branch=$_GET["branch"];
$cla=$_GET["class"];
$date=$_GET["date"];

$query="SELECT * FROM `attendance`WHERE class='$cla' AND branch='$branch' AND `time`LIKE '%".$date."%' ORDER BY id DESC";
$result = mysqli_query($condb,$query);

 if(mysqli_num_rows($result) > 0){
 
$output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>รหัสนักศึกษา</th>
     <th>ชื่อ-นามสกุล</th>
     <th>ชั้น</th>
     <th>สาขา</th>
     <th>สถานะ</th>
    <th>วันที่</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td>'.$row["std_id"].'</td>
    <td>'.$row["f_name"]." ".$row["l_name"].'</td>
    <td>'.$row["class"].'</td>
    <td>'.$row["branch"].'</td>
    <td>'.$row["status"].'</td>
    <td>'.$row["time"].'</td>
   </tr>
  ';
 }
  $output .= '</table>';
header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
header('Content-Disposition: attachment; filename=report_in_out_checkin.xlsx');
header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("report_in_out_checkin.xlsx"));   
 
  echo $output;
 }

?>