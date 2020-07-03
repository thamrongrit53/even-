<?php
          require_once('condb.php'); 
           mysqli_set_charset($condb,"utf8");
    
         if (isset($_POST['upload'])) {
            $name_e = $_POST["name_e"];
            $dis_e = $_POST["dis_e"];
            $date_e1 = $_POST["date_e1"];
            $time_e1 = $_POST["time_e1"];
            $date_e2 = $_POST["date_e2"];
            $time_e2 = $_POST["time_e2"];
            $sum_time = $_POST["sum_time"];
            $type_e = $_POST["type_e"];
            $type_std = $_POST["type_std"];
            $image = $_FILES['image']['name'];
            $target = "img_even/".basename($image);
            
             $sql="INSERT INTO `even_36h`(`name_e`, `dis_e`, `date_e1`, `time_e1`, `date_e2`, `time_e2`, `type_e`, `type_std`,`sum_time`, `img`) VALUES ('$name_e','$dis_e','$date_e1','$time_e1','$date_e2','$time_e2','$type_e','$type_std','$sum_time','$image')";
            $query= mysqli_query( $condb, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
               $msg = "Image uploaded successfully";
            }else{
               $msg = "Failed to upload image";
            }
            if (!$query) {
              header("location:error.php");
              exit();
            } 
      
            }
          
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SBAC</title>
  <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=K2D:wght@700&display=swap" rel="stylesheet">

</head>
<body style="font-family: 'K2D', sans-serif;">

<div class="container"  id="myModal">
  <div class="jumbotron" style="margin-top: 300px;">
    <h1 class="text-center">
    สำเร็จ
    </h1>  
   </div>
</div>  
</body>
</html>
<script type="text/JavaScript">
    setTimeout("location.href = 'add_even_36h.php';",2000);
  </script>
     