<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 


$branch=$_POST["branch"];
$cla=$_POST["class"];
$date=$_POST["date"];
$dd=date_create($date);
$ddd=date_format($dd,"d-m-Y");
$query = "SELECT * FROM `attendance`WHERE  class='$cla' AND branch='$branch' AND `time`LIKE '%".$ddd."%' ORDER BY id DESC";
$result = mysqli_query($condb,$query);


?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				<h3>รายงานเช็คชื่อเข้า-ออก</h3>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    ค้นหาแบบกำหนดเอง
  </button> <a href="in_out_excel.php?class=<?php echo $cla;?>&&branch=<?php echo $branch;?>&&date=<?php echo $ddd;?>" class="btn btn-success"> Export->Excel </a>
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
    $ts=date_format($ct,"H");
    if ($ts > 7 && $row["status"]=='เข้า' ) {
      echo "สาย";
      echo $ts;
    }elseif($ts > 6 && $row["status"]=='เข้า' ) {
     echo "ปกติ";
      echo $ts;
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

<!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ค้นหาแบบกำหนดเอง</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="custom_search.php" method="POST">
    
          <label>ชั้น</label>
                 <select class="form-control" name="class">
                <option>ปวช.1</option>
                <option>ปวช.2</option>
                <option>ปวช.3</option>
                <option>ปวส.1</option>
                <option>ปวส.2</option>
                <option>ปวส.1เสาร์-อาทิตย์</option>
                <option>ปวส.2เสาร์-อาทิตย์</option>
                </select>
              <label>สาขา</label>
                 <select class="form-control" name="branch">
                <option>การบัญชี</option>
                <option>คอมพิวเตอร์ธุรกิจ</option>
                <option>การตลาด</option>
                </select>
            <label>วันที่</label>
          <input type="date" name="date" class="form-control">

          <button class="btn-primary" type="submit">ค้นหา</button>

          </form>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
        
      </div>
    </div>
  </div>
</div>

