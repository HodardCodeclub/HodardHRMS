<?php //Developed by www.freestudentprojects.com
session_start();
date_default_timezone_set("Asia/Kolkata");
include_once("connection.php");
if(isset($_POST[submit]))
{
$sql = "SELECT * FROM employees where username='$_POST[uname]' AND password='$_POST[pass]' and status='Enabled'";
$qresult = mysqli_query($obj,$sql);
$count = mysqli_num_rows($qresult);
if($count == 1)
{
	$rs = mysqli_fetch_array($qresult);

	if($rs[did] == 1)
	{
		$_SESSION[adminid] = $rs[empid];
		header("Location: adminpanel.php");
	}
	//Login attendance code starts here
	if($rs[did]!=1)
	{
		$dt=date('Y-m-d h:i:s');
		$sql4=mysqli_query($obj,"insert into attendance values('','$rs[empid]','$dt','','','')");
		$_SESSION[attid]= mysqli_insert_id($obj);
	}
	//Login attendance code ends here
	if($rs[did]==2)
	{		
		$_SESSION[hrid]=$rs[empid];
		header("Location: hrpanel.php");
	}
	if($rs[did]==3)
	{
		$_SESSION[pmagid]=$rs[empid];
		header("Location: projectmangpanel.php");
	}
	if($rs[did]>=4)
	{
		$_SESSION[emid]=$rs[empid];
		header("Location: employeepanel.php");
	}

}
else
{
	$loginresult =  "<br><strong><font color='red'>Invalid username / password</font></strong><br>";
}
}
	if(isset($_SESSION[adminid]))
	{
	$sql1 = "SELECT * FROM employees where empid='$_SESSION[adminid]'";
	$qresult1 = mysqli_query($obj,$sql1);
	$rs1 = mysqli_fetch_array($qresult1);
	}
	if(isset($_SESSION[hrid]))
{
	$sql2="select * from employees where empid='$_SESSION[hrid]'";
	$qres=mysqli_query($obj,$sql2);
	$rs2=mysqli_fetch_array($qres);
}
	if(isset($_SESSION[pmagid]))
	{
		$sql3="select * from employees where empid='$_SESSION[pmagid]'";
		$qresu=mysqli_query($obj,$sql3);
		$rs3=mysqli_fetch_array($qresu);
	}

	if(isset($_SESSION[emid]))
	{
		$slq4="select * from employees where empid='$_SESSION[emid]'";
		$qresul=mysqli_query($obj,$slq4);
		$rs4=mysqli_fetch_array($qresul);
	}
	?>
<div id="templatemo_sidebar">
        
        	<div class="cleaner_h30"></div>
            <?php //Developed by www.freestudentprojects.com
			echo "<strong>Date/Time:</strong><br>".date('d-m-Y H:i:s'). "<br><br>";
			
			
			$slqlogintime="select * from attendance where attid='$_SESSION[attid]'";
			$qresullogintime=mysqli_query($obj,$slqlogintime);
			$rslogintime=mysqli_fetch_array($qresullogintime);
			echo "<strong>Login Time:</strong><br>". $rslogintime[logindate] . "<br><br>";
			
			if(isset($_SESSION[adminid]))
			{
			?>            
        	<h3>Admin Account</h3>
        <strong>Name:</strong><br /><?php //Developed by www.freestudentprojects.com echo $rs1[fname]. " " . $rs1[lname]; ?>
       <br />  <label for="password"><strong>Username:</strong><br /> <?php //Developed by www.freestudentprojects.com echo $rs1[username]; ?></label>
         
        <br />  <strong>  <a href='adminpanel.php'>Admin Panel</a><br />
              <a href='logout.php'>Logout</a></strong>
         <?php //Developed by www.freestudentprojects.com
			}
			else if(isset($_SESSION[hrid]))
			{
			?>
            <h3>HR Account</h3>
        <strong>Name:</strong><br /><?php //Developed by www.freestudentprojects.com echo $rs2[fname]. " " . $rs2[lname]; ?>
       <br />  <label for="password"><strong>Username:</strong><br/><?php //Developed by www.freestudentprojects.com echo $rs2[username];?></label>
         
        <br />  <strong>  <a href='hrpanel.php'>HR Panel</a><br />
              <a href='logout.php'>Logout</a></strong>
             
            <?php //Developed by www.freestudentprojects.com
			}
			else if(isset($_SESSION[pmagid]))
			{
			?>
            <h3>Project Account</h3>
        <strong>Name:</strong><br /><?php //Developed by www.freestudentprojects.com echo $rs3[fname]. " " . $rs3[lname]; ?>
       <br />  <label for="password"><strong>Username:</strong><br/><?php //Developed by www.freestudentprojects.com echo $rs3[username];?></label>
         
        <br />  <strong>  <a href='projectmangpanel.php'>Project Management Panel</a><br />
              <a href='logout.php'>Logout</a></strong>
              
              <?php //Developed by www.freestudentprojects.com
			}
			else if(isset($_SESSION[emid]))
			{
			   ?>
               <h3>Employee Account</h3>
           <strong>Name:</strong><br /><?php //Developed by www.freestudentprojects.com echo $rs4[fname]." " .$rs4[lname];?>
         <br /><label for="password"><strong>Username:</strong><br /><?php //Developed by www.freestudentprojects.com echo $rs4[username];?></label>
         
         <br /><strong> <a href='employeepanel.php'>Employee Panel</a><br />
         <a href='logout.php'>Logout</a></strong>

           <?php //Developed by www.freestudentprojects.com 
			}
			else
			{
			?>
            <form method=POST action="">
            <table bgcolor="#99CCFF">
            <tr><td>
           <strong> Login Panel</strong> <br /><br />
           <?php //Developed by www.freestudentprojects.com echo $loginresult ;?>
            &nbsp;User Name:<br /><input type=text name=uname size=25 /><br />
            &nbsp;Password :<br /><input type=password name=pass size=25 /><br />
            <center><input type=submit name=submit value=Login /></center>
            </td></tr></table>
            </form><?php //Developed by www.freestudentprojects.com
			}
			?>
        </div> <!-- end of templatemo_sidebar -->
		
<?php //Developed by www.freestudentprojects.com
/*

<?php //Developed by www.freestudentprojects.com
session_start();
include("connection.php");
if(isset($_POST[submit]))
{
$sql = "SELECT * FROM employees where username='$_POST[uname]' AND password='$_POST[pass]' and status='Enabled'";
$qresult = mysqli_query($obj,$sql);
$count = mysqli_num_rows($qresult);
if($count == 1)
{
	$rs = mysqli_fetch_array($qresult);
	if($rs[did] == 1)
	{
		$_SESSION[adminid] = $rs[empid];
		header("Location: adminpanel.php");
	}
	if($rs[did]==2)
	{
		$_SESSION[hrid]=$rs[empid];
		header("Location: hrpanel.php");
	}
}
else
{
	$loginresult =  "<br><strong><font color='red'>Failed to Login</font></strong><br>";
}
}

	if(isset($_SESSION[adminid]))
	{
	$sql1 = "SELECT * FROM employees where empid='$_SESSION[adminid]'";
	$qresult1 = mysqli_query($obj,$sql1);
	$rs1 = mysqli_fetch_array($qresult1);
	}
	if(isset($_SESSION[hrid]))
{
	$sql2="select * from employees where empid='$_SESSION[hrid]'";
	$qres=mysqli_query($obj,$sql2);
	$rs2=mysqli_fetch_array($qres);
}
	?>
<div id="templatemo_sidebar">
        
        	<div class="cleaner_h30"></div>
            
             <?php //Developed by www.freestudentprojects.com
			if(isset($_SESSION[adminid]))
			{
			?>            
        	<h3>Admin Account</h3>
        <strong>Name:</strong><br /><?php //Developed by www.freestudentprojects.com echo $rs1[fname]. " " . $rs1[lname]; ?>
       <br />  <label for="password"><strong>Username:</strong><br /> <?php //Developed by www.freestudentprojects.com echo $rs1[username]; ?></label>
         
        <br />  <strong>  <a href='adminpanel.php'>Admin Panel</a><br />
              <a href='logout.php'>Logout</a></strong>

         <?php //Developed by www.freestudentprojects.com
			}
			else if(isset($_SESSION[hrid]))
			{
			?>
            <h3>HR Account</h3>
        <strong>Name:</strong><br /><?php //Developed by www.freestudentprojects.com echo $rs2[fname]. " " . $rs2[lname]; ?>
       <br />  <label for="password"><strong>Username:</strong><br/><?php //Developed by www.freestudentprojects.com echo $rs2[username];?></label>
         
        <br />  <strong>  <a href='hrpanel.php'>HR Panel</a><br />
              <a href='logout.php'>Logout</a></strong>

          <?php //Developed by www.freestudentprojects.com 
			}
			else
			{
			?>
            <form method=POST action="">
            <table bgcolor="#99CCFF">
            <tr><td>
           <strong> Login Panel</strong> <br /><br />
           <?php //Developed by www.freestudentprojects.com echo $loginresult ;?>
            &nbsp;User Name:<br /><input type=text name=uname size=25 /><br />
            &nbsp;Password :<br /><input type=password name=pass size=25 /><br />
            <center><input type=submit name=submit value=Login /></center>
            </td></tr></table>
            </form><?php //Developed by www.freestudentprojects.com
			}
			?>
        </div> <!-- end of templatemo_sidebar -->
-->		
*/
?>