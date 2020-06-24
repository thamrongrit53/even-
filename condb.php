<?php
date_default_timezone_set("Asia/Bangkok");
$servername = "localhost";
$database = "school_attendance";
$username = "kj5ie5k0ggso";
$password = "P@ch86eR";
// Create connection
$condb = new mysqli($servername, $username, $password,$database);

// Check connection
if ($condb->connect_error) {
    die("Connection failed: " . $condb->connect_error);
} 
?>