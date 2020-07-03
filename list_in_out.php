
<?php
require_once('condb.php');
require_once('session_admin.php');
mysqli_set_charset($condb,"utf8");
 $output = '';
  if(isset($_POST["query"]))
{ 
 $search = mysqli_real_escape_string($condb, $_POST["query"]);
 $query = "
  SELECT * FROM attendance WHERE f_name LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM `attendance`ORDER BY id DESC";
}
$result = mysqli_query($condb,$query);
if(mysqli_num_rows($result) > 0)
{
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
 echo $output;
}
else
{
 echo 'ไมพบข้อมูล';
}

?>
