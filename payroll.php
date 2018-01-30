<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
include("header.php");
$_SESSION[setid] = rand();
?>
<script>
function ajaxselectemp(str)
{
if (str=="")
  {
  document.getElementById("ajaxbasicpay").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("ajaxbasicpay").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajaxbasicpay.php?empid="+str,true);
xmlhttp.send();
}

function ajaxattendance(empid,salmonth,basicpay)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("ajaxattenddisp").innerHTML=xmlhttp.responseText;
    }
  }	
xmlhttp.open("GET","ajaxattenddisp.php?empid="+empid+"&month="+salmonth+"&basicpay="+basicpay,true);
xmlhttp.send();
}

function calculatesal()
{
	otheallow=parseInt(frmpayroll.oallo.value);
	allow=parseInt(frmpayroll.allo.value);
	otsal=parseFloat(frmpayroll.ots.value);
	basic=parseFloat(frmpayroll.basic.value);
	gross=basic+otheallow+allow+otsal;
	/*
	lop=parseFloat(frmpayroll.deduction[0].value);
	pf=parseFloat(frmpayroll.deduction[1].value);
	tax=parseFloat(frmpayroll.deduction[2].value);
	*/
	
	 var chks = document.getElementsByName('deduction[]'); //here rr[] is the name of the textbox
	deduct= parseFloat(chks[0].value) + parseFloat(chks[1].value) + parseFloat(chks[2].value);
	net=gross-deduct;
	net=net.toFixed(2);
	document.frmpayroll.total.value = net;
}
</script>
<?php //Developed by www.freestudentprojects.com
/*
if(isset($_POST[submit1]) )
{
$fdate = $_POST[year]. "-".$_POST[mon]. "-00";
$num = cal_days_in_month(CAL_GREGORIAN, $_POST[mon], $_POST[year]);
$tdate =  $_POST[year]. "-".$_POST[mon]. "-".$num;

$sql=mysqli_query($obj,"select TIMEDIFF( attendance.logoutdate,  attendance.logindate),employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where attendance.empid='$_POST[emp]' and logindate between '$fdate' AND '$tdate'  ");	


$sql1=mysqli_query($obj,"select SUM(TIMEDIFF(attendance.logindate)),employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where attendance.empid='$_POST[emp]' and logindate between '$fdate' AND '$tdate'  ");	
$numworkingdays = mysqli_num_rows($sql);
}
else
{
$sql=mysqli_query($obj,"select TIMEDIFF( attendance.logoutdate,  attendance.logindate),employees.*, attendance.* from employees RIGHT JOIN attendance ON employees.empid=attendance.empid where empid='$_POST[empname]'");
}
*/

?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Employee Payroll</h1>
            
            <p>
<form method=POST action="paymentreport.php" name="frmpayroll">
<input type="hidden" name="setid" value="<?php //Developed by www.freestudentprojects.com echo $_SESSION[setid]; ?>" />
<table width="600" border=1>
<tr><td width="158">Salary month</td>
<td width="426"><input type=month name=mon ></td></tr>
<tr><td>Employee name</td>
<td><select name=empname onchange="ajaxselectemp(this.value)">
<option value="">Select</option>
<?php //Developed by www.freestudentprojects.com
$salmon=$_GET[month]."-01";
$sql=mysqli_query($obj,"SELECT * FROM employees");
while($rs=mysqli_fetch_array($sql))
{
echo "<option value=$rs[empid]>$rs[fname] $rs[lname]</option>";
}
?>
</select></td></tr>
<tr><td>Basic pay</td>
<td>
<div id='ajaxbasicpay'><input type=text name=basic value=""></div>

</td></tr>

<tr>
  <td colspan="2" align="center">
  <input type="button" name="submit3" id="submit" value="Submit" onclick='ajaxattendance(empname.value,mon.value,basic.value)' /></td>
  </tr>
</table>

<div id='ajaxattenddisp'>   
</div>

</form>
</center>
</p>
        </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>