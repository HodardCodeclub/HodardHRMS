<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
if(isset($_GET[delpj]))
{
	$delsql="DELETE FROM projects WHERE projectid='$_GET[delpj]'";
	$resdel=mysqli_query($obj,$delsql);
	if(!$resdel)
	{
		$msg="<br><font color=red>Could not delete the record</font>";
	}
	else
	{
		$msg="<br><font color=green>Record deleted successfully....</font>";
	}
}

	if(isset($_POST[submitprost]))
		{
			$dt=date('Y-m-d');
			if($_POST[projectstatus]=="Completed")
			{
				$sql = mysqli_query($obj,"UPDATE projectstatus SET status='$_POST[projectstatus]',completedate='$dt' WHERE projectstid='$_POST[projectstid]' ");
			}
			else
			{
				$sql = mysqli_query($obj,"UPDATE projectstatus SET status='$_POST[projectstatus]' WHERE projectstid='$_POST[projectstid]' ");
			}
		}

if(isset($_SESSION[pmagid]))
{
$sqlsel="SELECT projects.*,employees.fname,employees.lname FROM projects INNER JOIN employees ON projects.empid=employees.empid where projects.empid='$_SESSION[pmagid]'";
}
else if(isset($_SESSION[emid]))
{
$sqlsel="select projectstatus.*,projects.* from projects inner join projectstatus on projects.projectid=projectstatus.projectid where projectstatus.empid='$_SESSION[emid]' and projectstatus.status='Pending'";
}
else
{
$sqlsel="SELECT projects.*,employees.fname,employees.lname FROM projects INNER JOIN employees ON projects.empid=employees.empid";
}
$res=mysqli_query($obj,$sqlsel);

include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>View Projects</h1>
            
            <p>
<?php //Developed by www.freestudentprojects.com echo $msg; ?>
<?php //Developed by www.freestudentprojects.com
if(mysqli_num_rows($res) == 0)
{

	echo "You are not assigned any project";
}
else
{
?>
<table width="637" border=1>
<tr><th colspan=9>View Project</th></tr>
<?php //Developed by www.freestudentprojects.com if(isset($_SESSION[adminid]))
	{echo "<th>Employee name</th> ";}?>
<th>Project Title</th> 
<th>Description</th>
<th>Document</th>
<th>Date</th>
<th>Status</th>
<?php //Developed by www.freestudentprojects.com
	if(isset($_SESSION[adminid]))
	{
?>
<th>Action</th>
<?php //Developed by www.freestudentprojects.com
	}
?>

<?php //Developed by www.freestudentprojects.com
	if(isset($_SESSION[pmagid]))
	{
?>
<th>Assign Project</th>
<?php //Developed by www.freestudentprojects.com
	}
?>

</tr>
<?php //Developed by www.freestudentprojects.com
while($rs=mysqli_fetch_array($res))
{
    echo "<tr>";
	if(isset($_SESSION[adminid]))
	{	
      echo "<td>$rs[fname] $rs[lname]</td> "; 
	}
	echo "<td>$rs[projecttitle]
	<br> <img src='uploads/$rs[image]' height='40' width=75' > </img></td>
    <td>$rs[description]</td>
    <td><a href='uploads/$rs[document]'>Click here</a></td>
    <td>Start date: $rs[startdate]<br>
	End Date:$rs[endstart]</td>
    <td>$rs[status]</td>";
	if(isset($_SESSION[adminid]))
	{
	echo "<td>
	<a href='addproject.php?editpj=$rs[projectid]'>Edit</a>
	|
    <a href='viewproject.php?delpj=$rs[projectid]'>Delete</a>
	</td>";
	}
	
	if(isset($_SESSION[pmagid]))
	{
	
	$sqlps="SELECT * FROM projectstatus where projectid='$rs[projectid]'";
	$resps=mysqli_query($obj,$sqlps);

		if(mysqli_num_rows($resps) >= 1)	
		{
		echo "<td><a href='viewprojectstatus.php?projectid=$rs[projectid]'>View project status</a></td>";
		}
		else
		{
		echo "<td><a href='assign.php?projectid=$rs[projectid]'>Assign project</a></td>";
		}
		
	}
    echo "</tr>";
}
?>
</table>
<hr />
<?php //Developed by www.freestudentprojects.com
if(isset($_SESSION[emid]))
{?>
<table border=1>
<tr><th colspan=9>View Module</th></tr>
<tr><th>Project Element</th> 
<th>Project Module</th>
<th>Start Date</th>
<th>End Date</th>
<th>Set status for the module</th>
</tr>
<?php //Developed by www.freestudentprojects.com 
$sqlsel=mysqli_query($obj,"select projectstatus.*,projects.* from projects inner join projectstatus on projects.projectid=projectstatus.projectid where projectstatus.empid='$_SESSION[emid]' and projectstatus.status='Pending'");
while($rs=mysqli_fetch_array($sqlsel))
{
echo "<tr><th>$rs[projectelement]</td> 
<td>$rs[projectmodule]</td>
<td>$rs[startdate]</td>
<td>$rs[enddate]</td>
<td><form method='post'  action='' >
	<input type='hidden' name='projectstid' value='$rs[projectstid]'>
	<select name='projectstatus'>
	<option value=''>Select</option>";
	$arr = array('Pending','Completed','Under process');
	foreach($arr as $val)
	{
	echo "<option value='$val'>$val</option>"; 
	}
	echo "</select>
	<input type='submit' name='submitprost'> 
	</form></td></tr>";
}?>
</table>
<?php //Developed by www.freestudentprojects.com }?>
<?php //Developed by www.freestudentprojects.com
}
?>
</p>
              </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>