<?php  
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 
mysqli_set_charset($conn,"utf8");

$query = "SELECT * FROM even_36h ORDER BY id_e DESC";
$result = mysqli_query($condb,$query);
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


<div class="container" style="margin-top: 30px;">  
<div class="text-center">
<h1>กิจกรรม</h1>
</div>
     <br />  
    <div align="right" class="text-center">
     <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">โพสต์&nbsp;&nbsp;กิจกรรม&nbsp; บธว.</button>
    </div>
     </div>


     <div class="container" style="margin-top: 20px;">
     <div class="row">
            <div class="card-columns">
      <?php
      while($row = mysqli_fetch_array($result))
      {
      ?> 
     
  <div class="card">
    <div class="inner">
         <img src="img_even/<?php echo $row["img"]; ?>" class="card-img-top" alt="...">
       </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["name_e"]; ?></h5>
                       <!--  <a href="post_40sbac.php?id=<?php echo $row["id"]; ?>">อ่านเพิ่ม..</a> -->
                        <p class="card-text"><?php echo $row["dis_e"]; ?></p>
                        <p class="card-text"><small class="text-muted">วันที่<?php echo $row["date_e1"];?>ถึง<?php echo $row["date_e2"];?></small></p>
                    </div>  
    </div>
                 
             
      <?php
      }
      ?>
    
   </div>
</div>
  </div>


<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">โพสต์&nbsp;&nbsp;กิจกรรม&nbsp; บธว.</h4>
   </div>
   <div class="modal-body">

 <form method="POST" action="add_even_36h_SQL.php" enctype="multipart/form-data">
    <label>ชื่อกิจกรรม</label>
    <input type="text" name="name_e" class="form-control">
    <label>รายละเอียดกิจกรรม</label>
    <textarea class="form-control"rows="3" name="dis_e"></textarea>
    <label>วันที่ดำเนินการ</label>
    <input type="date" name="date_e1" class="form-control">
    <label>เวลา</label>
    <input type="time" name="time_e1" class="form-control">
    <label>ถึงวันที่</label>
    <input type="date" name="date_e2" class="form-control">
     <label>เวลา</label>
    <input type="time" name="time_e2" class="form-control">
     <label>รวมเวลาทั้งหมด</label>
    <input type="text" name="sum_time" class="form-control">
     <label>ด้าน</label>
                 <select class="form-control" name="type_e">
                <option>ด้านชาติศาสน์กษัตริย์</option>
                <option>ด้านการอนุรักษ์สิ่งแวดล้อม</option>
                <option>ด้านกิจกรรมและนันทนาการ</option>
                <option>ด้านเศรษกิจพอเพียง</option>
                <option>ด้านการบริการวิชาชีพ</option>
                <option>อื่นๆ</option>
                </select>
       <label>กิจกรรมของนักศึกษาภาค</label>
                 <select class="form-control" name="type_std">
                <option>ภาคปกติ</option>
                <option>ภาคเสาร์-อาทิตย์</option>
                <option>ทั้งหมด</option>
                </select>
    <label>รูปประกอบ</label>
    <input type="file" name="image" class="form-control-file">

    <button class="btn btn-primary" type="submit" name="upload">บันทึก</button>
  </form>


   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
   </div>
  </div>
 </div>
</div>



<?php 

require_once('footer.php'); 

?>
