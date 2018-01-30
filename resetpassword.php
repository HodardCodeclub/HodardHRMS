<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
?>
<script type="application/javascript">
function validation()
{
	if(frmreset.uname.value=="")
	{
		alert("User name should not be empty...");
		frmreset.uname.focus();
		return false;
	}
	else if(frmreset.pass.value=="")
	{
		alert("Password should not be empty...");
		frmreset.pass.focus();
		return false;
	}
	else if(frmreset.pass.value.length<6 || frmreset.pass.value.length>15)
	{
		alert("Password should be greater than 6 character and less than 15 characters...");
		frmreset.pass.focus();
		return false;
	}
	else if(frmreset.pass.value!=frmreset.conpass.value)
	{
		alert("Password and confirm password do not match...");
		frmreset.pass.value="";
		frmreset.conpass.value="";
		frmreset.pass.focus();
		return false;	
	}
	else
	{
		return true;	
	}
}
</script>
<?php //Developed by www.freestudentprojects.com
if($_POST[sessionvalue]==$_SESSION[setid])
{
	if(isset($_POST[submitreset]))
	{
		$sqlupdpass="UPDATE employees SET password='$_POST[pass]' where username='$_POST[uname]'";
		mysqli_query($obj,$sqlupdpass);
			if(mysqli_affected_rows($obj) == 1)
			{
				$msgsqlupdpass= "<br><font color='Green'><b>Password changed successfully... </b></font>";
			}
			else
			{
				$msgsqlupdpass= "<br><font color='red'><b>Failed to change the password... </b></font>";
			}
	}
}
$_SESSION[setid]=rand();
?>
<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Reset Password</h1>
            
            <p>
    <h3><?php //Developed by www.freestudentprojects.com echo $msgsqlupdpass; ?></h3>
                <div class="cleaner_h30"></div>      
<form name=frmreset method="POST" action="" onsubmit="return validation()">
<input type=hidden name=sessionvalue value="<?php //Developed by www.freestudentprojects.com echo $_SESSION[setid]; ?>" />
<table width="372" border=3>
<tr>
<th>User Name</th>
<th><input type=text name=uname size=25></th>
</tr>
<tr>
<th>Password</th>
<th><input type=password name=pass size=25></th>
</tr>
<tr>
<th>Confirm Password</th>
<th><input type=password name=conpass size=25></th>
</tr>
<tr>
<th colspan=2><input type=submit name="submitreset" value="Reset Password"></th>
</tr>
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