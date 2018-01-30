<?php //Developed by www.freestudentprojects.com
include("connection.php");
if(isset($_GET[delemp]))
{
	$sqldel="DELETE FROM employee WHERE empid='$_GET[delemp]'";
	$rsdel=mysqli_query($obj,$sqldel);
	if(!$rsdel)
		{
		$msg="Failed to delete!!!";
		}
	else
		{
		$msg="Record deleted successfully!!!";
		}
}
$sqlsel="SELECT employees.*,designation.designation FROM employees INNER JOIN designation ON employees.did=designation.did and employees.status='Enabled'";
$res=mysqli_query($obj,$sqlsel);
?>
<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>View Employees</h1>
            
            <p>
<table border="1">
<tr><th colspan=7>Employee Records
<?php //Developed by www.freestudentprojects.com echo $msg; ?></th></tr>
<tr>
<th width="40">Image</th>
<th width="61">Full Name</th>
<th width="98">Moblie Number</th>
<th width="78">Designation</th>
<th width="79">User Name</th>
<th width="62">Basic Pay</th>
<th width="64">Action</th>
</tr>


<?php //Developed by www.freestudentprojects.com
while($rs=mysqli_fetch_array($res))
{
echo "<tr>
<td><img src='uploads/$rs[empimg]' width=100 height=100></img></td>
<td>$rs[fname] $rs[lname]</td>
<td>$rs[mobilenumber]</td>
<td>$rs[designation]</td>
<td>$rs[username]</td>
<td>$rs[basicpay]</td>";
if($rs[did]>2)
{
	echo "<td><a href='employee.php?editemp=$rs[empid]'>Edit </a>";
	
echo "</td></tr>";
}
else
{
	echo"<td>&nbsp;";
}
}
?>
</table>
</p> </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>