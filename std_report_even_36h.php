<?php 
require_once('condb.php');
require_once('session_std.php');
require_once('navbar.php'); 
$std_id=$_SESSION["std_id"];

$query2="SELECT SUM(sum_time) AS num2  FROM even_std_36h WHERE std_id='$std_id'";
$result2 = mysqli_query($condb,$query2);
$objResult2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

$query1="SELECT COUNT(id_e) AS num1  FROM even_std_36h WHERE std_id='$std_id'";
$result1 = mysqli_query($condb,$query1);
$objResult1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);


          $s_sum1 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านชาติศาสน์กษัตริย์' ";
          $s_sum2 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านการอนุรักษ์สิ่งแวดล้อม' ";
          $s_sum3 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านกิจกรรมและนันทนาการ' ";
          $s_sum4 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านเศรษกิจพอเพียง' ";
          $s_sum5 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านการบริการวิชาชีพ' ";
          $s_sum6 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='อื่นๆ' ";
          
          $q_sum1 = mysqli_query($condb, $s_sum1);
          $q_sum2 = mysqli_query($condb, $s_sum2);
          $q_sum3 = mysqli_query($condb, $s_sum3);
          $q_sum4 = mysqli_query($condb, $s_sum4);
          $q_sum5 = mysqli_query($condb, $s_sum5);
          $q_sum6 = mysqli_query($condb, $s_sum6);
          
          $r_sum1 = mysqli_fetch_array($q_sum1);
          $r_sum2 = mysqli_fetch_array($q_sum2);
          $r_sum3 = mysqli_fetch_array($q_sum3);
          $r_sum4 = mysqli_fetch_array($q_sum4);
          $r_sum5 = mysqli_fetch_array($q_sum5);
          $r_sum6 = mysqli_fetch_array($q_sum6);
          
          $sum1 = $r_sum1["total"];
          $sum2 = $r_sum2["total"];
          $sum3 = $r_sum3["total"];
          $sum4 = $r_sum4["total"];
          $sum5 = $r_sum5["total"];
          $sum6 = $r_sum6["total"];

?>

<div class="container" style="margin-top: 10px;">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
          <div class="card bg-dark text-white" style="border-radius: 20px;">
    <div class="card-body text-center">
      <h2>รายงานชั่วโมงกิจกรรมองค์การวิชาชีพ</h2><br>  
      <div class="row">  
        <div class="col-sm-6" style="margin-top: 10px;">
    <div class="card bg-secondary text-white" style="border-radius: 20px;">
    <div class="card-body text-center">
       <h4>ชั่วโมงกิจกรรมองค์การวิชาชีพทั้งหมด<?php echo $objResult2["num2"]; ?>&nbsp;ชั่วโมง</h4><br>
      </div>
      </div>
 <div class="card bg-warning text-white" style="border-radius: 20px;margin-top: 10px;" >
    <div class="card-body text-center">
       <h4>กิจกรรมองค์การวิชาชีพที่เข้าร่วมทั้งหมด<?php echo $objResult1["num1"]; ?>&nbsp;กิจกรรม</h4><br>
      </div>
      </div>

    </div>
   <div class="col-sm-6" style="margin-top: 10px;">
    <div class="card" style="border-radius: 20px;">
    <div class="card-body text-center">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
<div class="chart-container" style="position: relative;  margin: auto;" width="250" height="250">
      <canvas id="myRadarChart"></canvas>
</div>
    
<script>
var radar = document.getElementById('myRadarChart');
if (radar) {
  var data = {
    labels: ['ด้านชาติศาสน์กษัตริย์', 'ด้านการอนุรักษ์สิ่งแวดล้อม', 'ด้านกิจกรรมและนันทนาการ', 'ด้านเศรษกิจพอเพียง', 'ด้านการบริการวิชาชีพ', 'อื่นๆ'],
    datasets: [{
      label: 'Answer',
      // data: [10, 9, 10, 5, 6, 7]
      data: ["<?php echo $sum1; ?>", "<?php echo $sum2; ?>", "<?php echo $sum3; ?>", "<?php echo $sum4; ?>", "<?php echo $sum5; ?>", "<?php echo $sum6; ?>"]
    }]
  }
  var options = {
    scale: {
      // Hides the scale
      display: true,
      ticks: {
        beginAtZero: true
      }
    },
    title: {
      display: true,
      text: 'สรุปในแต่ละด้านกิจกรรมองค์การวิชาชีพ'
    },
    tooltips: {
      mode: 'index'
    }
  };
  var myRadarChart = new Chart(radar,{
      type: 'radar',
      data: data,
      options: options
  });
}
</script>
      </div>
      </div>
    </div></div> 
 

      </div>
      </div>
				  <div class="form-group" style="margin-top:10px;">
    <div class="input-group">
     <span class="input-group-addon">ค้นหา</span>
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

 function load_data(query)
 {
  $.ajax({
   url:"std_list_even_36h.php",
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

