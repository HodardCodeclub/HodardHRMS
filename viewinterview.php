<?php //Developed by www.freestudentprojects.com 
include("connection.php");
if(isset($_GET[delint]))
{
	$delsql="DELETE FROM interview WHERE vacid='$_GET[delint]'";
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
$sqlsel="SELECT interview.*,vacancies.vacancy FROM interview INNER JOIN vacancies ON interview.vacid=vacancies.vacid";
$res=mysqli_query($obj,$sqlsel);
?>
<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>View Interview</h1>
            
            <p>
                
<table border=1>
<tr><th colspan=6>Interview
</th></tr>
<tr>
<th>Vacancy</th>
<th>Selection Round</th>
<th>Interview (from) Date</th>
<th>Interview (to) Date</th>
<th>venue</th>
<th>Contact Number</th>
<th>Action</th>
</tr>
<?php //Developed by www.freestudentprojects.com 
while($rs=mysqli_fetch_array($res))
{
echo "<tr>
<td>$rs[vacancy]</td>
<td>$rs[selectionround]</td>
<td>$rs[interviewfdate]</td>
<td>$rs[interviewtdate]</td>
<td>$rs[venue]</td>
<td>$rs[contactno]</td>
<td><a href='scheduleinterview.php?editint=$rs[interviewid]'>Edit</a>|
<a href='viewinterview.php?delint=$rs[vacid]'>Delete</a></td></tr>";
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