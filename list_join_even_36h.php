
<?php
require_once('condb.php');
require_once('session_admin.php');
mysqli_set_charset($condb,"utf8");
 $output = '';
  if(isset($_POST["query"]))
{ 
 $search = mysqli_real_escape_string($condb, $_POST["query"]);
 $query = "
  SELECT * FROM join_even WHERE name_e LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM `join_even`ORDER BY id DESC";
}
$result = mysqli_query($condb,$query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
    <a href="join_even_36h_excel.php?act='.$search.'" class="btn btn-success"> Export->Excel </a>
  
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>รหัสนักศึกษา</th>
    <th>ชื่อ-นามสกุล</th>
    <th>ชั้น</th>
    <th>สาขา</th>
     <th>ชื่อกิจกรรม</th>
     <th>วันที่-เวลา</th>
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
    <td>'.$row["join_time"].'</td>

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
