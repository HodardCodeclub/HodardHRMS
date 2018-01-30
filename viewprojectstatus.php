<?php //Developed by www.freestudentprojects.com
session_start();
include("header.php");
?>
<div id="templatemo_main">
 <?php //Developed by www.freestudentprojects.com
include("sidebar.php");
?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
          <h1>View Project status</h1>
<?php //Developed by www.freestudentprojects.com

$sqlsel="SELECT * FROM projects where projectid='$_GET[projectid]'";	
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
                 <th scope="row">Emd date</th>
                 <td>&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[enddate]; ?></td>
               </tr>
               <tr>
                 <th scope="row">Status</th>
                 <td>&nbsp;<?php //Developed by www.freestudentprojects.com echo $rs1[status]; ?></td>
               </tr>
          </table>
         <br> 
         

 <p>
            <table width="707" border=2>
            <tr>
            <th width="48">SL No.</th>
            <th width="68">Employee</th>
            <th width="153">Project details</th>
            <th width="87">Date</th>
            <th width="88">Comment</th>
            <th width="138">Project Status</th></tr>
            <?php //Developed by www.freestudentprojects.com
			$sqlsel1="SELECT projects.*,projectstatus.*,employees.* FROM projects INNER JOIN projectstatus INNER JOIN  employees ON  projectstatus.projectid =projects.projectid AND employees.empid=projectstatus.empid where projectstatus.projectid='$_GET[projectid]'";	
			$res1=mysqli_query($obj,$sqlsel1);
			$i=1;
				while($arrrec = mysqli_fetch_array($res1))
				{
			?>
            
			 <tr>
            
             <td> <?php //Developed by www.freestudentprojects.com echo $i; ?>
             </td>
             <td>
            <?php //Developed by www.freestudentprojects.com echo $arrrec[fname]. " ". $arrrec[lname];?>
             
             </td>
            <td>
            Project module:<br><?php //Developed by www.freestudentprojects.com echo $arrrec[projectmodule];?><br />
            Project Element:<br>
            <?php //Developed by www.freestudentprojects.com echo $arrrec[projectelement];?></td>
            <td>Start date:<br><?php //Developed by www.freestudentprojects.com echo $arrrec[startdate];?><br><br />
           End date:<br /> <?php //Developed by www.freestudentprojects.com echo $arrrec[enddate];?></td>
            <td><?php //Developed by www.freestudentprojects.com echo $arrrec[comment];?>
            </td>
            <td><?php //Developed by www.freestudentprojects.com echo $arrrec[18];?>
            </td></tr>
        
            <?php //Developed by www.freestudentprojects.com
			$i++;
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