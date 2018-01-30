<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");

$dt = date("Y-m-d");

if($_POST[sessionvalue] == $_SESSION["settid"])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editemp]))
		{
			$sqledit="UPDATE employees SET fname='$_POST[fname]',lname='$_POST[lname]',address='$_POST[add]',contactnumber='$_POST[cno]',mobilenumber='$_POST[mob]',username='$_POST[uname]',basicpay='$_POST[bpay]',status='$_POST[stat]' WHERE empid='$_GET[edituser]'";
			$rsedit=mysqli_query($obj,$sqledit);
			if(!$rsedit)
			{
				$msg="<br><font color=red>Failed to update</font>";
			}
			else
			{
				$msg="<br><font color=green>Reord updated successfully!!!</font>";
			}
		}
		else
		{
			$sqlque  =  mysqli_query($obj, "select * from users where username='$_POST[uname]'");
			$cnt = mysqli_num_rows($sqlque);
		
			if($cnt == 1 )
			{
				$msg = "<br><font color='red'><b>Record already exist in database... </b></font>";
			}
			else
			{
				$sql="insert into users values('','$_POST[des]','$_POST[fname]','$_POST[lname]','$_POST[cno]','$_POST[uname]','$_POST[pass]','$_POST[utype]','$dt','$_POST[stat]')";
				$rsinsert=mysqli_query($obj,$sql);
				if(!$rsinsert)
				{
					$msg= "<br><font color='Green'><b>Failed to insert record... </b></font>";
				}
				else
				{
					$msg= "<br><font color='Green'><b>Record inserted successfully... </b></font>";
				}
			}
		}
	}
}

$resultdesg = mysqli_query($obj, "SELECT * FROM designation WHERE status='Enabled'");
$_SESSION["settid"] = rand();


$res=mysqli_query($obj,"SELECT * FROM employees WHERE empid='$_GET[editemp]'");
$rs=mysqli_fetch_array($res);
?>
<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Add User</h1>
            
            <p>
<form name=frm1 method=post action="">
<table width="440" height="358" border=3>
<tr>
  <th colspan="2" align="center"><b>Create user</b>
  <?php //Developed by www.freestudentprojects.com
  echo $msg;
  ?>
  </th>
  </tr>
<tr>
<th width="120">First Name</th>
<td width="235">
<input type="hidden" name="sessionvalue" value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["settid"]; ?>" />
<input type=text name=fname size=25 value="<?php //Developed by www.freestudentprojects.com echo $rs[fname];?>"></td>
</tr>
<tr>
<th>Last Name</th>
<td><input type=text name=lname size=25 value="<?php //Developed by www.freestudentprojects.com echo $rs[lname];?>"></td>
</tr>
<tr><th>Address</th>
<td><textarea name=add>
<?php //Developed by www.freestudentprojects.com
echo $rs[address];
?>
</textarea>
</td></tr>
<tr>
<th>Contact Number</th>
<td><input type=text value="<?php //Developed by www.freestudentprojects.com echo $rs[contactnumber];?>" name=cno size=25></td>
</tr>
<tr>
<th>Mobile Number</th>
<td><input type=text value="<?php //Developed by www.freestudentprojects.com echo $rs[mobilenumber];?>" name=mob size=25></td>
</tr>
<tr>
<th>User Name</th>
<td><input type=text name=uname size=25 value="<?php //Developed by www.freestudentprojects.com echo $rs[username];?>"></td>
</tr>
<?php //Developed by www.freestudentprojects.com
if(!isset($_GET[editemp]))
{
?>
<tr>
<th>Password</th>
<td><input type=password name=pass size=25></td>
</tr>
<tr>
<th>Confirm Password</th>
<td><input type=password name=conpass size=25></td>
</tr>
<?php //Developed by www.freestudentprojects.com
}
?>
<tr>
  <th>Designation</th>
  <td><select name=des>
  <option value="" selected="selected">Select</option>
    
  <?php //Developed by www.freestudentprojects.com
while($rs1 = mysqli_fetch_array($resultdesg))
{
	if($rs1[did] == $rs[did])
	{
	echo "<option value='$rs1[did]' selected>$rs1[designation]</option>";
	}
	else
	{
	echo "<option value='$rs1[did]'>$rs1[designation]</option>";
	}
}
?>
  </select></td>
</tr>
<tr>
  <th>Status</th>
  <td><select name=stat>
  <?php //Developed by www.freestudentprojects.com
$arr=array("Enabled","Disabled"); 
?>
  <option>Select</option>
  <?php //Developed by www.freestudentprojects.com
foreach($arr as $val)
{
if($rs[status]==$val)
{
	echo"<option value=$val selected>$val</option>";
}
else
{
	echo"<option value=$val>$val</option>";
}
}
?>
  </select></td>
</tr>
<tr>
<th colspan=2><input type=submit name="submit" value="Submit">
<input type=reset name="reset" value="Reset"></th>
</tr>
</table></form>
</div>
</div>
</div>
<?php //Developed by www.freestudentprojects.com include("footer.php");?>