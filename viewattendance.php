<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
include("header.php");

if(isset($_POST[submit1]) )
{
$fdate = $_POST[year]. "-".$_POST[mon]. "-01";
$num = cal_days_in_month(CAL_GREGORIAN, $_POST[mon], $_POST[year]);
$tdate =  $_POST[year]. "-".$_POST[mon]. "-".$num;
$empno=$_POST[emp];
$sql=mysqli_query($obj,"select TIMEDIFF( attendance.logoutdate,  attendance.logindate),employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where attendance.empid='$_POST[emp]' and attendance.status='' and logindate between '$fdate' AND '$tdate'  ");	
$numworkingdays = mysqli_num_rows($sql);

$sql1=mysqli_query($obj,"select distinct(DATE_FORMAT(logindate,'%Y-%m-%d'))  from attendance where attendance.empid='$_POST[emp]' and attendance.status='' and logindate between '$fdate' AND '$tdate'   ");	
	 $numworkingdays = mysqli_num_rows($sql1);

}

if((isset($_SESSION[hrid])) || (isset($_SESSION[pmagid])) || (isset($_SESSION[emid])))
{
	if(isset($_SESSION[hrid]))
	{
		$empno=$_SESSION[hrid];
	}
	if(isset($_SESSION[pmagid]))
	{
		$empno=$_SESSION[pmagid];
	}
	if(isset($_SESSION[emid]))
	{
		$empno=$_SESSION[emid];
	}
	$sql=mysqli_query($obj,"select TIMEDIFF( attendance.logoutdate,  attendance.logindate),employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where attendance.empid='$empno' and attendance.status='' and logindate between '$fdate' AND '$tdate'   ");	
	//$numworkingdays = mysqli_num_rows($sql);
	
		$sql1=mysqli_query($obj,"select distinct(DATE_FORMAT(logindate,'%Y-%m-%d'))  from attendance where attendance.empid='$empno' and attendance.status='' and logindate between '$fdate' AND '$tdate'   ");	
	 $numworkingdays = mysqli_num_rows($sql1);
}
?>
   <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Employee attendance</h1>
            
            <p>
<?php //Developed by www.freestudentprojects.com 
if(!isset($_POST[submit1]) )
{?>
<form method=POST action="">
<table border=1>
<tr><th>Month</th>
<td>
<select name=mon>
<option>Select</option>
<option value=01>January</option>
<option value=02>February</option>
<option value=03>March</option>
<option value=04>April</option>
<option value=05>May</option>
<option value=06>June</option>
<option value=07>July</option>
<option value=08>August</option>
<option value=09>September</option>
<option value=10>October</option>
<option value=11>November</option>
<option value=12>December</option>
</select>
</td>
<th>Year</th>
<td><select name=year>
<option>Select</option>
<?php //Developed by www.freestudentprojects.com
for($i=2010; $i<=date(Y); $i++)
{
echo "<option value=$i>$i</option>";
}
?>
</select>
</td>
<?php //Developed by www.freestudentprojects.com
if(isset($_SESSION[adminid]))
{ ?>
<th>Employee name</th>
<td>
<select name="emp">
<option>Select</option>
<?php //Developed by www.freestudentprojects.com
$res=mysqli_query($obj,"select empid,fname,lname from employees where status='Enabled' AND did>1");
while($rs=mysqli_fetch_array($res))
{
            	echo"<option value=$rs[empid]>$rs[fname] $rs[lname]</option>";
}
?>
</select>
</td> <?php //Developed by www.freestudentprojects.com } ?>
<td><input type=submit name="submit1" value=submit /></td>
</tr>
</table>
<?php //Developed by www.freestudentprojects.com } 
else
{
$empdisp=mysqli_query($obj,"select empid,lname,fname from employees where empid='$empno' or empid='$_POST[emp]'");
$name=mysqli_fetch_array($empdisp);
?>
<b>Employee ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	:</b>&nbsp;&nbsp;<?php //Developed by www.freestudentprojects.com echo $name[empid]; ?><br>
<b>Employee Name	:</b>&nbsp;&nbsp;<?php //Developed by www.freestudentprojects.com echo $name[fname]." ". $name[lname]; ?><br>
<b>Month		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;&nbsp;<?php //Developed by www.freestudentprojects.com echo $_POST[year]. "-".$_POST[mon]; ?><br>
<table border=1>
<tr><th>Login date & time</th>
<th>Logout date & time</th>
<th>Total working hours</th>
</tr>
<?php //Developed by www.freestudentprojects.com
while($rs=mysqli_fetch_array($sql))
{
	
	echo"<tr> ";

$time = $rs[0];
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

	echo "<td>$rs[logindate]</td>
	<td>$rs[logoutdate]</td>
	<td>$rs[0]</td></tr>";
//$timecalulate = $rs[0];
}
/*
echo $timecalulate;
echo gmdate("H:i:s", ($timecalulate * 60));
$from       = '13:43:13';
$to         = '18:53:13';

$total      = strtotime($to) - strtotime($from);
$hours      = floor($total / 60 / 60);
$minutes    = round(($total - ($hours * 60 * 60)) / 60);
*/
?>

</table>
<table width="555" border="1">
  <tr>
    <th width="404">Total working hours</th>
    <th width="135"><?php //Developed by www.freestudentprojects.com 
$formathms = sprintf('%02d:%02d:%02d', ($diff / 3600), ($diff / 60 % 60), $diff % 60);
echo $formathms;
	
	?></th>
  </tr>
  <tr>
    <th>No. of working days</th>
    <th>&nbsp;<?php //Developed by www.freestudentprojects.com echo $numworkingdays; ?></th>
  </tr>
</table>
</form><?php //Developed by www.freestudentprojects.com } ?>
</div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>