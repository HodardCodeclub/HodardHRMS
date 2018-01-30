<?php //Developed by www.freestudentprojects.com
include("connection.php");
?>
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
$salmon=$_GET[month]."-01";
$sql=mysqli_query($obj,"SELECT employees . * FROM employees INNER JOIN (SELECT payments.empid FROM payments GROUP BY empid HAVING COUNT( empid ) >1)duplicates ON duplicates.empid != employees.empid");
while($rs=mysqli_fetch_array($sql))
{
echo "<option value=$rs[empid]>$rs[fname] $rs[lname]</option>";
}
?>