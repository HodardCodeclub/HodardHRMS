<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
if($_POST[sessionvalue]==$_SESSION["setid"])
{
	if(isset($_POST[submit]))
	{
		$sqlque=mysqli_query($obj,"select * from applicantstatus where appid='$_POST[appid]'");
		$cnt=mysqli_num_rows($sqlque);
		if($cnt==1)
		{
			$msg="<br><b><font color='red'>The status of the applicant is set...<font><b><br>";
		}
		else
		{
			$dt=date("Y-m-d");
			$sql="insert into applicantstatus values('','$_POST[appid]','1','$_POST[abapp]','$_POST[appst]','$dt')";
			$rcinsert=mysqli_query($obj,$sql);
			if(!$rcinsert)
			{
				$msg="<br><b><font color=red>could not set the applicant status...<font><b><br>";
			}
			else
			{
				$msg="<br><b><font color=red>Status successfully updated...<font><b><br>";
			}
		}
	}
}
$_SESSION["setid"]=rand();
?>
	<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Applicants Status</h1>
            
            <p>
<form name=frm4 method=post action="">
<input type=hidden name=sessionvalue value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["setid"]?>">
<table border=3>
<tr><th colspan=2 align=center>Applicant status
<?php //Developed by www.freestudentprojects.com echo $msg; ?></th></tr>
<tr>
<th>Applicant ID</th>
<th><input type=text name=appid size=25></th>
</tr>
<tr>
<th>About Applicant</th>
<th><textarea name=abapp></textarea></th>
</tr>
<tr>
<th>Applicant Status</th>
<th><select name=appst>
<option value="selected">Selected</option>
<option value="rejected">Rejected</option>
<option value="On Process">On Process</option>
</select></th>
</tr>
<tr>
<th colspan=2><input type=submit name=submit value=Submit></th>
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