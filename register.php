<!DOCTYPE html>
<html lang="en">
<head>
  <title>SBAC</title>
  <meta charset="utf-8">
      <link rel="icon" type="img/png" sizes="16x16" href="favicon-16x16.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@700&display=swap" rel="stylesheet">
<style type="text/css">
body{
    background-image: url("img/bg_sbac.jpg");
      background-size: auto;
           background-repeat: no-repeat;
}

#profile-img {
    height:180px;
}
label{
 	color: #fff;  
}
a{
  color: #fff;
}
</style>
<script type="text/javascript">
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'ตรงกัน';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'ไม่ตรงกัน';
  }
}
</script>
</head>
<body style=" font-family: 'K2D', sans-serif;">

<div class="container">
        <div class="row" style="margin-top: 100px"> 
          <div class="col-sm-4"> </div>
          <div class="col-sm-4">
          <form action="register_SQL.php" method="POST" enctype="multipart/form-data">
                <div class="text-center">
                <img id="profile-img" class="rounded-circle profile-img-card" src="img/sbac.jpg" />
              </div>
              <label>คำนำหน้า</label>
                 <select class="form-control rounded-pill" name="pre">
                <option>นาย</option>
                <option>นางสาว</option>
                <option>นาง</option>
                </select>
               <label>ชื่อ</label>
             <input class="form-control rounded-pill" type="text" name="f_name" placeholder="ชื่อ">
               <label>นามสกุล</label>
             <input class="form-control rounded-pill" type="text" name="l_name" placeholder="นามสกุล">
               <label>เบอร์โทร</label>
             <input class="form-control rounded-pill" type="text" name="tel" placeholder="เบอร์โทร">
              <label>ที่อยู่</label>
              <textarea class="form-control rounded-pill"rows="3" name="address"></textarea>
              <label>รหัสนักศึกษา</label>
             <input class="form-control rounded-pill" type="text" name="std_id" placeholder="รหัสนักศึกษา">
              <label>อีเมล</label>
              <input class="form-control rounded-pill" type="text" name="email" placeholder="รหัสนักศึกษา@bac.ac.th">
              <label>รหัส</label>
              <input class="form-control rounded-pill" name="password" id="password" type="password" onkeyup='check();'>
              <label>ยืนยันรหัส</label><span id='message'></span>
              <input class="form-control rounded-pill" type="password" name="confirm_password" id="confirm_password"  onkeyup='check();'> 
          
           
             <label>ชั้น</label>
                 <select class="form-control rounded-pill" name="class">
                <option>ปวช.1</option>
                <option>ปวช.2</option>
                <option>ปวช.3</option>
                <option>ปวส.1</option>
                <option>ปวส.2</option>
                <option>ปวส.1เสาร์-อาทิตย์</option>
                <option>ปวส.2เสาร์-อาทิตย์</option>
                </select>
              <label>สาขา</label>
                 <select class="form-control rounded-pill" name="branch">
                <option>การบัญชี</option>
                <option>คอมพิวเตอร์ธุรกิจ</option>
                <option>การตลาด</option>
                </select>
               <label>โปรไฟล์</label>
               <input type="file" name="image" class="form-control-file">
               <br>
                 <button type="submit" class="btn btn btn-lg btn-primary btn-block rounded-pill" name="upload">สมัคร</button>
              </form>
               <br>
               <a href="login.php">เข้าสู่ระบบ</a></button>
            </div>
             
          <div class="col-sm-4"> </div>
           
            
        </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
