<?php
require_once('condb.php');
require_once('session_std.php');
mysqli_set_charset($condb,"utf8");
 $output = '';
$std_id =$_SESSION["std_id"];

$query = "SELECT * FROM `join_even` WHERE std_id='$std_id' ORDER BY id DESC";
$result = mysqli_query($condb,$query);

if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>กิจจกรรม</th>
     <th>วันที่เข้าร่วม</th>
     <th></th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name_e"].'</td>
    <td>'.$row["join_time"].'</td>
     <td>
      <button class="btn btn-info my-2 my-sm-0"><a class="nav-link" href="from_even_36h.php?id='.$row["id_e"].'">บันทึกกิจกรรม</a></button>
    </td>
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
