<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
$fromdt = $_POST[fromdate] . " ".$_POST[fromtime];
$todt = $_POST[todate] . " ". $_POST[totime];

if(isset($_GET[delint]))
{
	$delsql="DELETE FROM interview WHERE interviewid='$_GET[delint]'";
	$recdel=mysqli_query($obj,$delsql);
	if(!$recdel)
	{
		$msg="<br><font color=red>Could not delete the record<font>";
	}
	else
	{
		$msg="<br><font color=green>Record deleted successfully...<font>";
	}
}

if($_POST[sessionvalue] == $_SESSION["setid"])
{
	if(isset($_POST[submit]))
	{
		if(isset($_GET[editint]))
		{
			$sqlupd="UPDATE interview SET selectionround='$_POST[selectionround]',interviewfdate='$fromdt',interviewtdate='$todt',venue='$_POST[ven]',contactno='$_POST[cno]',status='$_POST[stat]' where interviewid='$_GET[editint]'";
			$recupd=mysqli_query($obj,$sqlupd);
			if(!$recupd)
			{
				$msg="<br><font color=red>Record could not be edited<font>";
			}
			else
			{
				$msg="<br><font color=green>Record edited successfully...<font>";
			}
		}
		else
		{
			$sql="insert into interview values('','$_POST[selectionround]','$_POST[vacid]','$fromdt','$todt','$_POST[ven]','$_POST[cno]','$_POST[stat]')";
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
}
$_SESSION["setid"]=rand();
$sqlsel=mysqli_query($obj,"SELECT * FROM interview WHERE interviewid='$_GET[editint]'");
$res=mysqli_fetch_array($sqlsel);
?>
	<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>&nbsp;</h1>
            
            <p>
<form method="post" action="">
<input type=hidden name="sessionvalue" value="<?php //Developed by www.freestudentprojects.com echo $_SESSION["setid"];?>">
<table width="554" border=3>
<tr>
<td colspan="3" align="center"><b>vacancies</b>
  <?php //Developed by www.freestudentprojects.com
  echo $msg;
  ?>
  </td>
    </tr>
<tr>
  <th width="114">Vacancy</th>
<td colspan="2">
<?php //Developed by www.freestudentprojects.com 
if(isset($_GET[scid]))
{
$viewids = $_GET[scid];
}
else
{
$viewids = $res[vacid];
}

$sqlque=mysqli_query($obj,"SELECT vacid,vacancy,title from vacancies where vacancies.vacid='$viewids'");
$rc=mysqli_fetch_array($sqlque);
echo "<b>".$rc[title]. "</b><br>";
echo "Vacancy : ".$rc[vacancy];
?>
<input type=hidden name=vacid size=25 value="<?php //Developed by www.freestudentprojects.com echo $rc[vacid]; ?>" >
</td>
</tr>    
<tr>
  <th height="36">Selection round</th>
  <td colspan="2"><input name="selectionround" type="text" id="selectionround" size="50"  value="<?php //Developed by www.freestudentprojects.com echo $res[selectionround]; ?>" /></td>
</tr>

<tr>
<th rowspan="2">Interview Date</th>

<th width="61" align="left"> 
&nbsp;From 
<th width="360" align="left">

<input type="date" name="fromdate" 
<?php //Developed by www.freestudentprojects.com
if($res[selectionround] != "" )
{
?>
value="<?php //Developed by www.freestudentprojects.com echo  date('Y-m-d',strtotime($res[interviewfdate])); ?>" 
<?php //Developed by www.freestudentprojects.com
}
?>
/>
<input name="fromtime" type="time" id="fromtime" 
<?php //Developed by www.freestudentprojects.com
if($res[selectionround] != "" )
{
?>
value="<?php //Developed by www.freestudentprojects.com echo date('h:i', strtotime($res[interviewfdate])); ?>"
 <?php //Developed by www.freestudentprojects.com
}
?>
/></tr>
<tr>
  <th align="left">&nbsp;To 
  <th align="left"><input type="date" name="todate" 
<?php //Developed by www.freestudentprojects.com
if($res[selectionround] != "" )
{
?>
value="<?php //Developed by www.freestudentprojects.com echo  date('Y-m-d',strtotime($res[interviewtdate])); ?>" 
<?php //Developed by www.freestudentprojects.com
}
?>
/>
    <input name="totime" type="time" id="totime" 
<?php //Developed by www.freestudentprojects.com
if($res[selectionround] != "" )
{
?>
 value="<?php //Developed by www.freestudentprojects.com echo date('h:i', strtotime($res[interviewtdate])); ?>"  
<?php //Developed by www.freestudentprojects.com
}
?>
/> 
  </tr>

<tr>
<th>Venue</th>
<td colspan="2"><textarea name=ven><?php //Developed by www.freestudentprojects.com echo $res[venue]; ?></textarea></td>
</tr>
<tr>
<th>Contact Number</th>
<td colspan="2"><input type=text name=cno value="<?php //Developed by www.freestudentprojects.com echo $res[contactno]; ?>" size=15></td>
</tr>
<tr>
<th>Status</th>
<td colspan="2"><select name=stat>
<?php //Developed by www.freestudentprojects.com
$arr=array("Select","Enabled","Disabled");
foreach($arr as $val)
{
	if($val==$res[status])
	{
		echo "<option value=$val selected>$val</option>";
	}
	else
	{
		echo"<option value=$val>$val</option>";
	}
}
?></select></td>
</tr>
<tr>
<th colspan=3><input type=submit name=submit value=Submit></th>
</tr>
</table>
</form>

<br />
<table width="589" border=1>
<tr><th colspan=6>Interview
</th></tr>
<tr>
<th width="102">Selection round</th>

<th width="238">Interview Date</th>
<th width="66">Venue</th><th width="42">Status</th>
<th width="72">Action</th>
</tr>
<?php //Developed by www.freestudentprojects.com 
if(isset($_GET[editvac]))
{
	$viewids=$_GET[editvac];
}
$sqlsel1="SELECT interview.*,vacancies.vacancy FROM interview INNER JOIN vacancies ON interview.vacid=vacancies.vacid where interview.vacid='$viewids'";
$res1=mysqli_query($obj,$sqlsel1);
while($rs=mysqli_fetch_array($res1))
{
echo "<tr>
<td>$rs[selectionround]</td>";

//echo "<td> From: " . date('d-m-Y h:i A', strtotime($res[interviewfdate]));  
echo "<td> From: " .  date('d-m-Y h:i A', strtotime($rs[interviewfdate]));  
echo "<br> To: " . date('d-m-Y h:i A', strtotime($rs[interviewtdate])) . "</td>
<td>$rs[venue]<br>Contact No. $rs[contactno]</td><td>$rs[status]</td>
<td><a href='scheduleinterview.php?editvac=$rs[vacid]&editint=$rs[interviewid]'>Edit</a>|
<a href='scheduleinterview.php?editint=$viewids&delint=$rs[interviewid]'>Delete</a></td></tr>";
}
?>
</table>     
</p>
          </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>