<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
if(isset($_POST[submit]))
{
	if($_SESSION["setid"]==$_POST['sessionvalue'])
	{
			$sql="UPDATE employees SET password='$_POST[newpass]' where username='$_POST[uname]' AND password='$_POST[oldpass]'";
			
	$rinsert=mysqli_query($obj,$sql);
	if(mysqli_affected_rows($obj) == 1)
		{
		$msg= "<br><font color='Green'><b>Password changed successfully... </b></font>";
		}
	else
		{
		$msg= "<br><font color='red'><b>Failed to change the password... </b></font>";
		}
	}
}
$_SESSION["setid"]=rand();



	if(isset($_SESSION[adminid]))
	{
		$ressel=mysqli_query($obj,"SELECT * FROM employees WHERE empid='$_SESSION[adminid]'");
	}
	
	else if(isset($_SESSION[hrid]))
	{
		$ressel=mysqli_query($obj,"SELECT * FROM employees WHERE empid='$_SESSION[hrid]'");
	}
	else if(isset($_SESSION[pmagid]))
	{
		$ressel=mysqli_query($obj,"SELECT * FROM employees WHERE empid='$_SESSION[pmagid]'");
	}
	else if(isset($_SESSION[emid]))
	{
		$ressel=mysqli_query($obj,"SELECT * FROM employees WHERE empid='$_SESSION[emid]'");
	}
$rs=mysqli_fetch_array($ressel);

include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Change Password</h1>
            <p>
            
<form method="post" action="">
<input type=hidden name="sessionvalue" value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["setid"]; ?>" />
<table border=5>
<tr><td colspan=2>
<?php //Developed by www.freestudentprojects.com
echo $msg;
?>
<tr>
<td>User Name</td>
<td><input type=text name=uname size=20 value="<?php //Developed by www.freestudentprojects.com echo $rs[username];?>" readonly /></td>
</tr>
<tr>
<td>Old Password</td>
<td><input type=password name=oldpass size=20 /></td>
</tr>
<tr>
<td>New Password</td>
<td><input type=password name=newpass size=20 /></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type=password name=conpass size=20 /></td>
</tr>
<tr><td align=center colspan="2"><input type=submit name=submit value="Change Password" /></td>
</tr>
</table></form>
</p>
          </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>