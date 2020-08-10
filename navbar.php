<?php 
require_once('session_std.php');

?>
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
  
  .md-avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
}

</style>
</head>
<body style="font-family: 'K2D', sans-serif;">

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">SBAC Event</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="home.php">ข่าวประชาสัมพันธ์</a>
      </li>
      <?php
      if ($_SESSION["class"]=="ปวช.3" || $_SESSION["class"]=="ปวส.2"|| $_SESSION["class"]=="ปวส.2เสาร์-อาทิตย์") {
        echo '<li class="nav-item">
        <a class="nav-link" href="from_even_216h.php">บันทึกชั่วโมงวิชาโครการพัฒนาทักษะอาชีพ</a>
      </li>';
      }
     

       ?>
      

      <li class="nav-item">
        <a class="nav-link" href="even_join.php">บันทึกกิจกรรมองค์การวิชาชีพ</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          รายงาน
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="std_report_even_216h.php">รายงานชั่วโมงวิชาโครการพัฒนาทักษะอาชีพ</a>
          <a class="dropdown-item" href="std_report_even_36h.php">รายงานชั่วโมงกิจกรรมองค์การวิชาชีพ</a>
        </div>
      </li>
  <?php
      if ($_SESSION["class"]=="ปวช.3" || $_SESSION["class"]=="ปวส.2"|| $_SESSION["class"]=="ปวส.2เสาร์-อาทิตย์") {
        echo '  <li class="nav-item">
        <a class="nav-link" href="https://www.sbac.online/internship/login.php">สมัครฝึกงาน</a>
      </li>';
      }
     

       ?>

    
      <li class="nav-item">
        <a class="nav-link" href="https://bit.ly/sbac_sickform">ใบลา</a>
      </li>

    </ul>

    <ul class="navbar-nav ml-auto nav-flex-icons">
      <img src="images_profile/<?php echo $_SESSION["img"]; ?>" class="md-avatar rounded" alt="profile" style="height:40px;width: 40px;margin-right: 5px;">
       <h5 style="margin-top:10px; color:#fff; margin-right: 10px;"><?php echo $_SESSION["std_id"]; ?></h5>
       <button class="btn btn-danger my-2 my-sm-0"><a href="log_out.php">ออกจากระบบ</a></button>
      </ul>
  </div>
</nav>
