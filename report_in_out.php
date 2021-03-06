<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 

?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h3>รายงานเช็คชื่อเข้า-ออก</h3>
				  <div class="form-group">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    ค้นหาแบบกำหนดเอง
  </button>
    <div class="input-group">
     <span class="input-group-addon">ค้นหา</span>
     <input type="text" name="search_text" id="search_text" placeholder="ชื่อ-นามสกุล" class="form-control" />
    </div>
   </div>
    		<div id="result"></div>
    	</div>
		</div>
	</div>  

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ค้นหาแบบกำหนดเอง</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="custom_search.php" method="POST">
    
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
            <label>วันที่</label>
          <input type="date" name="date" class="form-control">

          <button class="btn-primary" type="submit">ค้นหา</button>

          </form>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
        
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
   url:"list_in_out.php",
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

