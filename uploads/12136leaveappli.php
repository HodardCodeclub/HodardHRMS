<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
include("header.php");
if($_SESSION[setid]==$_POST[setid])
{
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
		$empno=$_SESSION[hrid];
	}
	if(isset($_POST[submit]))
	{
		$sql=mysqli_query($obj,"insert into attendance values('','$empno','$_POST[fdt]','$_POST[tdt]','$_POST[reason]','Pending')");
	}
}
if(isset($_GET[approve]))
{
	$sql=mysqli_query($obj,"update attendance set status='Approved' where attid='$_GET[approve]'");
}
else if(isset($_GET[deny]))
{
	$sql=mysqli_query($obj,"update attendance set status='Denied' where attid='$_GET[deny]'");
}
$_SESSION[setid]=rand();
$selsql=mysqli_query($obj,"select attendance.*,employees.fname,employees.lname FROM attendance INNER JOIN employees ON attendance.empid=employees.empid where attendance.status='Pending'");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Latest News</h1>
            
            <p>

<form method="POST" action="">
<input type=hidden name=setid value="<?php //Developed by www.freestudentprojects.com echo $_SESSION[setid]; ?>">
<?php //Developed by www.freestudentprojects.com if(!isset($_SESSION[adminid]))
{ ?>
<table border=1>
<tr><th>From date</th><td><input type=date name=fdt value="<?php //Developed by www.freestudentprojects.com echo $rs[logindate]; ?>"></td></tr>
<tr><th>To date</th><td><input type=date name=tdt></td></tr>
<tr><th>Reason</th><td><input type=text name=reason></td></tr>
<tr><th colspan=2><input type=submit name=submit value=apply></th></tr>
</table>
</form>
<?php //Developed by www.freestudentprojects.com
 } 
else
{
?>
<table border=1>
<tr><th>Employee name</th><th>From date</th><th>To date</th><th>Reason</th><th>Approve / Deny</th>
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
<td>$rs[reason]</td>
<td><a href='leaveappli.php?approve=$rs[attid]'>Approve</a> | 
<a href='leaveappli.php?deny=$rs[attid]'>Deny</a></td>";
}
?>
</table>
<?php //Developed by www.freestudentprojects.com } ?>
</p>
        </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>