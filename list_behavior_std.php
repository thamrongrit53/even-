
<?php
require_once('condb.php');
require_once('session_admin.php');
mysqli_set_charset($condb,"utf8");
 $output = '';
  if(isset($_POST["query"]))
{ 
 $search = mysqli_real_escape_string($condb, $_POST["query"]);
 $query = "
  SELECT * FROM behavior WHERE std_id LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM `behavior`ORDER BY id DESC";
}
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
     <th></th>
     <th></th>
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
    <td>
         <button class="btn btn-warning" type="submit" value="submit" style="margin-top: 10px;"><a href="edit_behavior_std.php?id='.$row["id"].'">แก้ไขข้อมูล</a></button></td>
        <td><button class="btn btn-danger" style="margin-top: 10px;"><a href="delete_behavior.php?id='.$row["id"].'">ลบ</a></button></td>  	
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
