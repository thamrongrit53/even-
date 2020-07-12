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
          
            $check = "SELECT std_id FROM std WHERE std_id = '$std_id'";
            $result1 = mysqli_query($condb, $check) or die(mysqli_error());
            $num=mysqli_num_rows($result1);

    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
     exit();
    
    }else{
             $sql="INSERT INTO `std`(`pre`, `std_id`, `f_name`, `l_name`, `email`, `class`, `branch`, `tel`, `address`, `img`,password, `status`) VALUES ('$pre','$std_id','$f_name','$l_name','$email','$class','$branch','$tel','$address','$image','$pass','$status')";
             $query= mysqli_query( $condb, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
               $msg = "Image uploaded successfully";
            }else{
               $msg = "Failed to upload image";
            }
             if (!$query) {
               echo "<script>";
                echo "alert('กรุณาเพิ่มใหม่อีกครั้ง !');";
                echo "window.history.back();";
                  echo "</script>";
            } else{
                echo "<script type='text/javascript'>";
                echo "alert('เพิ่มข้อมูลสำเร็จ');";
                echo "window.location = 'login.php'; ";
                echo "</script>";
            }
      
            }
          }
          
      ?>

     