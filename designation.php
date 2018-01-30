<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
?>
<script type="application/javascript">
function validation()
{
	if(frm2.desig.value=="")
	{	
		alert("Designation should not be empty...");
		frm2.desig.focus="";
		return false;
	}
	else if(frm2.descrip.value=="")
	{	
		alert("Description should not be empty...");
		frm2.descrip.focus="";
		return false;
	}
	else if(frm2.stat.value=="")
	{	
		alert("Kindly select status... ");
		frm2.stat.focus="";
		return false;
	}
	else
	{
		return true;
	}
}
</script>

<?php //Developed by www.freestudentprojects.com
if($_POST[sessionvalue] == $_SESSION["settid"])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editdes]))
		{
			$sqlupd="UPDATE designation SET designation='$_POST[desig]',description='$_POST[descrip]',status='$_POST[stat]' WHERE did=$_GET[editdes]";
			$sqlres=mysqli_query($obj,$sqlupd);
			if(mysqli_affected_rows($obj)==1)
			{
				$msg="<br><font color=green>Record updated successfully!!!</font>";
			}
			else
			{
				$msg="<br><font color=red>Failed to update!!!</font>";
			}
		}
		else
		{
			$sqlque  =  mysqli_query($obj, "select * from designation where designation='$_POST[desig]'");
			$cnt = mysqli_num_rows($sqlque);
			
			if($cnt == 1 )
			{
				$msg = "<br><font color='red'><b>Record already exist in database... </b></font>";
			}
			else
			{
				$sql="insert into designation values('','$_POST[desig]','$_POST[descrip]','$_POST[stat]')";
				$rsinsert = mysqli_query($obj,$sql);
				if(!$rsinsert)
				{
					$msga = "<br><font color='Green'><b>Failed to insert record... </b></font>";
				}
				else
				{
					$msga= "<br><font color='Green'><b>Record inserted successfully... </b></font>";
				}
			}
		}
	}
}

$_SESSION["settid"] = rand();

$sqlsel=mysqli_query($obj,"select * from designation where did='$_GET[editdes]'");
$res=mysqli_fetch_array($sqlsel);
?>
	<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Add designation</h1>
            
            <p>
                 
                <h6><?php //Developed by www.freestudentprojects.com echo $msga; ?></h6>
<form name=frm2 method=post action="" onsubmit="return validation()">
<table width="395" height="207" border="1">
<input type=hidden name=sessionvalue value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["settid"];?>">

<tr>
  </tr>

<tr><th height="39">Designation</th>
<td><input type=text name=desig size=30 value="<?php //Developed by www.freestudentprojects.com echo $res[designation];?>"></td></tr>

<tr><th height="51">Description</th>
<td><textarea name=descrip><?php //Developed by www.freestudentprojects.com echo $res[description];?></textarea></td></tr>

<tr><th height="39">Status</th>
<td><select name=stat><?php //Developed by www.freestudentprojects.com $arr=array("Enabled","Disabled");?>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
foreach($arr as $val)
{
	if($val==$res[status])
	{
		echo"<option value=$val selected>$val</option>";
	}
	else
	{
		echo"<option value=$val>$val</option>";
	}
}
?>
</select></td></tr>

<tr><th colspan=2><input type=submit name=submit value="Submit"></th></tr>

</table>

</form>

<?php //Developed by www.freestudentprojects.com          

$sqlsel="SELECT * FROM designation";
$res=mysqli_query($obj,$sqlsel);
?>          
 <h1>View Designation </h1>
    <h6><?php //Developed by www.freestudentprojects.com echo $msg; ?></h6>
<table border="1">

<tr>
<th width="80">Designation</th>
<th width="77">Description</th>
<th width="54">Status</th>
<th width="66">Action</th>
</tr>
<?php //Developed by www.freestudentprojects.com
while($rs=mysqli_fetch_array($res))
{
echo "<tr>
<td>$rs[designation]</td>
<td>$rs[description]</td>
<td>$rs[status]</td><td>&nbsp;";
if($rs[did]!=1)
{
	echo "<a href='designation.php?editdes=$rs[did]'>Edit </a>";
}
echo "</td></tr>";
}
?>
</table></p>

       </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>