
<?php
require_once('condb.php');
require_once('session_admin.php');
mysqli_set_charset($condb,"utf8");

 $output = '';
  if(isset($_POST["query"]))
{ 
 $search = mysqli_real_escape_string($condb, $_POST["query"]);
 $query = "
  SELECT even_216h.*,std.f_name,std.l_name FROM even_216h LEFT JOIN std ON even_216h.std_id = std.std_id  WHERE even_216h.std_id LIKE '%".$search."%'";
}
else
{
 $query = "SELECT even_216h.*,std.f_name,std.l_name FROM even_216h LEFT JOIN std ON even_216h.std_id = std.std_id  ORDER BY even_216h.id DESC";
}
$result = mysqli_query($condb,$query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
      <a href="even_216h_excel.php?act='.$search.'" class="btn btn-success"> Export->Excel </a>
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
    <td><a target="_blank" href="img_even216/'.$row["img"].'"><img src="img_even216/'.$row["img"].'" style=" width: 80px;height: 40px;"></a></td>
    <td>
                  <span class="badge badge-warning">'.$row["status"].'</span>
                    <form action="update_status_even216.php?id='.$row["id"].'" method="POST">
                    <input type="radio" name="approve" value="ไม่อนุญาต">ไม่อนุญาต<br>
                     <input type="radio" name="approve" value="อนุญาต">อนุญาต <br>
                    <button type="submit" class="btn btn-success">บันทึก</button> 
                    </form>
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
