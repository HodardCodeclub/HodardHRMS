<?php //Developed by www.freestudentprojects.com
include("connection.php");
if(isset($_GET['delid']))
{
	$sqldel="DELETE FROM applicant WHERE appid='$_GET[delid]'";
	$rsdel=mysqli_query($obj,$sqldel);
	if(!$rsdel)
		{
		$msg="Failed to delete!!!";
		}
	else
		{
		$msg="Record deleted successfully!!!";
		}
}
$sqlsel="SELECT appstats.*,applicant.appid FROM appstats INNER JOIN applicant ON appstats.appid=applicant.appid";
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
        
            <h1>View Applicant Status</h1>
            
            <p>
<table border=1>
<tr>
  <th colspan="6">Applicants status record<?php //Developed by www.freestudentprojects.com echo $msg; ?></th>
  </tr>
<tr>
<th>Applicant id</th>
<th>About applicant</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php //Developed by www.freestudentprojects.com
while($rs=mysqli_fetch_array($res))
{
echo "<tr>
<td>$rs[appid]</td>
<td>$rs[aboutapp]</td>
<td>$rs[appstatus]</td>
<td><a href='xappstats.php?editid=$rs[appid]'>Edit</a> | 
<a href='xviewappstats.php?delid=$rs[appid]'>Delete</a></td>
</tr>";
}
?>
</table>
 </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>