<!DOCTYPE html>
<html lang="en">
<head>
  <title>SBAC</title>
  <meta charset="utf-8">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@700&display=swap" rel="stylesheet">
<style type="text/css">
body{
    background-image: url("img/bg_sbac.jpg");
     background-repeat: no-repeat;
  background-size: auto;
}

#profile-img {
    height:180px;
}
label{
 	color: #fff;  
}
a,p{
  color: #fff;
}

</style>

</head>
<body style=" font-family: 'K2D', sans-serif;">

<div class="container">
    
   
        <div class="row" style="margin-top:120px">
            <div class="col-sm-4">
             
          </div>
            <div class="col-sm-4">
            	<div class="text-center">
            		<img id="profile-img" class="rounded-circle profile-img-card" src="img/sbac.jpg" />
            	</div>
              <form action="check_login.php" method="POST">
                <label>อีเมล</label>
              <input class="form-control rounded-pill" type="text" name="username" placeholder="อีเมล">
              <label>รหัสผ่าน</label>
              <input class="form-control rounded-pill" type="password" name="password" placeholder="รหัสผ่าน">
              <br>
              <button type="submit" class="btn btn btn-lg btn-primary btn-block rounded-pill">เข้าสู่ระบบ</button>
              </form>
              <br>
              <p>&nbsp;&nbsp;หากยังไม่เป็นเป็นสมาชิก &nbsp;&nbsp;<a href="register.php">คลิกเพื่อสมัคร</a></p>
          </div>
            <div class="col-sm-4">
             
          </div>
        </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
