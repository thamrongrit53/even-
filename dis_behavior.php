<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 

?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
	<h3>ตัดคะแนนพฤติกรรม</h3>
  <form action="dis_behavior_SQL.php" method="POST">
    <label>รหัสนักศึกษา</label>
    <input type="text" name="std_id" class="form-control">
   <label>ประเภทความผิด</label>
                 <select class="form-control" name="type">
                <option></option>
                <option></option>
                </select>
    <label>หมายเหตุ</label>
    <textarea name="dis" class="form-control"></textarea>
    <br>
    <button type="submit" class="btn btn-danger">ตัดคะแนน</button>
  </form>
		</div>
	</div>   
</div>

<?php 
require_once('footer.php'); 
?>


