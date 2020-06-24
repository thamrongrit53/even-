<?php
          require_once('condb.php'); 
           mysqli_set_charset($condb,"utf8");
    
         if (isset($_POST['upload'])) {
            $std_id = $_POST["std_id"];
            $pre = $_POST["pre"];
            $f_name = $_POST["f_name"];
            $l_name = $_POST["l_name"];
            $address = $_POST["address"];
            $tel = $_POST["tel"];
            $email = $_POST["email"];
            $class = $_POST["class"];
            $branch = $_POST["branch"];   
            $password = $_POST["password"];
            $pass =md5($password);     
            $image = $_FILES['image']['name'];
            $status = "std";
            $target = "images_profile/".basename($image);
            
             $sql="INSERT INTO `std`(`pre`, `std_id`, `f_name`, `l_name`, `email`, `class`, `branch`, `tel`, `address`, `img`,password, `status`) VALUES ('$pre','$std_id','$f_name','$l_name','$email','$class','$branch','$tel','$address','$image','$pass','$status')";
            mysqli_query( $condb, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
               $msg = "Image uploaded successfully";
            }else{
               $msg = "Failed to upload image";
            }
      
            }
          
      ?>
      <!DOCTYPE html>
<html lang="en">
<head>
  <title>SBAC</title>
  <meta charset="utf-8">
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
      สมัครสำเร็จ
    </h1>  
   </div>
</div>  
</body>
</html>
<script type="text/JavaScript">
    setTimeout("location.href = 'login.php';",2000);
  </script>
     