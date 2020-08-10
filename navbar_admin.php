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
  a{
    color: #fff;
  }
  .md-avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
}
</style>
</head>
<body style=" font-family: 'K2D', sans-serif;">

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin.php">SBAC Event</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="admin.php">ภาพรวม</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_even_36h.php">ประชาสัมพัมพันธ์กิจกรรม</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          รายงาน
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="report_even_216h.php">รายงานชั่วโมงวิชาโครการพัฒนาทักษะอาชีพ</a>
          <a class="dropdown-item" href="report_join_even_36h.php">รายงานผู้เข้าร่วมกิจกรรมองค์การวิชาชีพ</a>
          <a class="dropdown-item" href="report_even_36h.php">รายงานชั่วโมงกิจกรรมองค์การวิชาชีพ</a>
           <a class="dropdown-item" href="report_in_out.php">รายงานเช็คชื่อเข้า-ออก</a>
           
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manager_user.php">จัดการผู้ใช้</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">ระบบฝึกงาน</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
       <img src="images_profile/<?php echo $_SESSION["img"]; ?>" class="md-avatar rounded" alt="profile" style="height:40px;width: 40px; margin-right: 10px;">
      <button class="btn btn-danger my-2 my-sm-0"><a href="log_out.php">ออกจากระบบ</a></button>
    </form>
  </div>
</nav>

