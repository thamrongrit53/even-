<?php 
require_once('condb.php');
require_once('session_std.php');
require_once('navbar.php'); 

?>
<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
			


				<h3>กิจกรรมที่เข้าร่วม</h3>
<!-- 				  <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">ค้นหา</span>
     <input type="text" name="search_text" id="search_text" placeholder="กิจกรรม" class="form-control" />
    </div>
   </div> -->
    		
    		<div id="result"></div>
    	
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
   url:"list_even_join.php",
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

