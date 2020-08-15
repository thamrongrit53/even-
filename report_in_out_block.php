<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 

?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h3>รายงานเช็คชื่อเข้า-ออก block</h3>
				  <div class="form-group">
    <div class="input-group">
              <label>ค้นหา</label>
                 <select class="form-control " name="search_text"  id="search_text" onchange="check()">
                  <option>เลือกblock</option>
                   <option>block1</option>
                  <option>block2</option>
                   <option>block3</option>
                   <option>block4</option>

                </select>


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
  function check(){
   var search = document.getElementById('search_text').value;
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  } 
  }


 function load_data(query)
 {

  $.ajax({
   url:"list_in_out_block.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 
 
</script>

