<?php
          require_once('condb.php'); 
           mysqli_set_charset($condb,"utf8");
    
         if (isset($_POST['submit'])) {
            $std_id = $_POST["std_id"];
            $dis_e = $_POST["dis_e"];
            $date_e1 = $_POST["date_e1"];
            $time_e1 = $_POST["time_e1"];
            $time_e2 = $_POST["time_e2"];
            $sum_time = $_POST["sum_time"];
            $image = $_FILES['files']['name'];
            $target = "img_even216/".basename($image);
             if (empty($image)) {
                 echo "<script>";
                echo "alert(' กรุณาเลือกรูป !');";
                echo "window.history.back();";
                 echo "</script>";
               exit();
                } 


             $sql="INSERT INTO `even_216h`(`std_id`,`dis_e`,`date_e1`, `time_e1`, `time_e2`, `sum_time`, `img`) VALUES ('$std_id','$dis_e','$date_e1','$time_e1','$time_e2','$sum_time','$image')";
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
          
      ?>
