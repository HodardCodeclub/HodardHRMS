<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
                <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Job Openings</h1>
            
            <p>If You Do things <strong> RIGHT </strong>at the <strong>FIRST TIME</strong>,
then Cuckoobee is the <strong>PLACE</strong> for you...</p>  
<p>Cuckoobee doesn't just hire graduated <strong>BOOK WORMS </strong>or Highly Scored <strong>LAZY LAMBS</strong>. We Love to hire the best graduates. At Cuckoobee, we always believe that Our First Step towards Success starts by Hiring the Right Candidate. Our fine reputation is built on the fact that we keep our promises, respect client values and expect all consultants to do the same. 
            
            <div class="cleaner_h40"></div>
            
            	<?php //Developed by www.freestudentprojects.com
				$dt= date("Y-m-d");
				$sql = "SELECT * FROM vacancies WHERE status='Enabled' and ldate >  '$dt' LIMIT 0 , 30";
				$recs = mysqli_query($obj,$sql);
				while($arrrec = mysqli_fetch_array($recs))
				{
				?>
       	  <div class="news_box">          
            		<div class="fulllength">
                           <h2><?php //Developed by www.freestudentprojects.com echo $arrrec[title] ;?></h2>
            	  <p><?php //Developed by www.freestudentprojects.com echo $arrrec[description]; ?></p>
                    <p>	<ul>
                        <li>Qualification : <?php //Developed by www.freestudentprojects.com echo $arrrec[qualification] ;?></li>
                        <li>Experience: <?php //Developed by www.freestudentprojects.com echo $arrrec[exprience] ;?> </li>
                        <li>Age range: <?php //Developed by www.freestudentprojects.com echo $arrrec[age]; ?> </li>
                          <li>Salary range: <?php //Developed by www.freestudentprojects.com echo $arrrec[salary]; ?> </li>
                     	</ul>
                        <h5>Last date: <?php //Developed by www.freestudentprojects.com echo $arrrec[ldate]; ?> </h5>
                      </p>
                   		 <div class="button">
                         <?php //Developed by www.freestudentprojects.com if(isset($_SESSION[hrid]) || isset($_SESSION[adminid]))
                         {?>
                          <a href='scheduleinterview.php?scid=<?php //Developed by www.freestudentprojects.com echo $arrrec[vacid] ;?>'>Schedule interview </a>
                          <?php //Developed by www.freestudentprojects.com 
						 }
                         else
                         {?>
                         <a href='applicant.php?jobid=<?php //Developed by www.freestudentprojects.com echo $arrrec[vacid] ;?>'>Apply Now</a>
                         <?php //Developed by www.freestudentprojects.com }
 ?>                          <hr />
                         </div>
                    
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