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
             if (empty($image)) {
                 echo "<script>";
                echo "alert(' กรุณาเลือกรูป !');";
                echo "window.history.back();";
                 echo "</script>";
                   exit();
                } 
            
             $sql="INSERT INTO `even_36h`(`name_e`, `dis_e`, `date_e1`, `time_e1`, `date_e2`, `time_e2`, `type_e`, `type_std`,`sum_time`, `img`) VALUES ('$name_e','$dis_e','$date_e1','$time_e1','$date_e2','$time_e2','$type_e','$type_std','$sum_time','$image')";
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
                echo "window.location = 'add_even_36h.php'; ";
                echo "</script>";
            }
      
            }
          
      ?>
