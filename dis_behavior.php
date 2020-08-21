<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 

$query = "SELECT * FROM behavior_type ORDER BY id_b DESC";
$result = mysqli_query($condb,$query);

$std_id=$_GET["id"]; 
?>

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
	<h3>ตัดคะแนนพฤติกรรม</h3>
  <form action="dis_behavior_SQL.php" method="POST">
    <label>block</label>
                 <select class="form-control" name="block" >
                <option>block1</option>
                <option>block2</option>
                <option>block3</option>
                <option>block4</option>

                </select>
    <label>รหัสนักศึกษา</label>
    <input type="text" name="std_id" value="<?php echo $std_id; ?>" class="form-control">
   <label>ประเภทความผิด</label>
  <select class="form-control" name="type" id="type" onchange="check()">
                    <option>เลือกประเภทความผิด</option>

              <?php
      while($row = mysqli_fetch_array($result))
      {
      ?> 
                <option><?php echo $row["be_type"]; ?></option>

    <?php 
  } 
  ?>
  </select>
    <label>คะแนน</label>
    <input type="text" name="score" id="score" class="form-control" readonly>

    <label>หมายเหตุ</label>
    <textarea name="dis" class="form-control"></textarea>
    <br>
    <button type="submit" class="btn btn-danger">ตัดคะแนน</button>
  </form>
		</div>
	</div>   
</div>

<?php 
require_once('footer.php'); 
?>

<script>
  function check(){
   var search = document.getElementById('type').value;
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  } 
  }


 function load_data(query)
 {

  $.ajax({
   url:"list_behavior.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#score').html(data);
    document.getElementById("score").value = data;

   }
  });
 }
 
 
</script>
