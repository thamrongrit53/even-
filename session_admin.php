<?php 
session_start();
  if($_SESSION['email'] == "")
  {
    echo "Please Login!";
    sleep(5);
    header("location:login.php");
    exit();
  }

  if($_SESSION['status'] != "admin")
  {
    echo "This page for admin only!";
    sleep(5);
    header("location:login.php");
    exit();
  } 
  mysqli_set_charset($condb,"utf8");

 ?>