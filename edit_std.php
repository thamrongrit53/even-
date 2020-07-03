

<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 
 

 $id=$_GET["id"];
   mysqli_set_charset($condb,"utf8");
 $query = "SELECT * FROM `std` WHERE id='$id' ORDER BY id DESC";
$result = mysqli_query($condb,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
    <div class="col-md-4"></div>
		<div class="col-md-4">
				<h3>แก้ไขรหัสผ่านผู้ใช้งาน</h3>
        <form action="edit_std_SQL.php?id=<?php echo $id; ?>" method="POST">
          <label>รหัสนักศึกษา</label>
          <input  type="text" name="std_id" class="form-control" value="<?php echo $row["std_id"]; ?>">
           <label>คำนำหน้า</label>
           <input  type="text" name="pre" class="form-control" value="<?php echo $row["pre"]; ?>">
          <label>ชื่อ</label>
          <input  type="text" name="f_name" class="form-control" value="<?php echo $row["f_name"]; ?>">
           <label>นามสกุล</label>
          <input  type="text" name="l_name" class="form-control" value="<?php echo $row["l_name"]; ?>">
           <label>อีเมล</label>
           <input  type="text" name="email" class="form-control"value="<?php echo $row["email"]; ?>">
           <label>ชั้น</label>
          <input  type="text" name="class" class="form-control"value="<?php echo $row["class"]; ?>">
           <label>สาขา</label>
          <input  type="text" name="branch" class="form-control"value="<?php echo $row["branch"]; ?>">
           <label>ที่อยู่</label>
          <input  type="text" name="address" class="form-control"value="<?php echo $row["address"]; ?>">
           <label>เบอร์โทร</label>
          <input  type="text" name="tel" class="form-control"value="<?php echo $row["tel"]; ?>">
           <label>สถานะ</label>
          <input  type="text" name="status" class="form-control"value="<?php echo $row["status"]; ?>">

              <button type="submit" class="btn btn-success">บันทึก</button>
        </form>
  		</div>
	    <div class="col-md-4"></div>
  </div>  
</div>

<?php 
require_once('footer.php'); 
?>


