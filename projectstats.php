<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");

if($_SESSION["setid"]==$_POST[sessionvalue])
{
	if(isset($_POST[submit]))
	{
		$sql="insert into employee values('','$_POST[prosid]','$_POST[pelem]','$_POST[pmod]','$_POST[start]','$_POST[end]','$_POST[comp]','$_POST[comm]','$_POST[stat]')";
		$rcinsert=mysqli_query($obj,$sql);
		if(!$rcinsert)
		{
			$msg="<br><font color=red><b>Failed to insert the record!!!</b></font><br>";
		}
		else
		{
			$msg="<br><font color=green><b>Successfully inserted the record!!!</b></font><br>";
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
        
            <h1>Project Status</h1>
<form name="frm10" method=post action="">
<table border=3>
<input type=hidden name="sessionvalue" value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["setid"];?>">
<tr><th colspan=2 align=center>Insert new project record
<?php //Developed by www.freestudentprojects.com
echo $msg;
?>
</th></tr>
<tr>
<th>project stat id</th>
<td><input type=text name=prosid size=25></td>
</tr>
<tr>
<th>project element</th>
<td><select name=pelem>
<option value=Selected>Selected</option>
<option value=Analysis>Analysis</option>
<option value=Requirement collection>Requirement collection</option>
<option value=Design>Design</option>
<option value=Coding>Coding</option>
<option value=Testing>Testing</option>
</select>
</td>
</tr>
<tr>
<th>Project Module</th>
<td><input type=text name=pmod size=25></td>
</tr>
<tr>
<th>Start Date</th>
<td><input type=date name=start ></td>
</tr>
<tr>
<th>End Date</th>
<td><input type=date name=end ></td>
</tr>
<tr>
<th>Complete Date</th>
<td><input type=date name=comp></td>
</tr>
<tr>
<th>Comments</th>
<td><textarea name=comm></textarea></td>
</tr>
<tr>
<th>Status</th>
<td><select name=stat>
<option value=Selected>Selected</option>
<option value=Enabled>Enabled</option>
<option value=Disabled>Disabled</option>
</select></td>
</tr>
<tr>
<th colspan=2>
<input type=submit value=submit name=submit></th>
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
