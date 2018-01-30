<?php //Developed by www.freestudentprojects.com 
session_start();
include("connection.php");
?>
<script type="application/javascript">
function validation()
{
	if(frmvac.joti.value=="")
	{
		alert("Job title should not be empty...");
		frmvac.joti.focus();
		return false;
	}
	else if(frmvac.des.value=="")
	{
		alert("Designation should not be empty...");
		frmvac.des.focus();
		return false;
	}
	else if(frmvac.jdesc.value=="")
	{
		alert("Job Description should not be empty...");
		frmvac.jdesc.focus();
		return false;
	}
	else if(frmvac.mqua.value=="")
	{
		alert("Minimum qualification should not be empty...");
		frmvac.mqua.focus();
		return false;
	}
	else if(frmvac.year.value=="")
	{
		alert("Please select the year...");
		frmvac.year.focus();
		return false;
	}
	else if(frmvac.month.value=="")
	{
		alert("Please select the month...");
		frmvac.month.focus();
		return false;
	}
	else if(frmvac.agerange.value=="")
	{
		alert("Please select the age...");
		frmvac.agerange.focus();
		return false;
	}
	else if((!(frmvac.gen[0].checked)) && (!(frmvac.gen[1].checked)) &&(!(frmvac.gen[2].checked)))
	{
		alert("Please select the gender...");
		
		return false;
	}
	else if(frmvac.sal.value=="")
	{
		alert("Please select the salary...");
		frmvac.sal.focus();
		return false;
	}
	else if(frmvac.lastdate.value=="")
	{
		alert("Please select the last date...");
		frmvac.lastdate.focus();
		return false;
	}
	else if(frmvac.stat.value=="")
	{
		alert("Please select status...");
		frmvac.stat.focus();
		return false;
	}
	else
	{
		return true;
	}	
}
</script>
<?php //Developed by www.freestudentprojects.com
$dt=("Y-m-d");
$totexp = $_POST[year] . "." . $_POST[month];
if($_POST[sessionvalue] == $_SESSION["settid"])
  {
	  if(isset($_POST[submit]))
	  {
	$sql="insert into vacancies values('','','$_POST[joti]','$_POST[des]','$_POST[jdesc]','$_POST[mqua]','$totexp','$_POST[agerange]','$_POST[gen]','$_POST[sal]','$_POST[lastdate]','$_POST[stat]')";
    
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
  $_SESSION["settid"] = rand();
  
?>
<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Add Vacancy</h1>
            
            <p>
<form name=frmvac method="post" action="" onsubmit="return validation()">
<input type="hidden" name="sessionvalue" value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["settid"]; ?>" />
<table border=3>
<tr>
<td colspan="2" align="center"><b>vacancies</b>
  <?php //Developed by www.freestudentprojects.com
  echo $msg;
  ?>
  </td>
  </tr>
  <tr>
<th>Job Title</th>
<th><textarea name=joti></textarea></th>
</tr>
<tr>
<th>Designation</th>
<th><input type=text name=des size=25></th>
</tr>
<tr>
<th>Job Description</th>
<th><textarea name=jdesc></textarea></th>
</tr>
<tr>
<th>Minimum Qualification</th>
<th><input type=text name=mqua size=25></th>
</tr>
<tr>
<th>No. Of Years Experience Required</th>
<th>
<?php //Developed by www.freestudentprojects.com
$expyear = array("0","1","2","3","4","5","6","7","8","9","10");
$expmonth = array("00","01","02","03","04","05","06","07","08","09","10","11");
?>
<select name=year>
<option value="">Years</option>
<?php //Developed by www.freestudentprojects.com
foreach($expyear as $val)
echo "<option>$val</option>";
?>
</select>


<select name=month>
<option value="">Month</option>
<?php //Developed by www.freestudentprojects.com
foreach($expmonth as $val1)
echo "<option>$val1</option>";
?>
</select>
</th>
</tr>
<tr>
<th>Age</th>
<th>
<?php //Developed by www.freestudentprojects.com
$agerange = array("21 to 25","26 to 30","30 to 35","35+ "," No restriction");
?>
<select name=agerange>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
foreach($agerange as $val1)
echo "<option>$val1</option>";
?>
</select>
</th>
</tr>
<tr>
<th>Gender</th>
<th>
<input type=radio name=gen value=male>Male
<input type=radio name=gen value=female>Female
<input type=radio name=gen value=Both>Both
</th>
</tr>
<tr>
<th>Salary</th>
<th><?php //Developed by www.freestudentprojects.com
$salrange = array("Rs. 6000 to Rs. 10000","Rs. 11000 to Rs. 15000","Rs. 16000 to Rs. 25000","More than 25000");
?>
<select name=sal>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
foreach($salrange as $val1)
echo "<option>$val1</option>";
?>
</select></th>
</tr>
<tr>
<th>Last Date</th>
<th><input type="date" name="lastdate"  />
            </th>
</tr>
<tr>
<th>Status</th>
<th><select name=stat>
<?php //Developed by www.freestudentprojects.com
$arr=array("Enabled","Disabled");
?>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
foreach($arr as $val)
{
	if($val==$rs[status])
	{
		echo "<option value=$val selected>$val</option>";
	}
	else
	{
		echo "<option value=$val>$val</option>";
	}
}
?>
</select></th>
</tr>
<tr>
<th colspan=2><input type=submit name=submit value=Submit></th>
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