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

$query="SELECT * FROM `attendance`WHERE status='เข้า' AND class='$cla' AND branch='$branch' AND `time`LIKE '%$date%' ORDER BY id DESC";
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
    <th></th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
$ct=date_create($row["time"]);
    $th=date_format($ct,"H");
    $ti=date_format($ct,"i");


    if($row["class"] !="ปวส.1เสาร์-อาทิตย์" && $row["class"] !="ปวส.2เสาร์-อาทิตย์"){
         if ($th > 7 && $row["status"]=='เข้า' ) {
           $cc="สาย";
           }elseif($th > 5 && $row["status"]=='เข้า' ) {
        $cc="ปกติ";
    }
    }else{
      if ($th > 7 && $row["status"]=='เข้า' ) {
         if ($th > 7 && $ti < 30) {
         $cc="ปกติ";
        }elseif ($th > 7 && $ti >30) {
          $cc="สาย";
        }
        elseif ($th > 8) {
          $cc="สาย";
        }
           }elseif($th > 5 && $row["status"]=='เข้า' ) {
             $cc="ปกติ";
    }
   }

  $output .= '
   <tr>
   <td>'.$row["std_id"].'</td>
    <td>'.$row["f_name"]." ".$row["l_name"].'</td>
    <td>'.$row["class"].'</td>
    <td>'.$row["branch"].'</td>
    <td>'.$row["status"].'</td>
    <td>'.$row["time"].'</td>
    <td>'.$cc.'</td>
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