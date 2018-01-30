<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
?>
<script type="application/javascript">
function validation()
{
	var datestart = new Date(document.frmapp.st.value); //Year, Month, Date
	var dateto = new Date(document.frmapp.ed.value); //Year, Month, Date	
	var datebirth = new Date(document.frmapp.dob.value); //Year, Month, Date
	
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	b=frmapp.fname.value;
	c=frmapp.lname.value;
	for(i=0;i<=b.length;i++)
	{	
		a=b.charCodeAt(i);
		if(((a<65) || (a>90)) && ((a<97) || (a>122)) && (a!= 32))
		{
			alert ("The box has special characters. \nThese are not allowed.\n");
			frmapp.fname.focus();
			return false;
			break;
		}
	}
	for(i=0;i<=c.length;i++)
	{	
		a=c.charCodeAt(i);
		if(((a<65) || (a>90)) && ((a<97) || (a>122)) && (a!= 32))
		{
			alert ("The box has special characters. \nThese are not allowed.\n");
			frmapp.lname.focus();
			return false;
			break;
		}
	}
   	if(frmapp.fname.value=="")
	{
		alert("First name should not be empty...");
		frmapp.fname.focus();
		return false;	
	}
	else if(frmapp.lname.value=="")
	{	
		alert("Last name should not be empty...");
		frmapp.lname.focus();
		return false;
	}	
	else if(frmapp.cno.value=="")
	{
		alert("Contact number should not be empty...");
		frmapp.cno.focus();
		return false;
	}
	else if(isNaN(frmapp.cno.value))
	{
		alert("Kindly enter a valid moile number...");
		frmapp.cno.focus();
		return false;
	}
	else if(frmapp.cno.value.length  != 10)
	{		
		alert("Invalid mobile number.. ");
		frmapp.cno.focus();
		return false;
	}
	else if(!filter.test(frmapp.eid.value))
	{
		alert("Please enter valid email !!...");
		frmapp.eid.focus();	
		return false;
	}
	else if(frmapp.dob.value=="")
	{
		alert("Date of birth should not be empty.");
		frmapp.dob.focus(); 
		return false;
	}
    else if( datebirth >  datestart) {
	//	var msg = "Minimum age range to apply this job is " + datestart + " to " + dateto;
            alert("You are not eligible to apply to this job");
			document.frmapp.dob.focus();
			return false;
    }
	else if( datebirth <  dateto) {
	//	var msg = "Minimum age range to apply this job is " + datestart + " to " + dateto;
            alert("You are not eligible to apply to this job");
			document.frmapp.dob.focus();
			return false;
    }	
	else if(frmapp.qual.value=="")
	{
		alert("Qualification should not be empty...");
		frmapp.qual.focus();
		return false;
	}
	else if((!(frmapp.gen[0].checked)) && (!(frmapp.gen[1].checked)))
	{	
		alert("Kindly select the gender...");
		return false;
	}
	else if(frmapp.fsalexp.value=="")
	{
		alert("Salary should not be empty...");
		frmapp.fsalexp.focus();
		return false;
	}
	else if(isNaN(frmapp.fsalexp.value))
	{
		alert("Enter the salary in numerics...");
		frmapp.fsalexp.focus();
		return false;
	}
	else if(frmapp.tsalexp.value=="")
	{
		alert("Salary should not be empty...");
		frmapp.tsalexp.focus();
		return false;
	}
	else if(isNaN(frmapp.tsalexp.value))
	{
		alert("Enter the salary in numerics...");
		frmapp.fsalexp.focus();
		return false;
	}
	else if(frmapp.noe.value=="")
	{
		alert("Number of experience should not be empty..");
		frmapp.noe.focus();
		return false;
	}
	else if(frmapp.img.value=="")
	{
		alert("Kindly upload your image...");
		frmapp.img.focus();
		return false;
	}
	else if(frmapp.upl.value=="")
	{
		alert("Kindly upload your resume...");
		frmapp.upl.focus();
		return false;
	}
	else
	{
		return true;
	}
}	
</script>

<?php //Developed by www.freestudentprojects.com
if($_SESSION["setid"]==$_POST[sessionvalue])
{
	$salaryexpectation = $_POST[fsalexp]. " to" . $_POST[tsalexp];
	
	$image=rand().$_FILES["img"]["name"];
		move_uploaded_file($_FILES["upl"]["tmp_name"],"uploads/".$image);	
	
	$filename = rand().$_FILES["upl"]["name"];
	move_uploaded_file($_FILES["upl"]["tmp_name"],"uploads/" . $filename);
				$dt=date("Y-m-d");
	
	if(isset($_POST[subapp]))
	{
		
		if(isset($_GET[editid]))
		{
			$sql="UPDATE applicants SET fname='$_POST[fname]',lname='$_POST[lname]',contactno='$_POST[cno]',emailid='$_POST[eid]',DOB='$_POST[dob]',qualification='$_POST[qual]',gender='$_POST[gen]',salexp='$salaryexpectation',experience='$_POST[noe]',comments='$_POST[com]',adate='$dt' WHERE appid='$_GET[editid]'";
				$rcinsert=mysqli_query($obj,$sql);
			if(!$rcinsert)
			{
				$msg="<br><font color=red><b>Failed to update!!!</b></font><br>";
			}
			else
			{
			$msg="<br><font color=green><b>Application details updated successfully.,..!!!</b></font><br>";
			}
		}
		else
		{
			$sqlque=mysqli_query($obj,"select * from applicants where emailid='$_POST[eid]' AND vacid='$_POST[vac]' AND appid<>'$_get[editid]'");
			$cnt=mysqli_num_rows($sqlque);
			if($cnt==1)
			{
				$msg="<br><font color='red'><b>Your application already exists...!!!</b></font><br>";
				$msg = "<br><font color=green><h2> Your reference ID is". mysqli_insert_id($obj) ." !!!</h2></font><br>";
			}
			else
			{
				$sql="insert into applicants values('','$_POST[vac]','$image','$_POST[fname]','$_POST[lname]','$_POST[cno]','$_POST[eid]','$_POST[dob]','$_POST[qual]','$_POST[gen]','$salaryexpectation','$_POST[noe]','$_POST[com]','$filename','$dt')";
				$rcinsert=mysqli_query($obj,$sql);
				if(!$rcinsert)
				{
					$msg="<br><font color=red><b>Failed to apply!!!</b></font><br>";
				}
				else
				{
				$msg="<br><font color=green><h2>Your application will be processed soon!!!</h2></font><br>";
				$msg1 = "<br><font color=green><h2> Your Reference ID is : ". mysqli_insert_id($obj) ." </h2></font><br>";
				$msg1 = $msg1. "<br><font color=green><h2> Registered Email ID is ". $_POST[eid] ." </h2></font><br>";
				$msg1 = $msg1. "<br><font color=green><h2> Registered contact No. is ". $_POST[cno] ." </h2></font><br>";
				}
			}
		}		
	}
}

$selres= mysqli_query($obj,"select * from applicants where appid='$_GET[editid]'");
$selrec = mysqli_fetch_array($selres);

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
<h1>Apply</h1>
<p>     	
<?php //Developed by www.freestudentprojects.com
$dt= date("Y-m-d");
$sql = "SELECT * FROM vacancies WHERE vacid='$_GET[jobid]'";
$recs = mysqli_query($obj,$sql);
while($arrrec = mysqli_fetch_array($recs))
{
?>
          <div class="service_box">
                <div class="right">
               	  <h4><?php //Developed by www.freestudentprojects.com echo $arrrec[title] ;?></h4>
                    <p><?php //Developed by www.freestudentprojects.com echo $arrrec[description]; ?></p>
                    <ul>
                        <li>Qualification : <?php //Developed by www.freestudentprojects.com echo $arrrec[qualification] ;?></li>
                        <li>Experience: <?php //Developed by www.freestudentprojects.com echo $arrrec[exprience] ;?> </li>
                        <li>Age range: <?php //Developed by www.freestudentprojects.com echo $arrrec[age]; ?> </li>
                          <li>Salary range: <?php //Developed by www.freestudentprojects.com echo $arrrec[salary]; ?> </li>
                  </ul>
                </div>
                 <div class="cleaner"></div> 
            </div>  
           		<?php //Developed by www.freestudentprojects.com
				}
				?>
                

    
                
            <p><form name=frmapp method=post action="" enctype="multipart/form-data" onsubmit="return validation()">
            <input type=hidden name=sessionvalue value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["setid"];?>" />
            <input type=hidden name=vac size=40 value="<?php //Developed by www.freestudentprojects.com echo $_GET[jobid]; ?>">
<table width="628" border=3>
<?php //Developed by www.freestudentprojects.com
if(strlen($msg) == 84)
{
?>
<tr><th colspan=2 align=center>
<?php //Developed by www.freestudentprojects.com 
echo $msg; 
echo $msg1;
?>

</th></tr>
<?php //Developed by www.freestudentprojects.com
}
else
{
	if(strlen($msg) == 87)
	{
	echo "<tr><th colspan=2 align=center>$msg</th></tr>";
	}
?>
<tr>
<th>Applicant image*</th>
<td><?php //Developed by www.freestudentprojects.com
if(isset($_GET[editid]))
{
	echo "<img src='uploads/$selrec[$image]' width=100 height=100 ></img>";
}
else
{
	echo "<input type=file name=img value=Browse accept='image/jpg,image/jpeg,image/png'>";
}
?></td>
</tr>
<tr>
<th>First Name*</th>
<td width="295"><input type=text name=fname size=40 value="<?php //Developed by www.freestudentprojects.com echo $selrec[fname]; ?>"></td>
</tr>
<tr>
<th>Last Name*</th>
<td width="295"><input type=text name=lname size=40 value="<?php //Developed by www.freestudentprojects.com echo $selrec[lname]; ?>"></td>
</tr>
<tr>
<th>Contact Number*</th>
<td width="295"><input type=text name=cno size=40 value="<?php //Developed by www.freestudentprojects.com echo $selrec[contactno]; ?>"></td>
</tr>
<tr>
<th>EMail ID*</th>
<td width="295"><input type=text name=eid size=40 value="<?php //Developed by www.freestudentprojects.com echo $selrec[emailid]; ?>"></td>
</tr>
<tr>
<th>Date Of Birth*</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
if($arrrec[age] == "21 to 25")
{
	$sage = 21;
	$tage = 25;	
}
else if($arrrec[age] == "26 to 30")
{
		$sage = 26;
		$tage = 30;	
}
else if($arrrec[age] == "30 to 35")
{
		$sage = 30;
		$tage = 35;	
}
else if($arrrec[age] == "35+ ")
{
	$sage = 35;
	$tage = 55;	
}
else
{
	$sage = 18;
	$tage = 55;	
}

$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y")-$sage);
$st = date("Y-m-d", $tomorrow);
$tomorrow = mktime(0,0,0,date("m"),date("d"),date("Y")-$tage);
$ed = date("Y-m-d", $tomorrow);
?>
<input type="hidden" name="st" value="<?php //Developed by www.freestudentprojects.com echo $st; ?>"  />
<input type="hidden" name="ed" value="<?php //Developed by www.freestudentprojects.com echo $ed; ?>"  />

<input type="date" name="dob"  value="<?php //Developed by www.freestudentprojects.com echo $selrec[DOB]; ?>" />
            </td>
</tr>
<tr>
<th>Qualification*</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
$arr = array("BCA", "MCA", "BE", "BSc");
?>
<select name=qual>
<option value=""> Select</option>
<?php //Developed by www.freestudentprojects.com
foreach($arr as $val)
{
	if($val == $selrec[qualification])
	{
	echo "<option value=$val selected>$val</option>";	
	}
	else
	{
	echo "<option value=$val>$val</option>";
	}
}
?>
</select>
</td>
</tr>
<tr>
<th>Gender*</th>
<td width="295">
<input type=radio name=gen value="male"
<?php //Developed by www.freestudentprojects.com
if($selrec[gender] == "male")
{
echo "checked";
}
?>
>Male
<input type=radio name=gen value=female
<?php //Developed by www.freestudentprojects.com
if($selrec[gender] == "female")
{
echo "checked";
}
?>
>Female</td>
</tr>
<tr>
<th>Salary Expectation*</th>
<td width="295">
<p><input name=fsalexp type=text size="15" value="<?php //Developed by www.freestudentprojects.com echo $selrec[salexp]; ?>" >
&nbsp; to &nbsp;
  <input name=tsalexp type=text size="15" value="<?php //Developed by www.freestudentprojects.com echo $selrec[salexp]; ?>"  /></p></td>
</tr>
<tr>
<th>No. Of Years Experience*</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
$arr = array("Fresher", "1-2 Years", "3-6 Years", "6+ Years");
?>
<select name=noe>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
foreach($arr as $val)
{
	if($val == $selrec[experience])
	{
	echo "<option value=$val selected>$val</option>";	
	}
	else
	{
	echo "<option value=$val>$val</option>";
	}
}
?>
</select></td>
</tr>
<tr>
<th>Comment</th>
<td width="295"><textarea name=com rows=5 cols=35><?php //Developed by www.freestudentprojects.com echo $selrec[comments]; ?></textarea></td>
</tr>
<tr>
<th>Upload Resume*</th>
<td width="295">

<?php //Developed by www.freestudentprojects.com
if(isset($_GET[editid]))
{
	echo "<a href='uploads/<?php //Developed by www.freestudentprojects.com echo $selrec[uploads]; ?>'>Download link</a>";
}
else
{
	echo "<input type=file name=upl value=Browse accept='application/msword,application/pdf'>";
}
?>
</td>
</tr>
<tr>
<th colspan=2>
<input type=submit name=subapp value=submit></th>
</tr>
<?php //Developed by www.freestudentprojects.com
}
?>
</table>
</form>
<a href="index.php">Go to main page</a>
</p>
      </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
  </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>