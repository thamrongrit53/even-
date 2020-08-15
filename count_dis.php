<?php 
require_once('condb.php');
require_once('navbar_admin.php'); 


$query="SELECT * FROM`std`WHERE class='ปวส.2'";
$result=mysqli_query($condb,$query);


?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h3>รายงานเช็คชื่อเข้า-ออก</h3>
 <div class="table-responsive">
   <table class="table table bordered">
    <tr>
    <th>รหัสนักศึกษา</th>
     <th>ชื่อ-นามสกุล</th>
     <th>ชั้น</th>
     <th>สาขา</th>
    
    <th></th>
    </tr>
<?php 
 while($row = mysqli_fetch_array($result))
 {
 ?>
 <tr>
   <td><?php echo $row["std_id"]; ?></td>
    <td><?php echo$row["f_name"]." ".$row["l_name"] ;?></td>
    <td><?php echo $row["class"];?></td>
    <td><?php echo$row["branch"];?></td>
    <td><?php 
$querySQL="SELECT * FROM attendance WHERE std_id='$row["std_id"]' LIMIT 1";
$resultSQL = mysqli_query($condb,$querySQL);
$objResult = mysqli_fetch_array($resultSQL,MYSQLI_ASSOC);

     $ct=date_create($objResult["time"]);
    $th=date_format($ct,"H");
    $ti=date_format($ct,"i");


    if($objResult["class"] !="ปวส.1เสาร์-อาทิตย์" && $objResult["class"] !="ปวส.2เสาร์-อาทิตย์"){
         if ($th > 7 && $objResult["status"]=='เข้า' ) {
           echo "สาย";
           }elseif($th > 5 && $objResult["status"]=='เข้า' ) {
             echo "ปกติ";
    }
    }else{
      if ($th > 7 && $objResult["status"]=='เข้า' ) {
         if ($th >  && $ti < 30) {
          echo "ปกติ";
        }elseif ($th > 7 && $ti >30) {
          echo "สาย";
        }elseif ($th > 8) {
          echo "สาย";
        // }
           }elseif($th > 5 && $objResult["status"]=='เข้า' ) {
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

<?php 
require_once('footer.php'); 

?>
