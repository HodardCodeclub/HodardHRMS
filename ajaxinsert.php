<?php //Developed by www.freestudentprojects.com
include("connection.php");
if(isset($_GET[payform.submit2]))
{
	$dt=date();
	echo payform.empname.value;
	$sql=mysqli_query($obj,"insert into payments values('','payform.empname.value','payform.empname.value','payform.empname.value','payform.empname.value','payform.ots.value','payform.allo.value','payform.oallo.value','$dt')");
	$sql1=mysqli_query($obj,"insert into deductions values('','payform.empname.value','','','','$dt')");
	/*dedid	empid	smonth	type	deductionamt	date*/
}
?>
