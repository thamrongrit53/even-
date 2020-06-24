<?php 
session_start();
  if($_SESSION['email'] == "")
  {
    echo "Please Login!";
    sleep(5);
    header("location:login.php");
    exit();
  }

  if($_SESSION['status'] != "std")
  {
    echo "This page for student only!";
    sleep(5);
    header("location:login.php");
    exit();
  } 
  mysqli_set_charset($condb,"utf8");

 ?>