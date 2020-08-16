
<?php
require_once('condb.php');
require_once('session_admin.php');
mysqli_set_charset($condb,"utf8");
 $output = '';
if(isset($_POST["query"]))
{ 
 $search = mysqli_real_escape_string($condb, $_POST["query"]);
 $query = "SELECT * FROM behavior_type WHERE be_type='$search' LIMIT 1";
}

$result = mysqli_query($condb,$query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$output =$row["be_score"];

echo $output;

?>
