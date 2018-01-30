<?php //Developed by www.freestudentprojects.com
include("header.php");
if(isset($_POST[submit]))
{
	  
	$email = $_POST['email'] ; 
	$subject = "Email from : ".$_POST[author];
	$message =  
	"$_POST[text]
	\n -$_POST[author]
	\n Contact No. $_POST[contactno]";
	
	mail( "freestudentprojects.com@gmail.com", "Subject: $subject",$message, "From: $email" );
	$msg = "Mail Sent Successfully..";
}
?>
    <div id="templatemo_main">
    
                <?php //Developed by www.freestudentprojects.com
		include("sidebar.php");
		?> <!-- end of templatemo_sidebar -->
        
        <div id="templatemo_content">
        
            <h1>Contact Information</h1>
            <p>Praesent laoreet posuere ante, et commodo erat interdum non. Sed a turpis odio, ac laoreet tortor. Nulla facilisi. <a href="#">Praesent eget enim</a> sed erat malesuada consectetur egestas dictum justo. Duis nec erat nulla, vel hendrerit neque. Donec blandit blandit tellus, ac feugiat erat condimentum ut. <a href="#">Mauris vehicula</a> lorem a lorem iaculis vitae facilisis mauris blandit.</p>
            
          <div class="cleaner_h50"></div>
            
            <div class="box_w270 float_l">
                <h6>Location One</h6>
                220-110 Quisque odio quam, <br />
Pulvinar sit amet convallis, 10660<br />
                Venenatis ut turpis<br />
                <br />
                <strong>Email:</strong> <a href="#">contact@yourwebsite.com</a></div> 
            
            <div class="box_w270 float_r">
                <h6>Location Two</h6>
                440-330 Quisque odio quam, <br />
              	Etiam eu ipsum a arcu, 10420<br />
            	Phasellus est quam<br />
            	<br />
                <strong>Email:</strong> <a href="#">info@yourcompany.com</a></div>    
            
            
            <div class="cleaner_h50"></div>
            
            <div id="contact_form">
            
            	<h3>Send us a message</h3>
            
            <?php //Developed by www.freestudentprojects.com
			if(isset($_POST[submit]))
			{
				echo "<h1>Mail sent successfully...</h1>";
			}
			else
			{
			?>
                <form method="post" name="contact" action="">
                
                    <input type="hidden" name="post" value="Send" />
                  <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                    <div class="cleaner_h10"></div>
                    
                    <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                    <div class="cleaner_h10"></div>
                    
                    <label for="url">Phone:</label> <input type="text" name="contactno" id="contactno" class="input_field" />
                  <div class="cleaner_h10"></div>
                    
                    <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                    <div class="cleaner_h10"></div>
                    
                    <input style="font-weight: bold;" type="submit" class="submit_btn" name="submit" id="submit" value=" Send " />
                    <input style="font-weight: bold;" type="reset" class="submit_btn" name="reset" id="reset" value=" Reset " />
                
              </form>
            <?php //Developed by www.freestudentprojects.com 
			}
			?>
            </div>
            
        </div> <!-- end of templatemo_content -->
    	
        <div class="cleaner"></div>
    </div> <!-- end of templatemo_main -->

	<div class="cleaner"></div>
</div> <!-- end of wrapper -->
<?php //Developed by www.freestudentprojects.com
include("footer.php");
?>