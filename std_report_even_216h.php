<?php 
require_once('condb.php');
require_once('session_std.php');
require_once('navbar.php'); 
$std_id=$_SESSION["std_id"];
$query1="SELECT SUM(sum_time) AS num1 FROM even_216h WHERE std_id='$std_id'";
$result1 = mysqli_query($condb,$query1);
$objResult1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
?>

<div class="container" style="margin-top: 10px;">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
          <div class="card bg-dark text-white" style="border-radius: 20px;">
    <div class="card-body text-center">
   <h2>รายงานชั่วโมงวิชาโครการพัฒนาทักษะอาชีพ</h2><br>
       <h2><?php echo number_format((float)$objResult1["num1"], 1, '.', ''); ?> &nbsp;ชั่วโมง</h2><br> 
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

 function load_data(query)
 {
  $.ajax({
   url:"std_list_even_216h.php",
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

