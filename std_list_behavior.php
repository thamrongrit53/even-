
<?php
require_once('condb.php');
require_once('session_std.php');
mysqli_set_charset($condb,"utf8");
$std_id=$_SESSION["std_id"];
 $output = '';
 $query = "SELECT * FROM `behavior` WHERE std_id='$std_id' ORDER BY id DESC";
$result = mysqli_query($condb,$query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>block</th>
    <th>รหัสนักศึกษา</th>
     <th>ประเภทความผิด</th>
     <th>คะแนน</th>
     <th>หมายเหตุ</th>
     <th>วันที่บันทึก</th>
    
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
     $date1=date_create($row["date"]);
  $output .= '
   <tr>
   <td>'.$row["block"].'</td>
    <td>'.$row["std_id"].'</td>
    <td>'.$row["be_type"].'</td>
    <td>'.$row["score"].'</td>
    <td>'.$row["dis"].'</td>
    <td>'.date_format($date1,"d/m/Y").'</td>
   	
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'ไมพบข้อมูล';
}

?>
