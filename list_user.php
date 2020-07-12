
<?php
require_once('condb.php');
require_once('session_admin.php');
mysqli_set_charset($condb,"utf8");
 $output = '';
  if(isset($_POST["query"]))
{ 
 $search = mysqli_real_escape_string($condb, $_POST["query"]);
 $query = "
  SELECT * FROM std WHERE f_name LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM `std`ORDER BY id DESC";
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
     <th>อีเมล</th>
     <th>ชั้น</th>
     <th>สาขา</th>
     <th>เบอร์โทร</th>
     <th></th>
     <th></th>
     <th></th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td>'.$row["std_id"].'</td>
    <td>'.$row["pre"]." ".$row["f_name"]." ".$row["l_name"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["class"].'</td>
    <td>'.$row["branch"].'</td>
    <td>'.$row["tel"].'</td>
     <td>
       <button class="btn btn-primary" type="submit" value="submit" style="margin-top: 10px;"><a href="re_pass_std.php?id='.$row["id"].'">รีเซ็ตรหัส</a></button></td>
       <td>
         <button class="btn btn-warning" type="submit" value="submit" style="margin-top: 10px;"><a href="edit_std.php?id='.$row["id"].'">แก้ไขข้อมูล</a></button></td>
        <td><button class="btn btn-danger" style="margin-top: 10px;"><a href="delete_user.php?id='.$row["id"].'">ลบ</a></button></td>  	
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