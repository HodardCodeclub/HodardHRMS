<?php //Developed by www.freestudentprojects.com
include("connection.php");
$sql=mysqli_query($obj,"select * from employees where empid='$_GET[empid]'");
$rs=mysqli_fetch_array($sql);
echo "<input readonly type='text' name='basic' value='$rs[basicpay]'>";
?>