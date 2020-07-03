<?php 
require_once('condb.php');
require_once('session_std.php');
mysqli_set_charset($conn,"utf8");

$id=$_GET["id"];

$query = "SELECT * FROM even_36h WHERE id_e='$id' ORDER BY id_e DESC";
$result = mysqli_query($condb,$query);
$objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);
$std_id =$_SESSION["std_id"];
$f_name=$_SESSION["f_name"];
$l_name=$_SESSION["l_name"];
$clas=$_SESSION["class"];
$branch=$_SESSION["branch"];
$id_e=$objResult["id_e"];
$name_e=$objResult["name_e"];
$time=date("d-m-Y H:i:s");


$sql="INSERT INTO `join_even`(`std_id`,`f_name`,`l_name`,`class`,`branch`,`id_e`,`name_e`, `join_time`) VALUES ('$std_id','$f_name','$l_name','$clas','$branch','$id_e','$name_e','$time')";
$query= mysqli_query( $condb, $sql);
       if (!$query) {
              header("location:error.php");
              exit();
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
    setTimeout("location.href = 'home.php';",1000);
  </script>