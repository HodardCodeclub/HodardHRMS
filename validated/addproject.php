<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
?>
<script type="application/javascript">
function validation()
{
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
		$sqlupd="update projects set projecttitle='$_POST[pname]',projectmanager='$_POST[pman]'";
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
$rs=mysqli_query($obj,"select * from projects where projectid='$_GET[editpj]'");
$res=mysqli_fetch_array($rs);
$_SESSION[sessionvalue]=rand();

?>
<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
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
$que="select empid,fname,lname from employees where status='Enabled'"; 
$sel=mysqli_query($obj,$que);
while($rcsel=mysqli_fetch_array($sel))
{	
	if($res[empid]==$rcsel[empid])
	{
		echo"<option value='$rcsel[empid]' selected>$rcsel[fname] $rcsel[lname]</option>";
	}
	else
	{
		echo"<option value=$rcsel[empid]>$rcsel[fname] $rcsel[lname]</option>";
	}
}
?>
</select></td>
</tr>
<tr>
<th>Image</th>
<td><?php //Developed by www.freestudentprojects.com
if(isset($_GET[editpj]))
{
	echo "<img src='uploads/$res[image]'  ></img>";
}

	echo "<br><input type=file name=img value=Browse>";

?></td>
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

	echo "<br><input type=file name=doc value=Browse>";

?></td>
</tr>
<tr>
<th>Start Date</th>
<td><input type=date name=sdt value="<?php //Developed by www.freestudentprojects.com echo $res[startdate]; ?>"></td>
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