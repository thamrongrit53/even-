<?php
require_once('condb.php');
require_once('session_std.php');
mysqli_set_charset($condb,"utf8");
$std_id=$_SESSION["std_id"];

          $s_sum1 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านชาติศาสน์กษัตริย์' ";
          $s_sum2 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านการอนุรักษ์สิ่งแวดล้อม' ";
          $s_sum3 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านกิจกรรมและนันทนาการ' ";
          $s_sum4 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านเศรษกิจพอเพียง' ";
          $s_sum5 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='ด้านการบริการวิชาชีพ' ";
          $s_sum6 = "SELECT SUM(sum_time) total FROM `even_std_36h` WHERE `std_id`='$std_id' AND `type_e`='อื่นๆ' ";
          
          $q_sum1 = mysqli_query($condb, $s_sum1);
          $q_sum2 = mysqli_query($condb, $s_sum2);
          $q_sum3 = mysqli_query($condb, $s_sum3);
          $q_sum4 = mysqli_query($condb, $s_sum4);
          $q_sum5 = mysqli_query($condb, $s_sum5);
          $q_sum6 = mysqli_query($condb, $s_sum6);
          
          $r_sum1 = mysqli_fetch_array($q_sum1);
          $r_sum2 = mysqli_fetch_array($q_sum2);
          $r_sum3 = mysqli_fetch_array($q_sum3);
          $r_sum4 = mysqli_fetch_array($q_sum4);
          $r_sum5 = mysqli_fetch_array($q_sum5);
          $r_sum6 = mysqli_fetch_array($q_sum6);
          
          $sum1 = $r_sum1["total"];
          $sum2 = $r_sum2["total"];
          $sum3 = $r_sum3["total"];
          $sum4 = $r_sum4["total"];
          $sum5 = $r_sum5["total"];
          $sum6 = $r_sum6["total"];

 $query = "SELECT * FROM `even_std_36h` WHERE std_id='$std_id' ORDER BY id_e DESC";
$result = mysqli_query($condb,$query);

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp',
    'fontdata' => $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNewItalic.ttf',
                'B' =>  'THSarabunNewBold.ttf',
                'BI' => "THSarabunNewBoldItalic.ttf",
            ]
        ],
]);

ob_start(); // Start get HTML code
?>


<!DOCTYPE html>
<html>
<head>
<title>PDF</title>
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
<style>
body {
    font-family: sarabun;
}
table {
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h1 style="text-align:center;">รายงานชั่วโมงกิจกรรมองค์การวิชาชีพ</h1>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">

<table>
    <tr>
    <th>รหัสนักศึกษา</th>
     <th>ชื่อกิจกรรม</th>
     <th>วันที่</th>
     <th>เวลา</th>
     <th>รายละเอียดกิจกรรมที่นักศึกษาร่วมดำเนินการ</th>
    <th>รูป</th>
    </tr>
    <?php 
   while($row = mysqli_fetch_array($result))
 {
  ?>
  
   <tr>
   <td><?php echo $row["std_id"];?></td>
    <td><?php echo $row["name_e"];?></td>
    <td><?php echo $row["date_e1"];?><?php echo $row["date_e2"];?></td>
    <td><?php echo $row["time_e1"];?> <?php echo $row["time_e2"];?></td>
    <td><?php echo $row["dis_e"];?></td>
    <td><a target="_blank" href="img_even36/<?php echo $row["img"];?>">
      <img src="img_even36/<?php echo $row["img"];?>" style=" width: 80px;height: 40px;"></a>
    </td>
   </tr>
  <?php  
} 

?>
</table>

</body>
</html>

<?php
$html = ob_get_contents();
$mpdf->WriteHTML($html);
$mpdf->Output("รายงานชั่วโมงกิจกรรมองค์การวิชาชีพ.pdf");
ob_end_flush()
?>

ดาวโหลดรายงานในรูปแบบ PDF <a href="รายงานชั่วโมงกิจกรรมองค์การวิชาชีพ.pdf">คลิกที่นี้</a>