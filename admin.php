
<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 
  date_default_timezone_set("Asia/Bangkok");
$time=date("d-m-Y");
$today = date("d-m-Y");     

$query21 = "SELECT * FROM `attendance`WHERE status='เข้า'AND`time`LIKE '%$today%' ORDER BY id DESC";
$result21 = mysqli_query($condb,$query21);



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
      <h2>สาย</h2><br>
      <h2 id="cc"></h2><br>
    </div>
  </div>
    </div>
  </div>

</div>
</div>

<div class="container" style="margin-top: 20px;">
  <div class="row">
    <div class="col-md-12">
      <div class="text-center">
        <h3>รายงานเช็คชื่อเข้า-สาย/เข้า-ปกติ</h3>
      <!--     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    ค้นหาแบบกำหนดเอง
  </button> <a href="in_out_excel.php?class=<?php echo $cla;?>&&branch=<?php echo $branch;?>&&date=<?php echo $ddd;?>" class="btn btn-success"> Export->Excel </a> -->
 <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>รหัสนักศึกษา</th>
     <th>ชื่อ-นามสกุล</th>
     <th>ชั้น</th>
     <th>สาขา</th>
     <th>สถานะ</th>
    <th>วันที่</th>
    <th></th>
    </tr>
<?php 

 while($row21 = mysqli_fetch_array($result21))
 {
 ?>
 <tr>
   <td><?php echo $row21["std_id"]; ?></td>
    <td><?php echo$row21["f_name"]." ".$row21["l_name"] ;?></td>
    <td><?php echo $row21["class"];?></td>
    <td><?php echo$row21["branch"];?></td>
    <td><?php echo$row21["status"];?></td>
    <td><?php echo$row21["time"];?></td>
    <td><?php 
    $ct=date_create($row21["time"]);
    $th=date_format($ct,"H");
    $ti=date_format($ct,"i");

    if($row21["class"] !="ปวส.1เสาร์-อาทิตย์" && $row21["class"] !="ปวส.2เสาร์-อาทิตย์"){
         if ($th > 7 && $row21["status"]=='เข้า' ) {
           echo "สาย";
            $count_late=$count_late+1;
           }elseif($th > 5 && $row21["status"]=='เข้า' ) {
             echo "ปกติ";
    }
    }else{
      if ($th > 7 && $row21["status"]=='เข้า' ) {
        if ($th > 7 && $ti > 30) {
          echo "สาย";
          $count_late=$count_late+1;
             $cc = $count_late;
        }else{
          echo "สาย";
        } 
          
      }else{
             echo "ปกติ";
    }
   }
     ?></td>
    
   </tr>


<?php 
 } 

?>
    </table>
  </div>
      </div>
    </div>
  </div>  
</div>

<script type="text/javascript">
  var n =<?php echo $count_late; ?>;
  document.getElementById("cc").innerHTML=n;
</script>

<?php 
require_once('footer.php'); 

?>
