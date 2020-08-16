<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 


// $branch=$_POST["branch"];
// $cla=$_POST["class"];
// $date=$_POST["date"];
// $dd=date_create($date);
// $ddd=date_format($dd,"d-m-Y");

$query = "SELECT * FROM `std`WHERE class='ปวส.2' AND branch='คอมพิวเตอร์ธุรกิจ' ORDER BY id DESC";
$result = mysqli_query($condb,$query);


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
     <th>สถานะ</th>
    <th>วันที่</th>
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
    <td><?php echo$row["status"];?></td>
    <td><?php echo$row["time"];?></td>
    <td><?php 
     $ct=date_create($row["time"]);
    $th=date_format($ct,"H");
    $ti=date_format($ct,"i");


    if($row["class"] !="ปวส.1เสาร์-อาทิตย์" && $row["class"] !="ปวส.2เสาร์-อาทิตย์"){
         if ($th > 7 && $row["status"]=='เข้า' ) {
           echo "สาย";
           }elseif($th > 5 && $row["status"]=='เข้า' ) {
             echo "ปกติ";
    }
    }else{
      if ($th > 7 && $row["status"]=='เข้า' ) {
         if ($th >  && $ti < 30) {
          echo "ปกติ";
        }elseif ($th > 7 && $ti >30) {
          echo "สาย";
        }elseif ($th > 8) {
          echo "สาย";
        }
           }elseif($th > 5 && $row["status"]=='เข้า' ) {
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
