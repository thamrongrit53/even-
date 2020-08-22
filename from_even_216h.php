
<?php 

require_once('navbar.php'); 

?>
<br>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
       <h3>ฟอร์มบันทึกชั่วโมงกิจกรรม วิชาโครการพัฒนาทักษะอาชีพ</h3>
 <form method="POST" action="event_216h_SQL.php" enctype="multipart/form-data">
  <label>รหัสนักศึกษา</label>
    <input type="text" name="std_id" class="form-control" value="<?php echo $_SESSION["std_id"]; ?> " readonly>
    <label>กิจกรรม/รายละเอียดกิจกรรม</label>
    <input type="text" name="name_e" class="form-control">
    <label>สิ่งที่ได้เรียนรู้จากกิจกรรม</label>
    <textarea class="form-control"rows="3" name="dis_e"></textarea>
    <label>วันที่ดำเนินการ</label>
    <input type="date" name="date_e1" class="form-control" id="date_e1" onchange="diff_minutes()">
    <label>เวลา</label>
    <input type="time" name="time_e1" class="form-control" id="time_e1" onchange="diff_minutes()">
     <label>เวลา</label>
    <input type="time" name="time_e2" class="form-control" id="time_e2" onchange="diff_minutes()">
     <label>รวมเวลาทั้งหมด/ชั่วโมง</label>
    <input type="text" name="sum_time" class="form-control" id="sum" readonly>
    <label>รูปประกอบ</label>
    <input type="file" name="files" class="form-control-file">
      <br>
    <button class="btn btn-primary" type="submit" name="submit">บันทึก</button>
  </form>
    </div>
  </div>
 
</div>

<?php 

require_once('footer.php'); 

?>
<script type="text/javascript">
   
  function diff_minutes(dt2, dt1) 
 {
  var date_e1 = document.getElementById('date_e1').value;

  var dt1 = document.getElementById('time_e1').value;
  var dt2 = document.getElementById('time_e2').value;
  var d1= date_e1+" "+dt1;
  var d2= date_e1+" "+dt2;

  var hours = Math.abs(new Date(d1) - new Date(d2)) / 36e5;
  document.getElementById("sum").value = hours.toFixed(1);
  console.log(date_e1);
  console.log(dt1);
  console.log(dt2);
  console.log(d1);
  console.log(d2);
  console.log(hours);
 }
</script>