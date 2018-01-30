<?php //Developed by www.freestudentprojects.com
session_start();
if(!isset($_SESSION[hrid]))
{
	header("Location: index.php");
}
include("header.php");
?>
<div id="templatemo_main">
<?php //Developed by www.freestudentprojects.com
include("sidebar.php");
?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>HR Management</h1>
            
            <p>
         <table width="478" border="1">
              <tr>
                <td width="152"><p><a href='employee.php?editemp=<?php //Developed by www.freestudentprojects.com echo $_SESSION[hrid]; ?>'><img src="images/profile.jpg" width="150" height="152" /></a></p>
                <p><strong><a href='employee.php?editemp=<?php //Developed by www.freestudentprojects.com echo $_SESSION[hrid]; ?>'>Edit Profile</a></strong></p></td>
                <td width="152"><p><a href='changepassword.php'><img src="images/password.jpg" width="150" height="152" /></a></p>
                <p><strong><a href='changepassword.php'>Change Password</a></strong></p></td>
                <td width="152"><p><a href='viewemployee.php'><img src="images/vemployee.png" width="150" height="152" /></a></p>
                <p><strong><a href='viewemployee.php'>View Employee</a></strong></p></td>
              </tr>
              <tr>
                <td><p><a href='viewproject.php'><img src="images/projstat.jpg" width="150" height="152"></a></p>
                <p><strong><a href='viewproject.php'>View Project</a></strong></p></td>
                <td><p><a href='career.php'><img src="images/View.png" width="150" height="152" /></a></p>
                <p><strong><a href='career.php'>View Vacancies</a></strong></p></td>
                <td><p><a href='viewapplicant.php'><img src="images/applicant.png" width="150" height="152" /></a></p>
                <p><strong><a href='viewapplicant.php'>View Applicant</a></strong></p></td>
              </tr>
              <tr>
                <td><p><a href='viewinterview.php'><img src="images/interview.jpg" width="150" height="152" /></a></p>
                <p><strong><a href='viewinterview.php'>View Interview Schedule</a></strong></p></td>
                <td><p><a href='holiday.php'><img src="images/hol.jpg" width="150" height="152" /></a></p>
                <p><strong><a href='holiday.php'>view Holidays</a></strong></p></td>
                <td><p><a href='viewattendance.php'><img src="images/Attendance.jpg" width="150" height="152" /></a></p>
                <p><strong><a href='viewattendance.php'>View Attendance</a></strong></p></td>
              </tr>
              <tr>
                <td><p><a href="leaveappli.php"><img src="images/.jpg" width="150" height="152" /></a></p>
                <p><strong><a href="leaveappli.php">Apply For Leave</a></strong></p></td>
                <td><p><a href='paymentreport.php'><img src="images/salary.jpg" width="150" height="152" /></a></p>
                <p><strong><a href='paymentreport.php'>View Payroll</a></strong></p></td>
                <td><p><a href='logout.php'><img src="images/logout.jpg" width="150" height="152" /></a></p>
                <p><strong><a href='logout.php'>Logout</a></strong></p></td>
               
              </tr>
            </table>
             </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>