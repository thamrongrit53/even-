
<?php
require_once('condb.php');
require_once('session_admin.php');
mysqli_set_charset($condb,"utf8");

 $output = '';
  if(isset($_POST["query"]))
{ 
 $search = mysqli_real_escape_string($condb, $_POST["query"]);
 $query = "
  SELECT * FROM even_216h WHERE std_id LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM `even_216h` ORDER BY id DESC";
}
$result = mysqli_query($condb,$query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>รหัสนักศึกษา</th>
     <th>กิจกรรม/รายละเอียดกิจกรรมที่นักศึกษาร่วมดำเนินการ</th>
    <th>สิ่งที่ได้เรียนรู้จากกิจกรรม</th>
     <th>วันที่</th>
     <th>เวลา</th>
     <th>รวมเวลา/ชม.</th>
    <th>รูป</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td>'.$row["std_id"].'</td>
<td>'.$row["name_e"].'</td>
    <td>'.$row["dis_e"].'</td>
        <td>'.$row["date_e1"].'</td>
    <td>'.$row["time_e1"]." "."ถึง"." ".$row["time_e2"].'</td>
       <td>'.$row["sum_time"].'</td>
    <td><a target="_blank" href="img_even216/'.$row["img"].'"><img src="img_even216/'.$row["img"].'" style=" width: 80px;height: 40px;"></a></td>
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
