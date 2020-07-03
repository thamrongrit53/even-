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
    <div class="input-group">
     <span class="input-group-addon">Felter</span>
     <input type="text" name="search_text" id="search_text" placeholder="ค้นหา" class="form-control" />
    </div>
   </div>
    		
    		<div id="result"></div>
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

 function load_data(query,felter)
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

