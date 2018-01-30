<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
date_default_timezone_set("Asia/Kolkata");
$dt=date('Y-m-d H-i-s');
$sql=mysqli_query($obj,"update attendance set logoutdate='$dt' where attid='$_SESSION[attid]'");

session_destroy();
header("Location: index.php");
?>