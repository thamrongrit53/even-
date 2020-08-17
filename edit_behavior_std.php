<?php 
require_once('condb.php');
require_once('session_admin.php');
require_once('navbar_admin.php'); 

$id=$_GET["id"];

$query = "SELECT * FROM behavior_type ORDER BY id_b DESC";
$result = mysqli_query($condb,$query);


$query1 = "SELECT * FROM behavior WHERE id='$id'";
$result1 = mysqli_query($condb,$query1);
$objResult = mysqli_fetch_array($result1,MYSQLI_ASSOC);

?>

<div class="container" style="margin-top: 20px;">
  <div class="row">
    <div class="col-md-12">
  <h3>แก้ไขคะแนนพฤติกรรม</h3>
  <form action="edit_behavior_std_SQL.php?id=<?php echo $id; ?>" method="POST">
    <label>block</label>
                 <select class="form-control" name="block" value="<?php echo $objResult["block"]; ?>" >
                <option>block1</option>
                <option>block2</option>
                <option>block3</option>
                <option>block4</option>

                </select>
    <label>รหัสนักศึกษา</label>
    <input type="text" name="std_id" value="<?php echo $objResult["std_id"]; ?>" class="form-control">
   <label>ประเภทความผิด</label>
  <select class="form-control" name="type" id="type" value="<?php echo $objResult["be_type"]; ?>" onchange="check()">
                <option><?php echo $objResult["be_type"]; ?></option>

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
    <input type="text" name="score" id="score" class="form-control" value="<?php echo $objResult["score"]; ?>" readonly>

    <label>หมายเหตุ</label>
    <input type="text" name="dis" class="form-control" value="<?php echo $objResult["dis"]; ?>">
    <br>
    <button type="submit" class="btn btn-warning">แก้ไขข้อมูล</button>
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
