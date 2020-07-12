<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<?php  

require_once('condb.php');
require_once('session_admin.php');

$output = '';
$search=$_GET["act"];
$query = "SELECT std.*,even_std_36h.* FROM std,`even_std_36h` WHERE std.std_id=even_std_36h.std_id AND even_std_36h.name_e LIKE '%".$search."%'";
 $result = mysqli_query($condb, $query);
 if(mysqli_num_rows($result) > 0){
 
$output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>รหัสนักศึกษา</th>
    <th>ชื่อ-นามสกุล</th>
    <th>ชั้น</th>
    <th>สาขา</th>
     <th>ชื่อกิจกรรม</th>
     <th>วันที่</th>
     <th>เวลา</th>
     <th>รายละเอียดกิจกรรมที่นักศึกษาร่วมดำเนินการ</th>
    <th>รูป</th>
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
    <td>'.$row["name_e"].'</td>
    <td>'.$row["date_e1"]." "."ถึง"." ".$row["date_e2"].'</td>
    <td>'.$row["time_e1"]." "."ถึง"." ".$row["time_e2"].'</td>
    <td>'.$row["dis_e"].'</td>
    <td>http://sbac.online/event/img_even36/'.$row['img'].'</td>
   </tr>
  ';
 }
  $output .= '</table>';
header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
header('Content-Disposition: attachment; filename=report_event_36h.xlsx');
header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("report_event_36h.xlsx"));   
 
  echo $output;
 }

?>