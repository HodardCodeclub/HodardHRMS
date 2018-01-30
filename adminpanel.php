<?php //Developed by www.freestudentprojects.com
session_start();
if(!isset($_SESSION[adminid]))
{
	header("Location: index.php");
}
?>
<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
        <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Latest News</h1>
            
            <p>
                <table width="636" height="463" border="1">
                  <tr>
                    <td width="152" height="198"><p><a href='employee.php?editemp=<?php //Developed by www.freestudentprojects.com echo $_SESSION[adminid]; ?>'><img src="images/profile.jpg" width="150" height="152" /></a></p>
                      <p><strong><a href='employee.php?editemp=<?php //Developed by www.freestudentprojects.com echo $_SESSION[adminid]; ?>'>Edit Profile</a></strong><br />
                    </p></td>
                    <td width="152"><p><a href="changepassword.php?chngpass=<?php //Developed by www.freestudentprojects.com echo $_SESSION[adminid]; ?>"><img src="images/password.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="changepassword.php">Change Password</a></strong></p></td>
                    <td width="152"><p><a href="resetpassword.php"><img src="images/reset.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="resetpassword.php">Reset Password</a></strong></p></td>
                    <td width="152"><p><a href="employee.php"><img src="images/employee.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="employee.php">Add Employee</a></strong></p></td>
                  </tr>
                  <tr>
                    <td width="152"><p><a href="viewemployee.php"><img src="images/vemployee.png" width="150" height="152" /></a></p>
                    <p><strong><a href="viewemployee.php">View Employee</a></strong></p></td>
                    <td><p><a href="designation.php"><img src="images/desig.png" width="150" height="152" /></a></p>
                    <p><strong><a href="designation.php">Designation</a></strong></p></td>
                    <td><p><a href="addproject.php"><img src="images/project.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="addproject.php">Add Project</a></strong></p></td>
                    <td><p><a href="viewproject.php"><img src="images/projstat.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="viewproject.php">View Project</a></strong></p></td>
                  </tr>
                  <tr>
                    <td><p><a href="vacancies.php"><img src="images/vacancies.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="vacancies.php">Add Vacancies</a></strong></p></td>
                    <td><p><a href="career.php"><img src="images/View.png" width="150" height="152" /></a></p>
                    <p><strong><a href="career.php">View Vacancies</a></strong></p></td>
                    <td><p><a href="viewapplicant.php"><img src="images/applicant.png" width="150" height="152" /></a></p>
                    <p><strong><a href="viewapplicant.php">View Applicant</a></strong></p></td>
                    <td><p><a href="holiday.php"><img src="images/hol.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="holiday.php">Add holiday</a></strong></p></td>
                  </tr>
                  <tr>
                    <td><p><a href="viewattendance.php"><img src="images/Attendance.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="viewattendance.php">View Attendance</a></strong></p></td>
                    <td><p><a href="leaveappli.php"><img src="images/.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="leaveappli.php">Leave Applications</a></strong></p></td>
                    <td><p><a href="payroll.php"><img src="images/salary.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="payroll.php">Generate Payroll</a></strong></p></td>
                    <td><p><a href="paymentreport.php"><img src="images/payroll.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="paymentreport.php">View Payroll</a></strong></p></td>
                  </tr>
                  <tr>
                 	<td><p><a href='viewinterview.php'><img src="images/interview.jpg" width="150" height="152" /></a></p>
               		<p><strong><a href='viewinterview.php'>View Interview Schedule</a></strong></p></td>
                    <td><p><a href="logout.php"><img src="images/logout.jpg" width="150" height="152" /></a></p>
                    <p><strong><a href="logout.php">Logout</a></strong></p></td>
                  </tr>
                </table>
                <h2>&nbsp;</h2>
            </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>