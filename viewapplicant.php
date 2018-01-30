<?php //Developed by www.freestudentprojects.com
include("connection.php");
if(isset($_GET[delid]))
{
$sql="DELETE FROM applicants WHERE appid='$_GET[delid]'";
				$rcinsert=mysqli_query($obj,$sql);
				if(!$rcinsert)
				{
					$msg="<br><font color=red><b>Failed to delete!!!</b></font><br>";
				}
				else
				{
				$msg="<br><font color=green><b>Application details deleted successfully.,..!!!</b></font><br>";
				}
}

include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
  
<?php //Developed by www.freestudentprojects.com
$sqlsel1="SELECT * FROM vacancies";
$res1=mysqli_query($obj,$sqlsel1);
while($rs1=mysqli_fetch_array($res1))
{
?>
<table width="603" border="1" bgcolor="#FFFFFF">
  <tr>
    <th width="92" scope="row">Job code</th>
    <td width="203">&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[vacid]; ?></td>
  </tr>
  <tr>
    <th scope="row">Title</th>
    <td>&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[title]; ?></td>
  </tr>
</table>

<?php //Developed by www.freestudentprojects.com
$sqlsel="SELECT applicants.*,vacancies.vacancy FROM applicants INNER JOIN vacancies ON applicants.vacid=vacancies.vacid where applicants.vacid=$rs1[vacid]";
$res=mysqli_query($obj,$sqlsel);
if(mysqli_num_rows($res) == 0)
{
	echo "&nbsp; &nbsp; <strong>No records found</strong>";
}
else
{
?>
<table width="604" border="1">
<tr>
  <th colspan="6">Applicants record<?php //Developed by www.freestudentprojects.com echo $msg; ?></th>
  </tr>
<tr>
<th width="81">Image</th>
<th width="81">Full Name</th>
<th width="100">Contact Number</th>
<th width="94">E-Mail</th>
<th width="97">Qualification</th>
<th width="111" align="center">Action</th>
</tr>
<?php //Developed by www.freestudentprojects.com

while($rs=mysqli_fetch_array($res))
{
echo "<tr>
<td><img src='uploads/$rs[appimg]' width=100 height=100 ></img></td>
<td>$rs[fname] $rs[lname]</td>
<td>$rs[contactno]</td>
<td>$rs[emailid]</td>
<td>$rs[qualification]</td>
<td align='center'> 
<a href='applicant.php?editid=$rs[appid]'>Edit</a> ";

if(isset($_SESSION[adminid]))
{
echo "| <a href='viewapplicant.php?delid=$rs[appid]'>Delete</a>";
}

echo " | <a href='viewapplicantstatus.php?viewid=$rs[appid]'>View status</a>";

echo "</tr>";
}
?>
</table>
<?php //Developed by www.freestudentprojects.com
}
?>
<hr>
<?php //Developed by www.freestudentprojects.com

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