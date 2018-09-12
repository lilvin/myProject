<?php
session_start();
$error ="";
include_once 'init.php';
include ("functions.php");

if (logged_in()) {
  header("location:userlogincon.php");
  exit();
}

if(isset($_POST['login'])){
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $password=mysqli_real_escape_string($con,$_POST['password']);


   if(email_exists($con,$email)){
     
     $result=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
     $retPassword=mysqli_fetch_assoc($result);

           if($password !== $retPassword['password']){
              $error="password is not correct";
           }
           else{
              
              $_SESSION['email'] = $email;  //session set for the email
              if ($retPassword['userType'] == 'user') {
                header("location:userlogincon.php");
              }else{
                 header("location:adminlogincon.php");
              }
             
            }

    }else{

     $error="Email does not exist";
   }

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate Blood- Login Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

<style>
	html{overflow-x:hidden;}
	</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="/donateblood/css/templatemo_style.css" rel="stylesheet" type="text/css" />

<!-- templatemo 358 carousel -->
<!-- 
Carousel Template 
http://www.templatemo.com/preview/templatemo_358_carousel 
-->
<script type="text/javascript" src="/donateblood/js/jquery-1-4-2.min.js"></script> 
<!--script type="text/javascript" src="/jqueryui/js/jquery-ui-1.7.2.custom.min.js"></script--> 
<script type="text/javascript" src="/donateblood/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="/donateblood/js/showhide.js"></script> 

<link rel="stylesheet" href="/donateblood/css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="/donateblood/js/jquery.mousewheel.js"></script> 
<script type="text/JavaScript" src="/donateblood/js/slimbox2.js"></script> 

<link rel="stylesheet" type="text/css" href="/donateblood/css/ddsmoothmenu.css" />

<script type="text/javascript" src="/donateblood/js/jquery.min.js"></script>
<script type="text/javascript" src="/donateblood/js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script> 

<style type="text/css">
<!--
.style3 {color: #000000}
-->
#error{
 display: none;
}
</style>
</head>

<body id="subpage">

<div id="templatemo_header_wrapper">
  <div id="site_title">
	<a href="/donateblood/index.html?lang=en&amp;style=style-default"
							class="appbrand pull-left"><img src="/donateblood/images/blood2.jpg" width="200" height="100"></a>
  </div>
      <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="/finaldonate/index.html">Home</a></li>
            <li><a href="/finaldonate/about.html" >About</a></li>
			<li><a href="/finaldonate/services.html">Services</a></li>
            <li><a href="/finaldonate/blog.html" >Blog</a></li>
            <li><a href="/finaldonate/contact.html" >Contact Us</a></li>
			<li><a href="/finaldonate/menu/donorslogin.php" class="selected">Login</a></li>

        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>	<!-- END of templatemo_header_wrapper -->
<div class="alert alert-success" id="error" style="<?php if ($error != "") {?> display: block; <?php } ;?>">
   <?php echo $error ;?>
</div>
<div id="templatemo_main">
  <form id="form1" name="form1" method="post" action="login.php">
    <label></label>
    <p>
      <label></label>
    </p>
    <table width="332" border="1" align="center">
      <tr>
        <th colspan="2" scope="col">Login to proceed. <a style="color:green" href="userReg.php" >Register</a> if you do not have an account.</th>
      </tr>
      <tr>
        <td width="58"><span class="style3">Username</span></td>
        <td width="258"><p><span class="style3">Your email address</span>
          </p>
          <p>
            <input name="email" type="text" id="email" />
        </p></td>
      </tr>
      <tr>
        <td><span class="style3">Password</span></td>
        <td><p>Your password </p>
          <p>
            <input name="password" type="password" id="password" />
          </p></td>
      </tr>
      <tr>
        <td colspan="2"> <div align="center" style="background-color: #CC3366">
          <input  type="submit" name="login" value="Login" />
        </div></td>
      </tr>
    </table>
  </form>
 
    <table width="330" border="1" align="center" style="margin-top:5px">
      <tr>
        <td><div align="center" style="background-color: #CC3366">
          <input name="forgot" type="submit" id="forgot" value="Forgot Password" onClick="location.href='/finaldonate/password/userforgot.php'"/>
        </div></td>
        <td><div align="center"style="background-color: #CC3366">
          <input name="" type="submit" id="create" value="Create an account" onClick="location.href='/finaldonate/menu/userReg.php'"/>
        </div></td>
      </tr>
    </table>
  <p></p> 
</div> <!-- END of templatemo_main -->
<div id="templatemo_bottom_wrapper">
    <div id="templatemo_bottom">
    	<div class="col one_third">
        	<h4><span></span>Our Services</h4>
            <div class="bottom_box">
                <ul class="footer_list">
                    <li><a href="/donateblood/services.html">Appointments booking</a></li>
                    <li><a href="/donateblood/services.html">Blood donation services</a></li>
                    <li><a href="/donateblood/services.html">Blood transfusion services</a></li>
                    <li><a href="/donateblood/services.html">Health guidance</a></li>
                    
                </ul>  
			</div>
        </div>
        <div class="col one_third">
        	<h4><span></span>Contact us</h4>
            <div class="bottom_box">
			 <p><em> Contact us using the social links. Find contact detailsfor specific hospitals in our <a href="/donateblood/contact.html">Contact Us</a> page. </em></p><br />
                <div class="footer_social_button">
                    <a href="#"><img src="/donateblood/images/facebook.png" title="facebook" alt="facebook" /></a>
                    <a href="#"><img src="/donateblood/images/flickr.png" title="flickr" alt="flickr" /></a>
                    <a href="#"><img src="/donateblood/images/twitter.png" title="twitter" alt="twitter" /></a>
                    
                </div>
			</div>
        </div>
        <div class="col one_third no_margin_right">
        	<h4><span></span>About Us</h4>
            <div class="bottom_box">
                <p><em> Donate Blood is a combined effort of various blood banks to provide a means that 
                helps in conducting blood donation drives, facilitate registration of blood 
                donors and recipients among other blood donation activities.</em></p><br />              
               
            </div>
        </div>
        
    	<div class="cleaner"></div>
    </div> <!-- END of tempatemo_bottom -->
</div> <!-- END of tempatemo_bottom_wrapper -->

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
    	Copyright © Donate Blood
    </div> <!-- END of templatemo_footer_wrapper -->
</div> <!-- END of templatemo_footer -->

</body>
</html>

