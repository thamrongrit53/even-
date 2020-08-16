<?php
          require_once('condb.php'); 
           mysqli_set_charset($condb,"utf8");
    
            $block = $_POST["block"];
            $std_id = $_POST["std_id"];
            $be_type = $_POST["type"];
            $score = $_POST["score"];
            $dis=$_POST["dis"];
         $sql="INSERT INTO `behavior`(`block`, `std_id`, `be_type`, `score`, `dis`) VALUES ('$block','$std_id','$be_type','$score','$dis')";
            $query= mysqli_query( $condb, $sql);
           
           if (!$query) {
               echo "<script>";
                echo "alert('กรุณาเพิ่มใหม่อีกครั้ง !');";
                echo "window.history.back();";
                  echo "</script>";
            } else{
                echo "<script type='text/javascript'>";
                echo "alert('เพิ่มข้อมูลสำเร็จ');";
                echo "window.location = 'dis_behavior.php'; ";
                echo "</script>";
            }
      
            
          
      ?>
