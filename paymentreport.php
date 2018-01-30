<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
?>
<script language="javascript">
function PrintMe(templatemo_content) {
var disp_setting="toolbar=yes,location=no,";
disp_setting+="directories=yes,menubar=yes,";
disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
   var content_vlue = document.getElementById(templatemo_content).innerHTML;
   var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
   docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
   docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
   docprint.document.write('<head><title>Vehicle Billing</title>');
   docprint.document.write('<style type="text/css">body{ margin:0px;');
   docprint.document.write('font-family:verdana,Arial;color:#000;');
   docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
   docprint.document.write('a{color:#000;text-decoration:none;} </style>');
   docprint.document.write('</head><body onLoad="self.print()"><img src="images/cu.jpg"><center>');
   docprint.document.write(content_vlue);
   docprint.document.write('</center></body></html>');
   docprint.document.close();
   docprint.focus();
}
</script>
<?php //Developed by www.freestudentprojects.com
if($_SESSION[setid]==$_POST[setid])
{
	if(isset($_POST[submit2]))
	{
		$fdate = $_POST[mon]. "-01";
		$chkdup=mysqli_query($obj,"select * from payments where empid='$_POST[empname]' and smonth='$fdate'");
		$dupcnt=mysqli_num_rows($chkdup);
		if($dupcnt==1)
		{
		$msg="<br><font color=green>Payroll for this employee is already generated";
		}
		else
		{
		$dt=date("Y-m-d");
		$ded=$_POST[deduction];
		$fdate = $_POST[mon]. "-01";
		$leaves=$_POST[twd]-$_POST[wd];
		for($a=0; $a<count($_POST[deduction]);$a++)
		{
			$dedins=mysqli_query($obj,"insert into deductions values('','$_POST[empname]','$fdate','$a','$ded[$a]','$dt')");
			$dedrec=array(mysqli_insert_id($obj));
		}
		$thirdid=$dedrec[0];
		$firstid=$thirdid-$a;
		$payins=mysqli_query($obj,"insert into payments values('','$_POST[empname]','$fdate','$leaves','$_POST[basic]','$_POST[ots]','$_POST[allo]','$_POST[oallo]','$dt')");
		$payrec=mysqli_insert_id($obj);
		}
	$empno=$_POST[empname];
	$sel=mysqli_query($obj,"SELECT employees. * , payments. * , deductions. * FROM employees INNER JOIN payments INNER JOIN deductions ON employees.empid = payments.empid AND employees.empid = deductions.empid AND deductions.smonth = payments.smonth where payments.paymentid='$payrec' and deductions.dedid between '$firstid' and '$thirdid'");
	$rs=mysqli_fetch_array($sel);
	}
}

if(isset($_POST[payrpt]))
{	
	if(isset($_SESSION[hrid]))
	{
		$empno=$_SESSION[hrid];
	}
	else if(isset($_SESSION[pmagid]))
	{
		$empno=$_SESSION[pmagid];
	}
	else if(isset($_SESSION[emid]))
	{
		$empno=$_SESSION[emid];
	}
	else
	{
		$empno=$_POST[emppay];
	}
	$monthpay=$_POST[paydmon]."-01";
	$sel=mysqli_query($obj,"SELECT employees. * , payments. * , deductions. * FROM employees INNER JOIN payments INNER JOIN deductions ON employees.empid = payments.empid AND employees.empid = deductions.empid AND deductions.smonth = payments.smonth where employees.empid='$empno' and payments.smonth='$monthpay' and deductions.smonth='$monthpay'");
	$rs=mysqli_fetch_array($sel);
}
/*if(((isset($_SESSION[hrid])) || (isset($_SESSION[pmagid])) || (isset($_SESSION[emid]))) && (isset($_POST[payrpt])))
{
	
	$monthpay=$_POST[paydmon]."-01";
	$sel=mysqli_query($obj,"SELECT employees. * , payments. * , deductions. * FROM employees INNER JOIN payments INNER JOIN deductions ON employees.empid = payments.empid AND employees.empid = deductions.empid AND deductions.smonth = payments.smonth where employees.empid='$empno'  and payments.smonth='$monthpay' and deductions.smonth='$monthpay'");
	$rs=mysqli_fetch_array($sel);
}*/

?>
<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
<h1 align="center">Payment Report</h1>
<?php //Developed by www.freestudentprojects.com echo $msg; ?>
<p>
<?php //Developed by www.freestudentprojects.com
if((isset($_POST[submit2])) || (isset($_POST[payrpt])))// || (isset($_SESSION[hrid])) || (isset($_SESSION[pmagid])) || (isset($_SESSION[emid])))
{
	if(mysqli_num_rows($sel) == 0)
	{
		echo "<h3>Payment report not generated to this month..</h3>";
	}
	else
	{
	?>

<form method=POST action="" name="frmpayroll">
<div id="printcontent">
<table align=center width="600" border="1">
<tr><td width="158">Salary month</td>
<td width="426"><?php //Developed by www.freestudentprojects.com echo $rs[smonth]; ?></td></tr>
<tr><td>Employee id</td>
<td><?php //Developed by www.freestudentprojects.com echo "$rs[empid]"; ?></td></tr>
<tr><td>Employee name</td>
<td><?php //Developed by www.freestudentprojects.com echo "$rs[fname]"." $rs[lname]"; ?></td></tr>
<tr><td>Basic pay</td>
<td><?php //Developed by www.freestudentprojects.com echo $rs[basicpay]; ?></td></tr>
</table><br>
<?php //Developed by www.freestudentprojects.com
$sql=mysqli_query($obj,"select TIMEDIFF( attendance.logoutdate,  attendance.logindate),employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where attendance.empid='$_POST[empname]' and logindate between '$fdate' AND '$tdate'  ");
	
while($res=mysqli_fetch_array($sql))
{


$time = $res[0];
$timeArr = array_reverse(explode(":", $time));
$seconds = 0;
foreach ($timeArr as $key => $value)
{
    if ($key > 2) break;
    $seconds += pow(60, $key) * $value;
}
$tseconds += $seconds;
//echo " - ". $tseconds. " - ".gmdate("H:i:s", $tseconds). " -";

$diff = $tseconds;

$onehour = 3600;
$ninhour = 32400;

if($seconds > $ninhour)
{
	$ottime = $seconds - $ninhour;
	$othours = $ottime/$onehour;
	
}
}
?>
<table width="596" border="1">
<tr><th colspan=2><h3> Payment</h3></th></tr>
<tr><th width="150">OT worked </th><td width="150"><?php //Developed by www.freestudentprojects.com echo $oth = round($othours); ?></td></tr>
<tr><th>OT salary </th><td><?php //Developed by www.freestudentprojects.com echo $rs[OTpay]; ?></td></tr>
<tr><th>Allowances </th><td><?php //Developed by www.freestudentprojects.com echo $rs[allowances]; ?></td></tr>
<tr><th>Other allowances </th><td><?php //Developed by www.freestudentprojects.com echo $rs[otherallow]; ?></td></tr>
<?php //Developed by www.freestudentprojects.com $add=$rs[basicpay]+$rs[OTpay]+$rs[allowances]+$rs[otherallow];?>
</table><br>
<table width="596" height="122" border="1">
<tr><th height="49" colspan=4><h3> Deduction</h3></th></tr>
<tr></tr>
<tr>
  <th width="75">&nbsp;</th>
  <th width="75">Type</th><th width="75">Percentage</th><th width="75">Amount</th></tr>
<?php //Developed by www.freestudentprojects.com
$dedsel=mysqli_query($obj,"SELECT employees. * , payments. * , deductions. * FROM employees INNER JOIN payments INNER JOIN deductions ON employees.empid = payments.empid AND employees.empid = deductions.empid AND deductions.smonth = payments.smonth where employees.empid='$empno' and payments.smonth='$monthpay' and deductions.smonth='$monthpay'");
$less=0;
while($dedrs=mysqli_fetch_array($dedsel))
{$less=$less+$dedrs[deductionamt];
if($dedrs[type]==0)
{
echo "<tr><td align=center>Loss Of Pay</td><td align=center>$dedrs[leavestaken]</td><td  align=center >$dedrs[deductionamt]</td></tr>";
}
else if($dedrs[type]==1)
echo "<tr><td align=center>PF</td><td align=center>12%</td><td  align=center >  $dedrs[deductionamt]</td></tr>";
else if($dedrs[type]==2)
echo "<tr><td align=center>Income Tax</td><td align=center>0.83%</td><td  align=center> $dedrs[deductionamt] </td></tr>";
}
$net=$add-$less;
?><tr>&nbsp;</tr>
<tr> <th colspan=4>&nbsp;Your net pay is:&nbsp;<?php //Developed by www.freestudentprojects.com echo $net;?></tr>
</table>
</div>
<br />
<table width="596" height="34" border="1">
  <?php //Developed by www.freestudentprojects.com
$dedsel=mysqli_query($obj,"SELECT employees. * , payments. * , deductions. * FROM employees INNER JOIN payments INNER JOIN deductions ON employees.empid = payments.empid AND employees.empid = deductions.empid AND deductions.smonth = payments.smonth where employees.empid='$empno' and payments.smonth='$monthpay' and deductions.smonth='$monthpay'");
$less=0;
while($dedrs=mysqli_fetch_array($dedsel))
{$less=$less+$dedrs[deductionamt];
if($dedrs[type]==0)
{
echo "<tr><td align=center>Loss Of Pay</td><td align=center>$dedrs[leavestaken]</td><td  align=center >$dedrs[deductionamt]</td></tr>";
}
else if($dedrs[type]==1)
echo "<tr><td align=center>PF</td><td align=center>12%</td><td  align=center >  $dedrs[deductionamt]</td></tr>";
else if($dedrs[type]==2)
echo "<tr><td align=center>Income Tax</td><td align=center>0.83%</td><td  align=center> $dedrs[deductionamt] </td></tr>";
}
$net=$add-$less;
?>
  <tr>
    <th height="28" colspan="4"><input type="button" name="print2" value="Print"  onclick="PrintMe('printcontent')" /></th>
  </tr>
</table>
</form>
<p>

 <?php //Developed by www.freestudentprojects.com 
}
 } 
else
{

?>
</p>

<p>&nbsp; </p>
<form method=POST action="">
  <?php //Developed by www.freestudentprojects.com if(isset($_SESSION[adminid]))
{?>
  Select the employee:&nbsp;&nbsp;
  <select name=emppay>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
$empsel=mysqli_query($obj,"select * from employees where status='Enabled'");
while($emplo=mysqli_fetch_array($empsel))
{
	echo "<option value='$emplo[empid]'>". $emplo[fname]." ". $emplo[lname]."</option>";
}
}
?>
</select>
Choose the month:&nbsp;&nbsp;
<input type=month name=paydmon />
<input type=submit value="Payroll Report" name=payrpt>
</form>
<?php //Developed by www.freestudentprojects.com

} ?>
</center>
</p>
</div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>