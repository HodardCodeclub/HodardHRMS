<?php //Developed by www.freestudentprojects.com
session_start();
if(!isset($_SESSION[adminid]))
{
	header("Location: index.php");
}
include("connection.php");
?>
<script type="application/javascript">
function validation()
{
	var todaydate = new Date(document.frmproj.todaydate.value); //Year, Month, Date
	var projectstdate = new Date(document.frmproj.sdt.value); //Year, Month, Date	
	var projectenddate = new Date(document.frmproj.edt.value); //Year, Month, Date
	
	if(frmproj.pname.value=="")
	{
		alert("Project title should not be empty...");
		frmproj.pname.focus();
		return false;
	}
	else if(frmproj.pman.value=="")
	{
		alert("Kindly select the project manager...");
		frmproj.pman.focus();
		return false;
	}
	else if(frmproj.img.value=="")
	{
		alert("Please choose the image...");
		frmproj.img.focus();
		return false;
	}
	else if(frmproj.des.value=="")
	{
		alert("Description should not be empty...");
		frmproj.des.focus();
		return false;
	}
	else if(frmproj.doc.value=="")
	{
		alert("Please choose the document...");
		frmproj.doc.focus();
		return false;
	}
	else if(frmproj.sdt.value=="")
	{
		alert("Start date should not be empty...");
		frmproj.sdt.focus();
		return false;
	}
	else if(frmproj.edt.value=="")
	{
		alert("End date should not be empty...");
		frmproj.edt.focus();
		return false;
	}
	else if(todaydate > projectstdate)
	{
		alert("Project start date is not valid...");
		frmproj.sdt.focus();
		return false;
	}
	else if(todaydate > projectenddate)
	{
		alert("Project end date is not valid...");
		frmproj.edt.focus();
		return false;
	}
	else if(projectstdate > projectenddate)
	{
		alert("Project start date and project end date is not valid...");
		frmproj.sdt.focus();
		return false;
	}
	else if(frmproj.stat.value=="")
	{
		alert("Kindly select the status...");
		frmproj.stat.focus();
		return false;
	}
	else                  
	{
		return true;
	}
}
</script>
<?php //Developed by www.freestudentprojects.com
if($_POST[sessionval]==$_SESSION[sessionvalue])
{
if(isset($_POST[submit]))
{
	if(isset($_GET[editpj]))
	{
		$sqlupd="update projects set empid='$_POST[pman]', projecttitle='$_POST[pname]' where projectid='$_GET[editpj]'";
		$pjupd=mysqli_query($obj,$sqlupd);
		if(mysqli_affected_rows($obj)==1)
		{
			$msg="<br><font color=green>Project details updated successfully...!!!</font><br>";
		}
		else
		{
			$msg="<br><font color=red>Project details could not be updated...!!!</font><br>";
		}
	}
	else
	{
		$filename = rand().$_FILES["doc"]["name"];
		move_uploaded_file($_FILES["doc"]["tmp_name"],"uploads/" . $filename);
		$image=rand().$_FILES["img"]["name"];
		move_uploaded_file($_FILES["img"]["tmp_name"],"uploads/".$image);
		$sql="insert into projects value('','$_POST[pman]','$_POST[pname]','$image','$_POST[des]','$filename','$_POST[sdt]','$_POST[edt]','$_POST[stat]')";
		$rssql=mysqli_query($obj,$sql);
		if(!$rssql)
		{
			$msg="<br><font color=red>Could not insert record</font><br>";
		}
		else
		{
			$msg="<br><font color=green>Record inserted successfully</font><br>";
		}
	}
}
}
$rs=mysqli_query($obj,"select projects.*,employees.fname,employees.lname from projects inner join employees on projects.empid=employees.empid where projectid='$_GET[editpj]'");
$res=mysqli_fetch_array($rs);
$_SESSION[sessionvalue]=rand();
include("header.php");
?>
    <div id="templatemo_main">
      <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?>
      <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Add project</h1>
            
            <p>
<form name=frmproj method=POST action="" enctype="multipart/form-data" onsubmit="return validation()">
<?php //Developed by www.freestudentprojects.com
echo $msg;
?>
<input type=hidden value="<?php //Developed by www.freestudentprojects.com echo $_SESSION[sessionvalue];?>" name=sessionval>
<table border=1>
<tr>
<th>Project Title</th>
<td><input type=text name=pname size=30 value="<?php //Developed by www.freestudentprojects.com echo $res[projecttitle]; ?>"></td>
</tr>
<tr>
<th>Project Manager</th>
<td><select name=pman>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
if(isset($_GET[editpj]))
	{
		echo"<option value='$res[empid]' selected>$res[fname] $res[lname]</option>";
	}
$que="select * from employees where did='3' and status='Enabled'"; 
$sel=mysqli_query($obj,$que);
while($rcsel=mysqli_fetch_array($sel))
{	
	echo"<option value=$rcsel[empid]>$rcsel[fname] $rcsel[lname]</option>";
}
?>
</select></td>
</tr>
<tr>
<th>Image</th>
<td><?php //Developed by www.freestudentprojects.com
if(isset($_GET[editpj]))
{
	echo "<img src='uploads/$res[image]'></img>";
}
else
{?>
<br><input type=file name=img accept="image/jpeg,image/pngs" value="Browse"; />
<?php //Developed by www.freestudentprojects.com }?>
</td>
</tr>
<tr>
<th>Description</th>
<td><textarea name=des>
<?php //Developed by www.freestudentprojects.com
echo $res[description];
?>
</textarea></td>
</tr>
<tr>
<th>Document</th>
<td><?php //Developed by www.freestudentprojects.com
if(isset($_GET[editpj]))
{
	echo "<a href='uploads/$res[document]'><strong>Download link</strong></a>";
}
else
{
	echo "<br><input type=file name=doc value=Browse>";
}
?></td>
</tr>
<tr>
<th>Start Date</th>
<td>
<input type="hidden" name=todaydate value="<?php //Developed by www.freestudentprojects.com echo date("Y-m-d"); ?>">

<input type=date name=sdt value="<?php //Developed by www.freestudentprojects.com echo $res[startdate]; ?>">
</td>
</tr>
<tr>
<th>End Date</th>
<td><input type=date name=edt value="<?php //Developed by www.freestudentprojects.com echo $res[enddate]; ?>"></td>
</tr>
<tr>
<th>Status</th>
<td><select name=stat>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
$arr=array("Enabled","Disabled");
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
</select></td>
</tr>
<tr>
<td colspan=2 align=center><input type=submit name=submit value=Submit></td>
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