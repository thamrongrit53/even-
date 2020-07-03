

<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 
 

 $id=$_GET["id"];
?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
    <div class="col-md-4"></div>
		<div class="col-md-4">
				<h3>แก้ไขรหัสผ่านผู้ใช้งาน</h3>
        <form action="re_pass_SQL.php?id=<?php echo $id; ?>" method="POST">
          <label>รหัส</label>
              <input class="form-control" name="password" id="password" type="password" onkeyup='check();'>
              <label>ยืนยันรหัส</label><span id='message'></span>
              <input class="form-control" type="password" name="confirm_password" id="confirm_password"  onkeyup='check();'> 
              <button type="submit" class="btn btn-success">บันทึก</button>
        </form>
  		</div>
	    <div class="col-md-4"></div>
  </div>  
</div>

<?php 
require_once('footer.php'); 
?>
<script type="text/javascript">
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'ตรงกัน';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'ไม่ตรงกัน';
  }
}
</script>

