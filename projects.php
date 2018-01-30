<?php //Developed by www.freestudentprojects.com
include("header.php");
?>
    <div id="templatemo_main">
    
                <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
          <h1>High Quality Products</h1>
            <p>Morbi sed nulla ac est cursus suscipit eu ac lectus. Curabitur  ullamcorper nibh nisi, sed eleifend dolor. Pellentesque adipiscing  sollicitudin sapien nec aliquet. Cras rutrum ullamcorper metus, vitae  consectetur dolor vulputate a. Sed nec eros egestas nisl tincidunt  aliquet at in est.</p>  
            
            <div class="cleaner_h40"></div>
            
             <?php //Developed by www.freestudentprojects.com
				$sql="SELECT * FROM projects WHERE status='Enabled' ";
				$recs=mysqli_query($obj,$sql);
				while($arrec=mysqli_fetch_array($recs))
				{
					?>
            <div class="product_box">            
                <img src="uploads/<?php //Developed by www.freestudentprojects.com echo $arrec[image]; ?>" alt="1" />
              <h6><?php //Developed by www.freestudentprojects.com echo $arrec[projecttitle]; ?></h6>
                <p><?php //Developed by www.freestudentprojects.com echo $arrec[description]; ?></p>
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