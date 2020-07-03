
<?php 
require_once('condb.php');
require_once('session_std.php');
require_once('navbar.php'); 
mysqli_set_charset($conn,"utf8");

$id=$_GET["id"];
$query = "SELECT * FROM even_36h WHERE id_e='$id' ORDER BY id_e DESC";
$result = mysqli_query($condb,$query);
?>
<br>

<div class="container">
  <h3>ฟอร์มบันทึกกิจกรรม</h3>
    <?php
      while($row = mysqli_fetch_array($result))
      {
      ?> 
 <form method="POST" action="from_even_36h_SQL.php" enctype="multipart/form-data">
    <label>รหัสนักศึกษา</label>
    <input type="text" name="std_id" class="form-control" value="<?php echo $_SESSION["std_id"]; ?>" readonly>
    <label>ชื่อกิจกรรม</label>
    <input type="text" name="name_e" class="form-control" value="<?php echo $row["name_e"]; ?>" readonly>
    <label>วันที่ดำเนินการ</label>
    <input type="date" name="date_e1" class="form-control" value="<?php echo $row["date_e1"]; ?>" readonly>
    <label>เวลา</label>
    <input type="time" name="time_e1" class="form-control" value="<?php echo $row["time_e1"]; ?>" readonly>
    <label>ถึงวันที่</label>
    <input type="date" name="date_e2" class="form-control" value="<?php echo $row["date_e2"]; ?>" readonly>
     <label>เวลา</label>
    <input type="time" name="time_e2" class="form-control" value="<?php echo $row["time_e2"]; ?>" readonly>
     <label>รวมเวลาทั้งหมด</label>
    <input type="text" name="sum_time" class="form-control" value="<?php echo $row["sum_time"]; ?>" readonly>
     <label>ด้าน</label>
    <input type="text" name="type_e" class="form-control" value="<?php echo $row["type_e"]; ?>" readonly>
    <label>รูปประกอบ</label>
    <input type="file" name="files" class="form-control-file">
    <label>รายละเอียดกิจกรรมที่นักศึกษาร่วมดำเนินการ</label>
    <textarea class="form-control"rows="3" name="dis_e" ></textarea>
    <button class="btn btn-primary" type="submit" name="submit">บันทึก</button>
  </form>
     <?php
      }
      ?>
    
</div>

<?php 

require_once('footer.php'); 

?>