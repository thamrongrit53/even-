<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 

$query = "SELECT name_e FROM even_36h ORDER BY id_e DESC";
$result = mysqli_query($condb,$query);

?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h3>รายงานผู้เข้าร่วมกิจกรรมองค์การวิชาชีพ</h3>
				  <div class="form-group">
    <div class="input-group">
              <label>ค้นหา</label>
                 <select class="form-control " name="search_text"  id="search_text" onchange="check()">
                  <option>เลือกกิจกรรม</option>
                  <?php
      while($row = mysqli_fetch_array($result))
      {
      ?> 
                <option><?php echo $row["name_e"]; ?></option>
    <?php } ?>
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
   url:"list_join_even_36h.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 
 
</script>

