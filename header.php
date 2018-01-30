<?php //Developed by www.freestudentprojects.com
session_start();
date_default_timezone_set("Asia/Kolkata"); 
$pagename = basename($_SERVER['PHP_SELF']); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HRMS Managment System</title>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_wrapper">
	<span class="fruit"></span>
    
    <div id="templatemo_header">
    
        <div id="site_title">
        
            <h1><a href="http://www.freestudentprojects.com">
                
                <span>HRMS Management System</span>
            </a></h1>
        </div>

        <div id="templatemo_menu">
            <ul>
                <li><a href="index.php" 
                <?php //Developed by www.freestudentprojects.com
				if($pagename== "index.php")
				{
                echo "class='current first'";
				}
				?>			
                >Home</a></li>
                <li ><a href="projects.php"
                <?php //Developed by www.freestudentprojects.com
				if($pagename== "projects.php")
				{
                echo "class='current first'";
				}
				?>>Projects</a></li>
                <li><a href="career.php"  
                <?php //Developed by www.freestudentprojects.com
				if($pagename== "career.php")
				{
                echo "class='current first'";
				}
				?>>Career</a></li>
                <li><a href="interviews.php"  
                <?php //Developed by www.freestudentprojects.com
				if($pagename== "interviews.php")
				{
                echo "class='current first'";
				}
				?>>Interview</a></li>
                <li><a href="contact.php"  
                <?php //Developed by www.freestudentprojects.com
				if($pagename== "contact.php")
				{
                echo "class='current first'";
				}
				?>>Contact</a></li>
            </ul> 
        </div> <!-- end of templatemo_menu -->
    
    	<div class="cleaner"></div>
    </div> <!-- end of templatmeo_header -->