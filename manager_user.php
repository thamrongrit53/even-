

<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 

?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h3>ผู้ใช้ทั้งหมด</h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user">
            เพิ่มผู้ใช้
        </button>
				  <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">ค้นหา</span>
     <input type="text" name="search_text" id="search_text" placeholder="ชื่อผู้ใช้" class="form-control" />
    </div>
   </div>
    		
    		<div id="result"></div>
    	</div>
		</div>
	</div>  
</div>
<!-- The Modal -->
<div class="modal" id="add_user">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มผู้ใช้</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="manager_add_user_SQL.php" method="POST" enctype="multipart/form-data">
              <label>คำนำหน้า</label>
                 <select class="form-control" name="pre">
                <option>อาจารย์</option>
                <option>นาย</option>
                <option>นางสาว</option>
                <option>นาง</option>
                </select>
               <label>ชื่อ</label>
             <input class="form-control" type="text" name="f_name" placeholder="ชื่อ">
               <label>นามสกุล</label>
             <input class="form-control" type="text" name="l_name" placeholder="นามสกุล">
               <label>เบอร์โทร</label>
             <input class="form-control" type="text" name="tel" placeholder="เบอร์โทร">
              <label>ที่อยู่</label>
              <textarea class="form-control"rows="3" name="address"></textarea>
              <label>รหัสนักศึกษา</label>
             <input class="form-control" type="text" name="std_id" placeholder="รหัสนักศึกษา">
              <label>อีเมล</label>
              <input class="form-control" type="text" name="email" placeholder="รหัสนักศึกษา@bac.ac.th">
              <label>รหัส</label>
              <input class="form-control" name="password" id="password" type="password" onkeyup='check();'>
              <label>ยืนยันรหัส</label><span id='message'></span>
              <input class="form-control" type="password" name="confirm_password" id="confirm_password"  onkeyup='check();'> 
          
           
             <label>ชั้น</label>
                 <select class="form-control" name="class">
                <option>ปวช.1</option>
                <option>ปวช.2</option>
                <option>ปวช.3</option>
                <option>ปวส.1</option>
                <option>ปวส.2</option>
                <option>ปวส.1เสาร์-อาทิตย์</option>
                <option>ปวส.2เสาร์-อาทิตย์</option>
                </select>
              <label>สาขา</label>
                 <select class="form-control" name="branch">
                <option>การบัญชี</option>
                <option>คอมพิวเตอร์ธุรกิจ</option>
                <option>การตลาด</option>
                </select>
                <label>สถานะ</label>
                 <select class="form-control" name="status">
                <option>admin</option>
                <option>teacher</option>
                <option>std</option>
                </select>
               <label>โปรไฟล์</label>
               <input type="file" name="image" class="form-control-file">
               <br>
                 <button type="submit" class="btn btn btn-lg btn-primary btn-block rounded-pill" name="upload">เพิ่มผู้ใช้</button>
              </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





<?php 
require_once('footer.php'); 
?>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"list_user.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

