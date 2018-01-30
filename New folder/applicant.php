<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
if($_SESSION["setid"]==$_POST[sessionvalue])
{
	$salaryexpectation = $_POST[fsalexp]. " to" . $_POST[tsalexp];
	
	$filename = rand().$_FILES["upl"]["name"];
	move_uploaded_file($_FILES["upl"]["tmp_name"],"uploads/" . $filename);
				$dt=date("Y-m-d");
	
	if(isset($_POST[submit]))
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
						$sql="insert into applicants values('','$_POST[vac]','$_POST[fname]','$_POST[lname]','$_POST[cno]','$_POST[eid]','$_POST[dob]','$_POST[qual]','$_POST[gen]','$salaryexpectation','$_POST[noe]','$_POST[com]','$filename','$dt')";
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
                

    
                
            <p><form name=frm3 method=post action="" enctype="multipart/form-data">
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
<th>First Name*</th>
<td width="295"><input type=text name=fname size=40 value="<?php //Developed by www.freestudentprojects.com echo $selrec[fname]; ?>"></th>
</tr>
<tr>
<th>Last Name*</th>
<td width="295"><input type=text name=lname size=40 value="<?php //Developed by www.freestudentprojects.com echo $selrec[lname]; ?>"></th>
</tr>
<tr>
<th>Contact Number*</th>
<td width="295"><input type=text name=cno size=40 value="<?php //Developed by www.freestudentprojects.com echo $selrec[contactno]; ?>"></th>
</tr>
<tr>
<th>EMail ID*</th>
<td width="295"><input type=text name=eid size=40 value="<?php //Developed by www.freestudentprojects.com echo $selrec[emailid]; ?>"></th>
</tr>
<tr>
<th>Date Of Birth*</th>
<td width="295">
<input type="date" name="dob"  value="<?php //Developed by www.freestudentprojects.com echo $selrec[DOB]; ?>" />
            </th>
</tr>
<tr>
<th>Qualification*</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
$arr = array("BCA", "MCA", "BE", "BSc");
?>
<select name=qual>
<option> Select</option>
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
</th>
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
>Female</th>
</tr>
<tr>
<th>Salary Expectation*</th>
<td width="295">
<p><input name=fsalexp type=text size="15" value="<?php //Developed by www.freestudentprojects.com echo $selrec[salexp]; ?> " >
&nbsp; to &nbsp;
  <input name=tsalexp type=text size="15" value="<?php //Developed by www.freestudentprojects.com echo $selrec[salexp]; ?> "  /></p></th>
</tr>
<tr>
<th>No. Of Years Experience*</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
$arr = array("Fresher", "1-2 Years", "3-6 Years", "6+ Years");
?>
<select name=noe>
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
</select></th>
</tr>
<tr>
<th>Comment</th>
<td width="295"><textarea name=com rows=5 cols=35><?php //Developed by www.freestudentprojects.com echo $selrec[comments]; ?></textarea></th>
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
	echo "<input type=file name=upl value=Browse>";
}
?>
</th>
</tr>
<tr>
<th colspan=2>
<input type=submit name=submit value=submit></th>
</tr>
<?php //Developed by www.freestudentprojects.com
}
?>
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