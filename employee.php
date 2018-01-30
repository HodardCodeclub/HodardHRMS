<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
?>
<script type="application/javascript">
function checkusername(struname)
{
	if (struname.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
  	{
  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
	xmlhttp.open("GET","checkuname.php?q="+struname,true);
	xmlhttp.send();
}
function validation()
{
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	b=frm5.fname.value;
	c=frm5.lname.value;
	u=frm5.uname.value;
	for(i=0;i<=b.length;i++)
	{	
		a=b.charCodeAt(i);
		if(((a<65) || (a>90)) && ((a<97) || (a>122)) && (a!= 32))
		{
			alert ("The box has special characters. \nThese are not allowed.\n");
			frm5.fname.focus();
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
			frm5.lname.focus();
			return false;
			break;
		}
	}
	if (!filter.test(frm5.email.value))
	{
		alert("Please Enter Valid email !!");
		frm5.email.focus();
		return false;
	}
	else if(frm5.fname.value == "")
	{		
		alert("First name should not be empty... ");
		frm5.fname.focus();
		return false;
	}
	else if(frm5.lname.value == "")
	{		
		alert("Last name should not be empty... ");
		frm5.lname.focus();
		return false;
	}
	else if(frm5.add.value == "")
	{		
		alert("Address should not be empty... ");
		frm5.add.focus();
		return false;
	}
	else if(frm5.mob.value == "")
	{		
		alert("Mobile Number should not be empty... ");
		frm5.mob.focus();
		return false;
	}
	else if(frm5.mob.value.length  != 10)
	{		
		alert("Invalid mobile number.. ");
		frm5.mob.focus();
		return false;
	}
	else if(frm5.joindate.value == "")
	{		
		alert("Join date should not be empty... ");
		frm5.joindate.focus();
		return false;
	}
	else if(frm5.des.value == "")
	{		
		alert("Please select designation... ");
		frm5.des.focus();
		return false;
	}
	else if(frm5.uname.value == "")
	{		
		alert("Username should not be empty... ");
		frm5.des.focus();
		return false;
	}
	else if(frm5.uname.value.length < 4)
	{		
		alert("Username should be greater than 4 characters... ");
		frm5.des.focus();
		return false;
	}
	else if(((u.charCodeAt(0)<65) || (u.charCodeAt(0)>90)) && ((u.charCodeAt(0)<97) || (u.charCodeAt(0)>122)))
	{
		alert("The first character in the username should be a letter");
		frm5.uname.focus();
		return false;
	}
	else if(frm5.pass.value == "")
	{		
		alert("Password should not be empty... ");
		frm5.pass.focus();
		return false;
	}
	else if(frm5.pass.value.length < 6 || frm5.pass.value.length > 15)
	{		
		alert("Password should be greater than 6 characters and less than 15 characters... ");
		frm5.pass.focus();
		return false;
	}
	
	else if(frm5.pass.value != frm5.pass2.value)
	{		
		alert(" Password and Confirm password do not match.. ");
		frm5.pass.value= "";
		frm5.pass2.value = "";
		frm5.pass.focus();
		return false;
	}
	else if(frm5.bsal.value == "")
	{
		alert("Basic salary should not be empty... ");
		frm5.bsal.focus();
		return false;		
	}
	else if(frm5.stat.value == "")
	{
		alert("Kindly select status... ");
		frm5.stat.focus();
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
	if(isset($_POST[subemp]))
	{
		$image=rand().$_FILES["upl"]["name"];
		move_uploaded_file($_FILES["upl"]["tmp_name"],"uploads/".$image);
		if(isset($_GET[editemp]))
		{
			if(isset($_SESSION[adminid] ))
			{
			$sqlupd="UPDATE employees SET fname='$_POST[fname]', lname='$_POST[lname]',address='$_POST[add]',contactnumber='$_POST[cno]',mobilenumber='$_POST[mob]',did='$_POST[des]',basicpay='$_POST[bsal]',status='$_POST[stat]',username='$_POST[uname]' where empid='$_GET[editemp]'";
			}
			else
			{
			$sqlupd="UPDATE employees SET fname='$_POST[fname]', lname='$_POST[lname]',address='$_POST[add]',contactnumber='$_POST[cno]',mobilenumber='$_POST[mob]' where empid='$_GET[editemp]'";
			}
			
			$resupd=mysqli_query($obj,$sqlupd);
			if(!$resupd)
				{
				$msg="<br> Failed to update";
				}
			else
				{
				$msg="<br>Record updated successfully";
				}
		}
		else
		{
			$sqlque=mysqli_query($obj,"select * from employees where username='$_POST[uname]'");
			$cnt=mysqli_num_rows($sqlque);
			if($cnt==1)
			{
				
            }
			else
			{
				$dt=date("Y-m-d");
				$sql="insert into employees values('','$_POST[des]','$image','$_POST[fname]','$_POST[lname]','$_POST[add]','$_POST[dob]','$_POST[email]','$_POST[mob]','$_POST[joindate]','$_POST[uname]','$_POST[pass]','$_POST[bsal]','$dt','$_POST[stat]')";
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
	}
}
$ressel=mysqli_query($obj,"SELECT * FROM employees WHERE empid='$_GET[editemp]'");
$rs=mysqli_fetch_array($ressel);
$resultdes=mysqli_query($obj,"select did,designation from designation ");
$_SESSION["setid"]=rand();

?><?php //Developed by www.freestudentprojects.com
include("header.php");
?>
  
 <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
          <form name="frm5" method=post action="" onsubmit="return validation()" enctype="multipart/form-data">
  <table border=3>
<input type=hidden name="sessionvalue" value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["setid"];?>">
<tr><th colspan=2 align=center>
<?php //Developed by www.freestudentprojects.com
if(isset($_GET[editemp]))
{
	echo "Edit Profile";
}
else
{
echo "Insert new employee record";
}
echo $msg;
?>
</th></tr>
<tr>
<th>Employee image</th>
<td><?php //Developed by www.freestudentprojects.com
if(isset($_GET[editemp]))
{
	echo "<img src='uploads/$rs[empimg]' width=100 height=100 ></img>";
}
else
{
	echo "<input type=file name=upl value=Browse accept='image/jpg,image/jpeg,image/png'>";
}
?></td></tr>
<tr>
<tr>
<th width="204">First Name</th>
<td width="340"><input type=text name=fname size=25 value="<?php //Developed by www.freestudentprojects.com echo $rs[fname];?>"></td>
</tr>
<tr>
<th>Last Name</th>
<td><input type=text name=lname size=25 value="<?php //Developed by www.freestudentprojects.com echo $rs[lname];?>"></td>
</tr>
<tr>
<th>Address</th>
<td><textarea name=add ><?php //Developed by www.freestudentprojects.com echo $rs[address];?></textarea></td>
</tr>
<tr>
<th>Date Of Birth</th>
<td><input type=date name=dob value="<?php //Developed by www.freestudentprojects.com echo $rs[dob];?>" 
<?php //Developed by www.freestudentprojects.com
if(isset($_GET[editemp]))
{
	echo "disabled";
}
?>
/></td>
</tr>
<tr>
<th>Email-id</th>
<td><input type=text name=email size=15 value="<?php //Developed by www.freestudentprojects.com echo $rs[emailid];?>"></td>
</tr>
<tr>
<th>Mobile Number</th>
<td><input type=text name=mob size=15 value="<?php //Developed by www.freestudentprojects.com echo $rs[mobilenumber];?>"></td>
</tr>
<tr>
<th>Join Date</th>
<td>

<input type="date" name="joindate" value="<?php //Developed by www.freestudentprojects.com echo $rs[joindate];?>"
<?php //Developed by www.freestudentprojects.com
if(isset($_GET[editemp]))
{
	echo "disabled";
}
?>
/>
</td>
</tr>
<tr>
<th>Designation</th>
<td>
<select name=des 
<?php //Developed by www.freestudentprojects.com
if(!isset($_SESSION[adminid]))
{
	echo "disabled";
}

?>
 >
<option value="">Select</option>
  <?php //Developed by www.freestudentprojects.com
  $resultdesg = mysqli_query($obj, "SELECT * FROM designation WHERE status='Enabled'");
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
</select>
</td>
</tr>
<tr>
<th>User Name</th>
<td>
<span id="txtHint">
<input type=text name=uname value="<?php //Developed by www.freestudentprojects.com echo $rs[username];?>" onchange="checkusername(this.value)" size=25 
<?php //Developed by www.freestudentprojects.com
if(!isset($_SESSION[adminid]))
{
	echo "disabled";
}
?>
>
</span>
</td>
</tr>
<?php //Developed by www.freestudentprojects.com
if(!isset($_GET[editemp]))
{
?>
<tr>
<th>password</th>
<td><input type=password name=pass size=25 value="<?php //Developed by www.freestudentprojects.com echo $rs[password];?>"></td>
</tr>
<tr>
  <th>Confirm Password</th>
  <td><input type="password" name="pass2" size="25" value="<?php //Developed by www.freestudentprojects.com echo $rs[password];?>" /></td>
</tr>
<?php //Developed by www.freestudentprojects.com
}
?>
<?php //Developed by www.freestudentprojects.com if($_GET[editemp]!=1)
{?>
<tr>
<th>Basic Salary</th>
<td>&nbsp; <input type=text name=bsal size=10 value="<?php //Developed by www.freestudentprojects.com echo $rs[basicpay];?>"
<?php //Developed by www.freestudentprojects.com
if(!isset($_SESSION[adminid]))
{
	echo "disabled";
}
}
?>
></td>
</tr>

<tr>
<th>Status</th>
<td>&nbsp; <select name=stat
<?php //Developed by www.freestudentprojects.com
if(!isset($_SESSION[adminid]))
{
	echo "disabled";
}

?>
>
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
</select></td>
</tr>
<tr>
<th>Created date</th>
<td>
&nbsp; 
<?php //Developed by www.freestudentprojects.com 
if(isset($_GET[editemp]))
{
echo $rs[creatdate];
}
else
{
echo date("d-m-Y");
}
?>
</td>
</tr>
<tr>
<th colspan=2><input type=submit name=subemp value=Submit></th>
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