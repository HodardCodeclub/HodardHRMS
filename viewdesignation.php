<?php //Developed by www.freestudentprojects.com
include("connection.php");
if(isset($_GET[deldes]))
{
	$sqldel="DELETE FROM designation WHERE did='$_GET[deldes]'";
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
$sqlsel="SELECT * FROM designation";
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
        
            <h1>View Designation</h1>
            
            <p>
<table border="1">

<tr>
<th width="80">Designation</th>
<th width="77">Description</th>
<th width="42">Status</th>
<th width="77">Action</th>
</tr>
<?php //Developed by www.freestudentprojects.com
while($rs=mysqli_fetch_array($res))
{
echo "<tr>
<td>$rs[designation]</td>
<td>$rs[description]</td>
<td>$rs[status]</td><td>&nbsp;";
if($rs[did]>2)
{
	echo "<a href='designation.php?editdes=$rs[did]'>Edit </a>";
	echo "<a href='viewdesignation.php?deldes=$rs[did]'>| Delete </a>";
}
echo "</td></tr>";
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