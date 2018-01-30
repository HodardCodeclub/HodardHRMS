<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
if(isset($_SESSION[adminid]))
{
	$updid =$_SESSION[adminid] ;
}

if(isset($_SESSION[hrid]))
{
	$updid =$_SESSION[hrid] ;
}

if($_SESSION["setid"]==$_POST[sessionvalue])
{
	if(isset($_POST[submit]))
	{
			$dt=date("Y-m-d");
			$sql="insert into applicantstatus values('','$_POST[applicantid]','$_POST[selectionround]','$updid','$_POST[abapp]','$_POST[appst]','$_POST[interviewdate]')";
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

$selres= mysqli_query($obj,"select * from applicants where appid='$_GET[viewid]'");
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
          <h1>Applicant status</h1>
          <p>     	
       		  <?php //Developed by www.freestudentprojects.com
				$dt= date("Y-m-d");
				$sql = "SELECT * FROM vacancies WHERE vacid='$selrec[vacid]'";
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
                

    
                
            <p>
<form name="frm3" method=post action="" enctype="multipart/form-data">
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
<th>First Name</th>
<td width="295"><?php //Developed by www.freestudentprojects.com echo $selrec[fname]; ?></th>
</tr>
<tr>
<th>Last Name</th>
<td width="295"><?php //Developed by www.freestudentprojects.com echo $selrec[lname]; ?></th>
</tr>
<tr>
<th>Contact Number</th>
<td width="295"><?php //Developed by www.freestudentprojects.com echo $selrec[contactno]; ?></th>
</tr>
<tr>
<th>EMail ID</th>
<td width="295"><?php //Developed by www.freestudentprojects.com echo $selrec[emailid]; ?></th>
</tr>
<tr>
<th>Date Of Birth</th>
<td width="295"><?php //Developed by www.freestudentprojects.com echo $selrec[DOB]; ?>         </th>
</tr>
<tr>
<th>Qualification</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
echo  $selrec[qualification];
?>
</th>
</tr>
<tr>
<th>Gender</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
echo $selrec[gender]; 
?>
</th>
</tr>
<tr>
<th>Salary Expectation</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com echo $selrec[salexp]; ?>
&nbsp; to &nbsp;
<?php //Developed by www.freestudentprojects.com echo $selrec[salexp]; ?> </th>
</tr>
<tr>
<th>No. Of Years Experience</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
echo $selrec[experience];
?>
</select></th>
</tr>
<tr>
<th>Comment</th>
<td width="295"><?php //Developed by www.freestudentprojects.com echo $selrec[comments]; ?></th>
</tr>
<tr>
<th>Resume</th>
<td width="295">
<?php //Developed by www.freestudentprojects.com
$selint=mysqli_query($obj,"select interviewid,selectionround from interview where status='Enabled' AND vacid='$selrec[vacid]'");
while($rs=mysqli_fetch_array($selint))
{
	$lastoundid = $rs[interviewid];
}
?>
<?php //Developed by www.freestudentprojects.com
if(isset($_GET[viewid]))
{
	echo "<a href='uploads/<?php //Developed by www.freestudentprojects.com echo $selrec[uploads]; ?>'>Download link</a>";
}

?>
</th>
</tr>
<tr>
<th colspan=2>
</th>
</tr>
<?php //Developed by www.freestudentprojects.com
}
?>
</table>

<hr />

<h2>Set Status for this appplicant</h2>
<table width="644" border="1">
  <tr>
    <th scope="col">&nbsp; Date</th>
    <th scope="col">&nbsp;Interview level</th>
    <th scope="col">&nbsp; HR</th>
    <th scope="col">&nbsp; About applicant</th>
    <th scope="col">&nbsp; Applicant status</th>
  </tr>
<?php //Developed by www.freestudentprojects.com
$selint=mysqli_query($obj,"select interviewid,selectionround from interview where status='Enabled' AND vacid='$selrec[vacid]'");
while($rs=mysqli_fetch_array($selint))
{
	$qst=mysqli_query($obj,"select * from applicantstatus where interviewid='$rs[interviewid]' AND appid='$selrec[appid]'");
	$rsappst = mysqli_fetch_array($qst);
	if(mysqli_num_rows($qst) >= 1)
	{

		echo "  <tr>
			<td>&nbsp;$rsappst[date]</td>
			<td>&nbsp;$rs[selectionround]</td>
			";
$qstname1=mysqli_query($obj,"SELECT * FROM  employees where empid='$rsappst[empid]'");
$rsaname1 = mysqli_fetch_array($qstname1);
		echo "<td>&nbsp;$rsaname1[fname] $rsaname1[lname]</td>
			<td>&nbsp;$rsappst[aboutapp]</td>
			<td>&nbsp;$rsappst[appstatus]</td>
		  </tr>
		  ";
		$appstatus = $rs[appstatus];
		$roundid = $rs[37];
		if($rsappst[appstatus] == "Rejected" || $rsappst[appstatus] == "On Process")
		{
			echo "</table>";	
			break;
		}
	}
	else
	{
?>
<tr>
<th>
<input type="hidden" name="applicantid" value="<?php //Developed by www.freestudentprojects.com echo $selrec[appid]; ?>" />
<input type="date" name="interviewdate" value="" />
</th>
<th>&nbsp;<?php //Developed by www.freestudentprojects.com
echo $rs[selectionround];
?></th>
<th>
<?php //Developed by www.freestudentprojects.com
$qstname=mysqli_query($obj,"SELECT * FROM  employees where empid='$updid'");
$rsaname = mysqli_fetch_array($qstname);
echo $rsaname[fname] . " ". $rsaname[lname];
?>

  </th>
<th>
<input name="selectionround" type="hidden" value="<?php //Developed by www.freestudentprojects.com echo $rs[interviewid]; ?>" />
<textarea name="abapp" placeholder="About Applicant"></textarea></th>
<th><select name=appst>
  <option value="">Applicant Status</option>
  <option value="Selected">Selected</option>
  <option value="Rejected">Rejected</option>
  <option value='On Process'>On Process</option>
</select></th>
</tr>
<tr><td colspan="5" align="center"><input type=submit name=submit value=Submit></td></tr>
<?php //Developed by www.freestudentprojects.com
break;
	}
}
?>
</table>

</form>

<?php //Developed by www.freestudentprojects.com
$qrsql = mysqli_query($obj,"SELECT *  FROM  applicantstatus where interviewid='$lastoundid' AND appstatus='Selected'");
if(mysqli_num_rows($qrsql) == 1 )
{
echo "<h1 align='center'>Send offer letter</h1>";
}
?>

</p>
      </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
  </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>