
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
?>

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
		<div class="col-sm-12">
			<div class="text-center" style="width: 700px;height: 400px;">

			<canvas id="myChart"></canvas>

		</div>
		</div>
		
			
	</div>
</div>


<?php 


require_once('footer.php'); 

?>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>