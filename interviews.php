<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
                <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Interviews</h1>
            
            <p>Interviewing stems from the desire to know more about the people around us and to better understand how the people around us view the world we live in: "At the heart of interviewing research is an interest in other individuals" stories because they are of worth.  </p>  
            
            <div class="cleaner_h40"></div>
            
            			<?php //Developed by www.freestudentprojects.com
            	$sql = "SELECT interview.*,vacancies.* FROM interview INNER JOIN vacancies ON vacancies.vacid=interview.vacid where interview.status='Enabled' ";
				$recs = mysqli_query($obj,$sql);
				while($arrrec = mysqli_fetch_array($recs))
				{
				?>
       	  <div class="news_box">          
            		<div class="fulllength">
                           <h2><?php //Developed by www.freestudentprojects.com echo $arrrec[title]; ?></h2>
            	  <p><?php //Developed by www.freestudentprojects.com echo "Designation: ".$arrrec[vacancy]; ?></p>
                    <p><strong>Interview date: </strong>
						<br> <strong>From: </strong><?php //Developed by www.freestudentprojects.com echo $arrrec[interviewfdate]; ?>
                        <br> <strong>To: </strong><?php //Developed by www.freestudentprojects.com echo $arrrec[interviewtdate]; ?>
                        </p>
                        <h5> <?php //Developed by www.freestudentprojects.com echo $arrrec[selectionround]; ?> </h5>
                        <p><strong>Address: <br><?php //Developed by www.freestudentprojects.com echo $arrrec[venue]; ?></strong></p>
                        <p><strong>Contact No.: <br><?php //Developed by www.freestudentprojects.com echo $arrrec[contactno]; ?></strong></p> 
                        <hr />
               		</div>
                	<div class="cleaner"></div>
        		</div>
              
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