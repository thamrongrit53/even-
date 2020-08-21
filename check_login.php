<?php
	session_start();
  	require_once('condb.php');
  	mysqli_set_charset($condb,"utf8");

	 $username =$_POST['username'];
     $user =mysqli_real_escape_string($condb,$username);
     $password=$_POST['password'];
     $pass = mysqli_real_escape_string($condb,$password);
     $encodepass=md5($pass);
	$strSQL="SELECT * FROM `std` WHERE `email`='$user' AND password='$encodepass'";
	$objQuery=mysqli_query($condb,$strSQL);

	$objResult=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
 	
	if(!$objResult)
	{		
	
			header("location:error_pass.php");
	}
	else
	{		
			$_SESSION["email"] = $objResult["email"];
			$_SESSION["f_name"] = $objResult["f_name"];
			$_SESSION["l_name"] = $objResult["l_name"];
			$_SESSION["class"] = $objResult["class"];
			$_SESSION["branch"] = $objResult["branch"];
			$_SESSION["img"] = $objResult["img"];
			$_SESSION["std_id"] = $objResult["std_id"];
			$_SESSION["status"] = $objResult["status"];

  			setcookie($username, md5($objResult["std_id"]), time() + (86400 * 30), "/");

			if($objResult["status"] == "admin")
			{
				
				header("location:admin.php");
			}
			else if($objResult["status"] == "teacher")
			{
				
				header("location:teacher.php");
			}
			else if ($objResult["status"] == "std")
			{
				header("location:home.php");
			}else{
				header("location:error.php");
			};
	};
	mysqli_close($condb);
?>
