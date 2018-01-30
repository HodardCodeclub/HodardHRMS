<?php //Developed by www.freestudentprojects.com
include("connection.php");
$cuname=mysqli_query($obj,"select username from employees where username='$_GET[q]' AND status='Enabled'");
if(mysqli_num_rows($cuname) == 1)
{
?>
        <input type=text name=uname value="<?php //Developed by www.freestudentprojects.com echo $rs[username];?>" onchange="checkusername(this.value)" size=25 > 
        <img src="images/alert.jpg" height="10" width="10" /> Already exists
<?php //Developed by www.freestudentprojects.com

}
else
{
?>
<input type=text name=uname value="<?php //Developed by www.freestudentprojects.com echo $_GET[q];?>" onchange="checkusername(this.value)" size=25 > <img src="images/right.jpg" height="10" width="10" /> Username Available
<?php //Developed by www.freestudentprojects.com
}
?>