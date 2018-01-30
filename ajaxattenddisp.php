<?php //Developed by www.freestudentprojects.com
include("connection.php");

if(isset($_GET[empid]) )
{

//$_GET[month]
$d = date_parse_from_format("Y-m", $_GET[month]);
$month = $d["month"];
$year = $d["year"];

$fdate = $year. "-".$month. "-01";
$num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$tdate =  $year. "-".$month. "-".$num;

$sql=mysqli_query($obj,"select TIMEDIFF( attendance.logoutdate, attendance.logindate),employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where attendance.empid='$_GET[empid]' and attendance.status = ''  AND logindate between '$fdate' AND '$tdate' ");	
$numworkingdays = mysqli_num_rows($sql);

$sqlcl=mysqli_query($obj,"select employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where attendance.empid='$_GET[empid]' and attendance.status = 'CL'  AND logindate between '$fdate' AND '$tdate' ");	
$numcl = mysqli_num_rows($sqlcl);

$sqlsl=mysqli_query($obj,"select employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where attendance.empid='$_GET[empid]' and attendance.status = 'SL'  AND logindate between '$fdate' AND '$tdate' ");	
$numsl = mysqli_num_rows($sqlsl);

}

$holiday=mysqli_query($obj,"select * from holiday where hdate between '$fdate' and '$tdate'");
$days=mysqli_num_rows($holiday);
$total=$num-$days;

$pf=$_GET[basicpay]*0.12;
$tax=$_GET[basicpay]*0.83/100;

$salday = $numworkingdays+$numcl+$numsl ;
$dedday = $total - $salday;

$lop = ( $_GET[basicpay] / $total) * $dedday ;

?>
<h1>Attendance Report</h1>
<table width="603" border=1>
<th>Login date & time</th>
<th>Logout date & time</th>
<th>Working hours</th>
<th> OT Worked </th>

</tr>
<?php //Developed by www.freestudentprojects.com
while($rs=mysqli_fetch_array($sql))
{


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

$onehour = 3600;
$ninhour = 32400;

if($seconds > $ninhour)
{
	$ottime = $seconds - $ninhour;
	$othours = $ottime/$onehour;
	
}

	echo "<td>$rs[logindate]</td>
	<td>$rs[logoutdate]</td>
	<td>$rs[0]</td>
	<td>";
	echo $oth = round($othours);
	$totalot = $totalot + $oth;
	echo "</td></tr>
	";
	$othours=0;
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
<table width="604" border="1">
  <tr>
    <th width="441">Total hours worked</th>
    <th width="150"><?php //Developed by www.freestudentprojects.com 
$formathms = sprintf('%02d:%02d:%02d', ($diff / 3600), ($diff / 60 % 60), $diff % 60);
echo $formathms;
	
	?></th>
  </tr>
  <tr>
    <th>No. of days worked</th>
    <th>&nbsp;<?php //Developed by www.freestudentprojects.com echo $numworkingdays; ?></th>
  </tr>
</table>

<?php //Developed by www.freestudentprojects.com
$payperday = $_GET[basicpay]/$total;
$payperhour = $payperday/8;
$otsalary = $payperhour * $totalot;
?>

<table >
<tr><th>Total working days</th><td> <input readonly type=text name=twd value="<?php //Developed by www.freestudentprojects.com echo $total; ?>"></td></tr>
<tr><th>Total worked days </th><td><input readonly type=text name=wd value="<?php //Developed by www.freestudentprojects.com echo $numworkingdays; ?>"></td></tr>
<tr>
  <th>SL Taken</th>
  <td>&nbsp;<input readonly type=text name=sl value="<?php //Developed by www.freestudentprojects.com echo $numsl; ?>" ></td>
</tr>
<tr>
  <th>CL Taken</th>
  <td>&nbsp;<input readonly type=text name=cl value="<?php //Developed by www.freestudentprojects.com echo $numcl; ?>"  /></td>
</tr>
<tr><th>OT worked </th><td><input readonly type=text name=otw value="<?php //Developed by www.freestudentprojects.com echo $totalot; ?>" /></td></tr>
<tr><th>OT salary </th><td><input readonly type=text name=ots value="<?php //Developed by www.freestudentprojects.com echo $otsalary; ?>"></td></tr>
<tr><th>Allowances </th><td><input type=text name=allo value="0"></td></tr>
<tr><th>Other allowances </th><td><input type=text name=oallo value="0"></td></tr>
<tr></tr>
<tr ><th colspan=4><h3> Deduction</h3></th></tr>
<tr></tr>
<tr><th>Type</th><th>Percentage</th><th>Amount</th></tr> 
<tr><td align=center>Loss Of Pay</td><td></td><td><input type=text readonly value="<?php //Developed by www.freestudentprojects.com echo $lop; ?>" name="deduction[]"></td></tr>
<tr><td align=center>PF</td><td>12%</td><td><input type=text readonly value="<?php //Developed by www.freestudentprojects.com echo $pf; ?>" name="deduction[]"></td></tr>
<?php //Developed by www.freestudentprojects.com
if($_GET[basicpay]>20000)
{
echo "<tr><td align=center>Income Tax</td><td>0.83%</td><td>";?>
<input type=text readonly value="<?php //Developed by www.freestudentprojects.com echo $tax;?>" name="deduction[]"></td></tr>
<?php //Developed by www.freestudentprojects.com
}
else
{
	echo "<tr><td><input type=hidden name='deduction[]' value=0></td></tr>";
}
?>
<tr></tr>
<tr><td align="center"><input type=button name="submit1" value="Calculate" onClick="return calculatesal()"  ></td></tr>
<tr><th>Total salary</th><td> <input type=text name=total value=""></td></tr>
<tr><th colspan=4><input type=submit name="submit2" value=Submit></th></tr>
</table>