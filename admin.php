
<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 
  date_default_timezone_set("Asia/Bangkok");
$time=date("d-m-Y");
$today = date("d-m-Y");          

$query="SELECT COUNT(id) AS num  FROM attendance WHERE status='เข้า'AND`time`LIKE '%".$today."%'";
$result = mysqli_query($condb,$query);
$objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);

$query1="SELECT COUNT(id) AS num1  FROM attendance WHERE status='ออก'AND`time`LIKE '%".$today."%'";
$result1 = mysqli_query($condb,$query1);
$objResult1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

$query3 = "SELECT COUNT(id) AS totol, name_e AS datesave FROM join_even GROUP BY name_e DESC";
          $resultchart = mysqli_query($condb, $query3);  
        
          $datesave = array();
          $totol = array();
           
          while($rs = mysqli_fetch_array($resultchart)){ 
            $datesave[] = "\"".$rs['datesave']."\""; 
            $totol[] = "\"".$rs['totol']."\""; 
          }
          $datesave = implode(",", $datesave); 
          $totol = implode(",", $totol); 


?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

<div class="container"style="margin-top: 20px;">
			<div class="text-center">
    		<h3>รายงานภาพรวม</h3>
    		<p>วันที่&nbsp;<?php echo $time; ?></p>
  <div class="row" style="margin-top: 20px;">
    <div class="col-sm-4" style="margin-top: 10px;">
    <div class="card bg-info text-white" style="border-radius: 20px;">
    <div class="card-body text-center">
      <h2>เข้า</h2><br>
       <h2><?php echo $objResult["num"]; ?></h2><br> 
      </div>
      </div>
    </div>
    <div class="col-sm-4" style="margin-top: 10px;">
    <div class="card bg-info text-white"style="border-radius: 20px;">
    <div class="card-body text-center">
        <h2>ออก</h2><br>
       <h2><?php echo $objResult1["num1"]; ?></h2><br> 
   </div>
  </div>
    </div>
    <div class="col-sm-4" style="margin-top: 10px;">
      <div class="card bg-info text-white"style="border-radius: 20px;">
    <div class="card-body text-center">
      <h2>ลาป่วย-ลากิจ</h2><br>
      <h2></h2><br> 
    </div>
  </div>
    </div>
  </div>

</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<canvas id="myChart"></canvas>
          <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
           type: 'line',
             data: {
                   labels: [<?php echo $datesave;?>
    
                         ],
                datasets: [{
                 label: 'การเข้าร่วมกิจกรรม',
                 data: [<?php echo $totol;?>
                      ],
            backgroundColor: [
               
                'rgba(153, 102, 255, 0.2)',
                
            ],
            borderColor: [
            
                'rgba(153, 102, 255, 1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  

		</div>
	
		
			
	</div>
</div>


<?php 


require_once('footer.php'); 

?>
