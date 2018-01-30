<?php //Developed by www.freestudentprojects.com
session_start();
include("header.php");
?>
<script type="application/javascript">
function validation()
{
	//Date validation code
	/*
	var dateOne = new Date(document.form1.start_date.value); //Year, Month, Date
       var dateTwo = new Date(document.form1.end_date.value); //Year, Month, Date
       if (dateOne > dateTwo) {
            alert("Date One is greather than Date Two.");
			return false;
        }
		*/
	//Date validation code ends here
	
	var emp = document.getElementsByName("emp[]");
	var pmod = document.getElementsByName("pmod[]");
	var pelem = document.getElementsByName("pelem[]");	
	var srdt = document.getElementsByName("srdt[]");	
	var endt = document.getElementsByName("endt[]");	
	var com = document.getElementsByName("com[]");
	var stat = document.getElementsByName("stat[]");					
	
	for(var i=0; i < emp.length; i++){
		if(emp[i].value == "" )
		{
			alert("Please select valid employee name..");
			emp[i].focus();
			return false;
		}
	}
	
	for(var i=0; i < pmod.length; i++){
		if(pmod[i].value == "" )
		{
			alert("Project module should not be empty...");
			pmod[i].focus();
			return false;
		}
	}
	
	for(var i=0; i < pelem.length; i++){
		if(pelem[i].value == "" )
		{
			alert("kindly select project element...");
			pelem[i].focus();
			return false;
		}
	}
	
	for(var i=0; i < srdt.length; i++){
		if(srdt[i].value == "" )
		{
			alert("Project start date should not be empty...");
			srdt[i].focus();
			return false;
		}
	}
	
	for(var i=0; i < endt.length; i++){
		if(endt[i].value == "" )
		{
			alert("Project end date should not be empty....");
			endt[i].focus();
			return false;
		}
	}
	
	for(var i=0; i < srdt.length; i++){
				var dateOne = new Date(srdt[i].value); //Year, Month, Date
			    var dateTwo = new Date(endt[i].value); //Year, Month, Date
			   if (dateOne > dateTwo) {
					alert("Start date is greather than End date.");
					srdt[i].focus();
					return false;
				}
	}
	
	for(var i=0; i < com.length; i++){
		if(com[i].value == "" )
		{
			alert("Comment should not be empty....");
			com[i].focus();
			return false;
		}
	}
	
	for(var i=0; i < stat.length; i++){
		if(stat[i].value == "" )
		{
			alert("Kindly select project status..");
			stat[i].focus();
			return false;
		}
	}

	/*
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}*/
	//alert("close me");
	//return false;
	/*
	if(frmassign.emp.value=="")
	{
		alert("Kindly select the employee name");
		frmassign.emp.focus();
		return false;
	}
	else if(frmassign.pmod.value=="")
	{
		alert("project module should not be empty");
		frmassign.pmod.focus();
		return false;
	}
	else if(frmassign.pelem.value=="")
	{
		alert("Please select the project element");
		frmassign.pelem.focus();
		return false;
	}
	else
	{
		return true;
	}
	*/
}
</script>
<div id="templatemo_main">
 <?php //Developed by www.freestudentprojects.com
include("sidebar.php");

if($_SESSION[setid]==$_POST[sessionvalue])
{

	if(isset($_POST[submit]))
	{
		
		for($j=0; $j< $_POST[noemp]; $j++ )
		{			
			$empid =$_POST[emp];
			$pelem = $_POST[pelem];
			$pmod =$_POST[pmod];
			$srdt = $_POST[srdt];
			$endt = $_POST[endt];
			$com = $_POST[com];
			$stat = $_POST[stat];
			
			if($stat[$j] == "Completed")
			{
				$dt = date("Y-m-d");
			}
			
			$sql="insert into projectstatus values('','$_GET[projectid]','$empid[$j]','$pelem[$j]','$pmod[$j]','$srdt[$j]','$endt[$j]','$dt','$com[$j]','$stat[$j]')";
			$rins=mysqli_query($obj,$sql);
			$dt = "";
			if(isset($rins))
			{
				$msg="<br><font color=green>Record inserted successfully!!</font>";
			}
			else
			{
				$msg="<br><font color=red>Failed to insert record!!</font>";
			}
		}
		
	}
}
$_SESSION[setid]=rand();

?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
          <h1>Assign Projects</h1>
             <?php //Developed by www.freestudentprojects.com
			 echo $msg;
			 ?>
             <?php //Developed by www.freestudentprojects.com
$sqlsel="SELECT projects.*,employees.fname,employees.lname FROM projects INNER JOIN employees ON projects.empid=employees.empid where projects.projectid='$_GET[projectid]'";	
$res1=mysqli_query($obj,$sqlsel);
$rs1 = mysqli_fetch_array($res1)		 
			 ?>           
            <table width="576" border="1">
               <tr>
                 <th width="233" scope="row">Project Title</th>
                 <td width="327">&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[projecttitle]; ?>
                 <img src="uploads/<?php //Developed by www.freestudentprojects.com echo $rs1[image]; ?>" />
                 </td>
               </tr>
               <tr>
                 <th scope="row">Description</th>
                 <td>&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[description]; ?></td>
               </tr>
               <tr>
                 <th scope="row">Document</th>
                 <td>&nbsp;<a href='uploads/<?php //Developed by www.freestudentprojects.com echo $rs1[document]; ?>'>Click here</a></td></td>
               </tr>
               <tr>
                 <th scope="row">Start date</th>
                 <td>&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[startdate]; ?></td>
               </tr>
               <tr>
                 <th scope="row">End date</th>
                 <td>&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[enddate]; ?></td>
               </tr>
               <tr>
                 <th scope="row">Status</th>
                 <td>&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[status]; ?></td>
               </tr>
          </table>
         <br> 
         
<?php //Developed by www.freestudentprojects.com
if(isset($_POST[submitnoemp]))
{
?>
 <p>
<form  name="frmassign" method="POST" action="" onsubmit="return validation()">
 			<input type=hidden name="noemp" value="<?php //Developed by www.freestudentprojects.com echo $_POST[noemployees]; ?>" />
            <input type=hidden name=sessionvalue value="<?php //Developed by www.freestudentprojects.com echo $_SESSION['setid'];?>">
            <table border=2>
            <tr>
            <th>SL No.</th>
            <th>Employee</th>
            <th>Project details</th>
            <th>Date</th>
            <th>Comment</th>
            <th>Project Status</th></tr>
            <?php //Developed by www.freestudentprojects.com
			for($i=1; $i<=$_POST[noemployees]; $i++ )
			{
			?>
            
			 <tr>
            
             <td> <?php //Developed by www.freestudentprojects.com echo $i; ?>
             </td>
             <td><select name="emp[]">
             <option value="">Select</option>
               <?php //Developed by www.freestudentprojects.com
			 $res=mysqli_query($obj,"select distinct(employees.empid),fname,lname from employees where employees.status='Enabled' and employees.did>3 and employees.empid not in (select distinct(empid) from projectstatus where projectstatus.status='Pending')");
			while($rs=mysqli_fetch_array($res))
			{
            	echo"<option value=$rs[empid]>$rs[fname] $rs[lname]</option>";
			}
			?>
             </select></td>
            <td>
            Project module<br><input type=text  placeholder="Project module" size=20 name="pmod[]"><br>
            Project Element<br>
            <select name="pelem[]">
            <option value="">Select</option>
            <option value="Analysis">Analysis</option>
            <option value="Requirement Collection">Requirement  Collection</option>
            <option value="Design">Design</option>
            <option value="Coding">Coding</option>
            <option value="testing">Testing</option>
            </select></td>
            <td>Start date:<br><input type=date name="srdt[]"><br>
           End date<br> <input type=date name="endt[]"></td>
            <td><textarea name="com[]" cols=10></textarea>
            </td>
            <td><select name="stat[]">
            <option value="">Select</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option></select></td></tr>
        
            <?php //Developed by www.freestudentprojects.com
			}
			?>      <tr align="center"><th colspan=7><input type=submit name=submit value=submit /></th></tr>          
            </table>
</form>
</p>
<?php //Developed by www.freestudentprojects.com
}
else
{
?>
 <form method="post" action="">
<table width="514" border="1">
  <tr>
    <th width="217" scope="row">&nbsp; No of employees required: </th>
    <td width="281">&nbsp;<input type="number" name="noemployees" /></td>
  </tr>
  <tr>
    <th colspan="2">&nbsp;<input type="submit" name="submitnoemp" value="Submit"></th>
  </tr>
</table>
</form>
<?php //Developed by www.freestudentprojects.com
}
?>
 
       </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>