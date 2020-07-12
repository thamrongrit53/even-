<?php
          require_once('condb.php'); 
           mysqli_set_charset($condb,"utf8");
    
         if (isset($_POST['submit'])) {
            $std_id = $_POST["std_id"];
            $name_e = $_POST["name_e"];
            $dis_e = $_POST["dis_e"];
            $date_e1 = $_POST["date_e1"];
            $date_e2 = $_POST["date_e2"];
            $time_e1 = $_POST["time_e1"];
            $time_e2 = $_POST["time_e2"];
            $type_e = $_POST["type_e"];
            $sum_time = $_POST["sum_time"];
            $image = $_FILES['files']['name'];
            $target = "img_even36/".basename($image);
            if (empty($image)) {
                 echo "<script>";
                echo "alert(' กรุณาเลือกรูป !');";
                echo "window.history.back();";
                 echo "</script>";
                  exit();
                } 
            $check = "SELECT * FROM even_std_36h WHERE std_id = '$std_id' AND name_e ='$name_e'";
            $result1 = mysqli_query($condb, $check) or die(mysqli_error());
            $num=mysqli_num_rows($result1);

    if($num > 0)
    {
    echo "<script>";
    echo "alert('ได้บันทึกแล้วไปแล้ว');";
    echo "window.location = 'home.php'; ";
    echo "</script>";
     exit();
    }else{   
            
             $sql="INSERT INTO `even_std_36h`(`std_id`, `name_e`, `dis_e`, `date_e1`, `time_e1`, `date_e2`, `time_e2`, `sum_time`, `type_e`, `img`) VALUES ('$std_id','$name_e','$dis_e','$date_e1','$time_e1','$date_e2','$time_e2','$sum_time','$type_e','$image')";
            $query= mysqli_query( $condb, $sql);
            if (move_uploaded_file($_FILES['files']['tmp_name'],$target)) {
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
                echo "window.location = 'home.php'; ";
                echo "</script>";
            }
      
            }
          }
      ?>
