
<?php 
require_once('condb.php');
require_once('session_std.php');
require_once('navbar.php'); 
mysqli_set_charset($conn,"utf8");

if ($_SESSION["class"]=="ปวส.1เสาร์-อาทิตย์" || $_SESSION["class"]=="ปวส.2เสาร์-อาทิตย์") {
 $query = "SELECT * FROM even_36h WHERE type_std ='ภาคเสาร์-อาทิตย์' OR type_std='ทั้งหมด' ORDER BY id_e DESC";
$result = mysqli_query($condb,$query);
} else{
   $query = "SELECT * FROM even_36h WHERE type_std ='ภาคปกติ' OR type_std='ทั้งหมด' ORDER BY id_e DESC";
$result = mysqli_query($condb,$query);
}



?>
<style type="text/css">
/*body {
  background-image: linear-gradient(to top, #3399ff 0%, #b3d9ff 100%);
}*/
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.inner{
  overflow: hidden;
}
.inner img{
transform: all 2.5s ease;

}
.inner:hover img{
  transform: scale(1.5);
}
  </style>
<script type="text/javascript" src="qrcode.js"></script>
<br>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4">
      
    </div>
		<div class="col-md-4">
		<div class="text-center  align-content-md-center">
        <h3>QR Code </h3>
          <div class="card">
    <div class="card-body">
      <div id="qrcode"></div> 
    </div>
  </div>
      </div>
		</div>
		<div class="col-md-4">
  
    </div>
	</div>  
</div>

     <div class="container" style="margin-top: 20px;">
<div class="jumbotron bg-dark">
    <h1 style="color: #fff;" class="text-center">กิจกรรม</h1>      
    
  </div>

     <div class="row">
            <div class="card-columns">
      <?php
      while($row = mysqli_fetch_array($result))
      {
      ?> 
     
  <div class="card" style="margin-left: 20px; margin-right: 20px;">
    <div class="inner">
         <img src="img_even/<?php echo $row["img"]; ?>" class="card-img-top" alt="...">
       </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["name_e"]; ?></h5>
                       <!--  <a href="post_40sbac.php?id=<?php echo $row["id"]; ?>">อ่านเพิ่ม..</a> -->
                        <p class="card-text"><?php echo $row["dis_e"]; ?></p>
                        <p class="card-text"><small class="text-muted">วันที่&nbsp;<?php $date1=date_create($row["date_e1"]); echo date_format($date1,"d/m/Y");?>&nbsp;ถึง&nbsp;<?php $date2=date_create($row["date_e2"]); echo date_format($date2,"d/m/Y");?></small></p>
                        <p class="card-text"><small class="text-muted">เวลา&nbsp;<?php $time1=date_create($row["time_e1"]); echo date_format($time1,"H:i:s");?>&nbsp;ถึง&nbsp;<?php $time2=date_create($row["time_e2"]); echo date_format($time2,"H:i:s");?></small></p>
                        <?php if ($row["type_e"]!='อื่นๆ'){
                          ?>
                        <button class="btn btn-warning my-2 my-sm-0"><a href="join_even_36h_SQL.php?id=<?php echo $row["id_e"] ?>">เข้าร่วม</a></button>
                        <?php 
                        } 
                         ?>
                    </div>  
    </div>
                 
             
      <?php
      }
      ?>
    
   </div>
</div>
  </div>

<?php 
date_default_timezone_set("Asia/Bangkok");
$time=date("i");
$time_check=date("H");


require_once('footer.php'); 

?>
 <script>
        var userInput ="<?php echo "std_id=".$_SESSION['std_id']."&"."time=".$time."&"."time_check=".$time_check; ?>";
        var qrcode = new QRCode("qrcode", {
            text: userInput,
            width: 280,
            height: 280,
            colorDark: "black",
            colorLight: "white",
            correctLevel : QRCode.CorrectLevel.H
        });
    
    
    </script>