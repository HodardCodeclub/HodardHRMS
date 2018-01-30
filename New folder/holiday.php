<?php //Developed by www.freestudentprojects.com
session_start();
include("header.php");
include("connection.php");
?>
<div id="templatemo_main">
<?php //Developed by www.freestudentprojects.com
include("sidebar.php");
if($_SESSION[setid]==$_POST[sessionvalue])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editholiday]))
		{
			$updt=mysqli_query($obj,"update holiday set reason=$_POST[type] where hdate='$_GET[editholiday]'");
			if(mysqli_affected_rows($obj)==1)
			{
				$msg="<br> <font color=green> Record Updated!!</font>";
			}
			else
			{
				$msg="<br><font color=red>Failed to update record!!</font>";
			}
		}
		else
		{
			$sql=mysqli_query($obj,"select * from holiday where hdate='$_POST[dt]'");
			$count=mysqli_num_rows($sql);
			if($count>=1)
			{
				$msg="<br><font color=red>This date is set holiday!!!</font>";
			}
			else
			{
				$sqlins="insert into holiday values('$_POST[dt]','$_POST[type]')";
				$rcins=mysqli_query($obj,$sqlins);
				if(isset($rcins))
				{
					$msg="<br><font color=green>Record inserted!!</font>";
				}
				else
				{
					$msg="<br><font color=red>Failed to insert record!!</font>";
				}
			}
		}
	}
}
$_SESSION[setid]=rand();
$selsql=mysqli_query($obj,"select * from holiday ");
$res=mysqli_fetch_array($selsql);
?> <!-- end of templatemo_sidebar -->
<div id="templatemo_content">
<?php //Developed by www.freestudentprojects.com if(isset($_SESSION[adminid]))
{?>
<h1>Add Holiday</h1>
<p>
<form method=post action="">
<?php //Developed by www.freestudentprojects.com echo $msg;?>
<input type=hidden name=sessionvalue value="<?php //Developed by www.freestudentprojects.com echo $_SESSION[setid];?>">
<table width="289" border=1>
<tr><th width="104">Date</th>
<td width="169"><input type=date name=dt value="<?php //Developed by www.freestudentprojects.com echo $res[hdate];?>" ></td></tr>
<tr><th>Type</th>
<td>
<input type="text" name="type" value="<?php //Developed by www.freestudentprojects.com echo $res[reason];?>" />
</td></tr>
<tr><th colspan=2><input type=submit name=submit value=Submit /></th></tr>
</table>
</form>
<?php //Developed by www.freestudentprojects.com } ?>
<br><br><h2>The Holidays for this year:</h2><br>
<form>
<table border=1>
<tr><th width="104">Date</th>
<th width="169">Reason</th>
<th>Action</th></tr>
<?php //Developed by www.freestudentprojects.com while($rs=mysqli_fetch_array($selsql))
{
	echo "<tr><td>$rs[hdate]</td>
	<td>$rs[reason]</td>";
	echo "<td><a href='holiday.php?editholiday=$rs[hdate]'>Edit </a>
	| <a href='holiday.php?delholiday=$rs[hdate]'> Delete </a></td>
	</tr>";
}?>
</table>
</form>
</p>
</div> <!-- end of templatemo_content -->
<div class="cleaner"></div>
</div> <!-- end of templatemo_main -->
<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>