<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
include("header.php");

	if(isset($_SESSION[hrid]))
	{
		$empno=$_SESSION[hrid];
	}
	if(isset($_SESSION[pmagid]))
	{
		$empno=$_SESSION[hrid];
	}
	if(isset($_SESSION[emid]))
	{
		$empno=$_SESSION[emid];
	}
if($_SESSION[setid]==$_POST[setid])
{	
if(isset($_POST[submit]))
	{
		$sql=mysqli_query($obj,"insert into attendance values('','$empno','$_POST[fdt]','$_POST[tdt]','$_POST[reason]','Pending')");
	}
}
if(isset($_GET[stat]))
{
	$sql=mysqli_query($obj,"update attendance set status='$_GET[stat]' where attid='$_GET[approve]'");
}

$_SESSION[setid]=rand();

if(isset($_SESSION[adminid]))
{
$selsql=mysqli_query($obj,"select attendance.*,employees.fname,employees.lname FROM attendance INNER JOIN employees ON attendance.empid=employees.empid  where attendance.reason!= '' ");
}
else
{
$selsql=mysqli_query($obj,"select attendance.*,employees.fname,employees.lname FROM attendance INNER JOIN employees ON attendance.empid=employees.empid where attendance.empid='$empno' AND attendance.reason!= '' ");	
}
?>
    <div id="templatemo_main">
<?php //Developed by www.freestudentprojects.com
include("sidebar.php");
?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Leave application</h1>
            
<p>
<?php //Developed by www.freestudentprojects.com
if(!isset($_SESSION[adminid]))
{
	
$curryear =  date(Y);
$qtotcl = mysqli_query($obj,"SELECT sum(DATEDIFF( attendance.logoutdate,attendance.logindate )), count(DATEDIFF( attendance.logoutdate,attendance.logindate )) from attendance where empid='$empno' AND status='Approved' AND logindate between '$curryear-01-01' AND '$curryear-12-31' AND  logoutdate between '$curryear-01-01' AND '$curryear-12-31'");
$rsfetchtcl = mysqli_fetch_array($qtotcl);

echo "<table width='402' border=1 class='tftable' ><tr><td> No. of CL Leaves taken : ". ($rsfetchtcl[0] + $rsfetchtcl[1])  . "</td></tr></table>";
	
?>
<br />
    <form method="POST" action="">
    <input type=hidden name=setid value="<?php //Developed by www.freestudentprojects.com echo $_SESSION[setid]; ?>">
    <table width="402" border=1 class="tftable" >
    <tr><th>From date</th><td><input type=date name=fdt value="<?php //Developed by www.freestudentprojects.com echo $rs[logindate]; ?>"></td></tr>
    <tr><th>To date</th><td><input type=date name=tdt></td></tr>
    <tr><th>Reason</th><td><textarea name="reason"></textarea></td></tr>
    <tr><td colspan=2 align="center"><input type=submit name=submit value=apply></td></tr>
    </table>
    </form>
    <hr />
<?php //Developed by www.freestudentprojects.com
}
?>
    <table border=1 class="tftable" >
    <tr><th>Employee name</th><th>From date</th><th>To date</th><th>Reason</th><th>Status</th>
    <?php //Developed by www.freestudentprojects.com
    if(isset($_SESSION[adminid]))
    {
	echo "<th> No. of CL taken</th>";
    echo "<th>Approve / Deny</th>";
    }
    ?>
    </tr>
    <?php //Developed by www.freestudentprojects.com 
    while($rs=mysqli_fetch_array($selsql))
    {
    echo "<tr><td>$rs[fname] $rs[lname]</td>
    <td>";
    $leavedate=$rs[logindate];
    $fdate = explode(" ",$leavedate);
    echo "$fdate[0]</td>";
    $leadate=$rs[logoutdate];
    $tdate = explode(" ",$leadate);
    echo "<td>$tdate[0]</td>
    <td>$rs[reason]</td>";
    echo "<td>$rs[status]</td>";
    if(isset($_SESSION[adminid]))
    {

	echo "<td>";
	
		$curryear =  date(Y);
		$qtotcl = mysqli_query($obj,"SELECT sum(DATEDIFF( attendance.logoutdate,attendance.logindate )), count(DATEDIFF( attendance.logoutdate,attendance.logindate )) from attendance where empid='$rs[empid]' AND status='Approved' AND logindate between '$curryear-01-01' AND '$curryear-12-31' AND  logoutdate between '$curryear-01-01' AND '$curryear-12-31'");
		$rsfetchtcl = mysqli_fetch_array($qtotcl);
		echo  $tcl = ($rsfetchtcl[0] + $rsfetchtcl[1]);
	echo "</td><td>";
	if($tcl <= 12)
	{
	echo "<a href='leaveappli.php?approve=$rs[attid]&stat=Approve'>Approve</a> | ";
	}
	else
	{
	echo "<a href='leaveappli.php?approve=$rs[attid]&stat=Rejected'>Rejected</a> | ";
	}
    echo "<a href='leaveappli.php?approve=$rs[attid]&stat=Deny'>Deny</a></td>";
    }
    ?>
    </tr>
    <?php //Developed by www.freestudentprojects.com 
    } 
    ?>
    </table>

</p>
        </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>