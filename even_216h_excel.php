<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<?php  

require_once('condb.php');
require_once('session_admin.php');

$output = '';
$search=$_GET["act"];
$query = "SELECT even_216h.*,std.f_name,std.l_name FROM even_216h LEFT JOIN std ON even_216h.std_id = std.std_id  ORDER BY even_216h.id DESC";
 $result = mysqli_query($condb, $query);
 if(mysqli_num_rows($result) > 0){
 
$output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>รหัสนักศึกษา</th>
    <th>ชื่อ-นามสกุล</th>
     <th>กิจกรรม/รายละเอียดกิจกรรมที่นักศึกษาร่วมดำเนินการ</th>
    <th>สิ่งที่ได้เรียนรู้จากกิจกรรม</th>
     <th>วันที่</th>
     <th>เวลา</th>
     <th>รวมเวลา/ชม.</th>
    <th>รูป</th>
    <th>สถานะ</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
    <tr>
   <td>'.$row["std_id"].'</td>
   <td>'.$row["f_name"]." ".$row["l_name"].'</td>
<td>'.$row["name_e"].'</td>
    <td>'.$row["dis_e"].'</td>
        <td>'.$row["date_e1"].'</td>
    <td>'.$row["time_e1"]." "."ถึง"." ".$row["time_e2"].'</td>
       <td>'.$row["sum_time"].'</td>
    <td>https://www.sbac.online/event/img_even216/'.$row["img"].'</a></td>
    <td>
    <span class="badge badge-warning">'.$row["status"].'</span>
    </td>
   </tr>
  ';
 }
  $output .= '</table>';
header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
header('Content-Disposition: attachment; filename=report_event_216h.xlsx');
header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("report_event_216h.xlsx"));   
 
  echo $output;
 }

?>