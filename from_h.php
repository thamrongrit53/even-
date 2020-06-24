
<?php 

require_once('navbar.php'); 

?>
<br>

<div class="container">
  <h3>ฟอร์มบันทึกกิจกรรม</h3>
  <form>
  	<label>ชื่อกิจกรรม</label>
  	<input type="text" name="name_e" class="form-control">
  	<label>วันที่ดำเนินการ</label>
  	<input type="date" name="date_e_1" class="form-control">
  	<label>ถึงวันที่</label>
  	<input type="date" name="date_e_2" class="form-control">
  	<label>รูปประกอบ</label>
  	<input type="file" name="files" class="form-control">
  	<button class="btn btn-primary" type="submit">บันทึก</button>
  </form>
</div>

<?php 

require_once('footer.php'); 

?>