<?php

//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";

$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to server");
if (mysqli_connect_error()){
die("connection failed:".mysqli_connect_error());
}

if (isset($_POST['login']))
{
$username = $_POST['username'];
  $password =$_POST['password'];
 //$password_hash=md5($password);
  
  if(!empty($username) && !empty($password)){
  $query ="SELECT * FROM users WHERE (email='$username' AND password='$password')";
  //$password_hash')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        if(mysqli_num_rows($query_run)==1){
   
   echo 'yees';
   while($row= $query_run->fetch_assoc()){
  
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$id = $row['idNumber'];
$mobile = $row['mobile'];
$email = $row['email'];
$empId = $row['empId'];
$password=$row['password'];

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
<link href="/finaldonate/css/templatemo_style.css" rel="stylesheet" type="text/css" />
<!-- templatemo 358 carousel -->
<!-- 
Carousel Template 
http://www.templatemo.com/preview/templatemo_358_carousel 
-->
<script type="text/javascript" src="/finaldonate/js/jquery-1-4-2.min.js"></script> 
<!--script type="text/javascript" src="/jqueryui/js/jquery-ui-1.7.2.custom.min.js"></script--> 
<script type="text/javascript" src="/finaldonate/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="/finaldonate/js/showhide.js"></script> 
<link rel="stylesheet" href="/finaldonate/css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="/finaldonate/js/jquery.mousewheel.js"></script> 
<script type="text/JavaScript" src="/finaldonate/js/slimbox2.js"></script> 

<link rel="stylesheet" type="text/css" href="/finaldonate/css/ddsmoothmenu.css" />

<script type="text/javascript" src="/finaldonate/js/jquery.min.js"></script>
<script type="text/javascript" src="/finaldonate/js/ddsmoothmenu.js">

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
.style8 {
	font-size: 14px;
	color: #CC0000;
}
.style9 {color: #CC0000}
.style10 {color: #000000}
-->
</style>
</head>

<body id="subpage">

<div id="templatemo_header_wrapper">
  <div id="site_title">
	<a href="/finaldonate/index.html?lang=en&amp;style=style-default"
							class="appbrand pull-left"><img src="/finaldonate/images/blood2.jpg" width="200" height="100"></a>
  </div>
      <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <!-- <li><a href="/finaldonate/index.html">Home</a></li>
            <li><a href="/finaldonate/about.html" >About</a></li>
			<li><a href="/finaldonate/services.html">Services</a></li>
            <li><a href="/finaldonate/blog.html" >Blog</a></li>
            <li><a href="/finaldonate/contact.html" >Contact Us</a></li> -->
			<li><a href="/finaldonate/menu/adminlogin.php">Log Out</a>
          </li>
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>	<!-- END of templatemo_header_wrapper -->

<div id="templatemo_main">
 
  <br/></p>
<table width="669" border="1" align="center">
  <tr>
    <th colspan="2" scope="col"><span class="style8">Personal Details</span> </th>
    <th colspan="2" bgcolor="#FFFFFF" scope="col"><span class="style9">Menu</span></th>
  </tr>
  <tr>
    <td width="121"><span class="style10">ID number </span></td>
    <td width="201"><p>
      <input name="id" maxlength="8" type="text" id="idNumber" value="<?php echo $id; ?>"/>
      </p>        </td>
    <td width="150" bgcolor="#CC3366"><input  style="width:150px" name="update" type="submit" id="update" value="Update personal Details" onclick="location.href='/donateblood/menu/adminupdate.php'"/>	</td>
    <td width="169" bgcolor="#CC3366"><input style="width:150px"  name="hospitals" type="submit" id="hospitals" value="Hospitals" onclick="location.href='/donateblood/hospitals/hospitals.php'"/></td>
  </tr>
  <tr>
    <td><span class="style10">First Name</span> </td>
    <td><p>
      <input name="firstName"  maxlength="20" type="text" id="firstName" value="<?php echo $firstName; ?>" />
      </p>        </td>
	  
    <td bgcolor="#CC3366"><input  style="width:150px" name="password" type="submit" id="password" value="Change Password" onclick="location.href='/donateblood/password/adminpassword.php'"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="types" type="submit" id="types" value="Blood Counts" onclick="location.href='/donateblood/blood/bloodtypes.php'"/></td>
  </tr>
  <tr>
    <td><span class="style10">Last Name</span> </td>
    <td><input name="lastname" maxlength="20" type="text" id="lastname" value="<?php echo $lastName; ?>" /></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="processed" type="submit" id="processed" value="Processed Blood" onclick="location.href='/donateblood/blood/processedblood.php'"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="donated" type="submit" id="donated" value="Donated Blood" onclick="location.href='/donateblood/blood/donatedblood.php'"/></td>
  </tr>
  <tr>
    <td><span class="style10">Email Address </span></td>
    <td><input name="email" maxlength="50" type="text" id="email" value="<?php echo $email; ?>"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="recipientsapp" type="submit" id="recipientsapp" value="Recipients Appointments" onclick="location.href='/donateblood/appointments/adminrecipients.php'"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="transfused" type="submit" id="transfused" value="Transfused Blood" onclick="location.href='/donateblood/blood/transfusedblood.php'"/></td>
  </tr>
  <tr>
    <td><span class="style10">Mobile</span></td>
    <td><input name="mobile" maxlength="10" type="text" id="mobile" value="<?php echo $mobile; ?>"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="donorsapp" type="submit" id="donorsapp" value="Donors Appointments" onclick="location.href='/donateblood/appointments/admindonors.php'"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="discard" type="submit" id="discard" value="Discard Blood" onclick="location.href='/donateblood/blood/discardblood.php'"/></td>
  </tr>
  <tr>
    <td><span class="style10">Emloyee ID </span></td>
    <td><input name="empID" maxlength="10" type="text" id="empID" value="<?php echo $empId; ?>"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
    <td bgcolor="#CC3366">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div align="center"></div></td>
  </tr>
</table>
<p><br/>
  <br/>
  <br/>
  <br/>
<!-- END of templatemo_main -->
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


<?php
}
         }
	 else{echo 'Wrong username/password combination'.  mysqli_error($con);} 
   }
   
   else{echo 'Failed to select details from database'.  mysqli_error($con);}
   }
  else{echo 'Please insert a username and password'.  mysqli_error($con);}
     }
	 
	 
  // get details
   if (isset($_POST['update'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $id = $_POST['idNumber'];
    $mobile =$_POST['mobile'];
    $email = $_POST['email'];
    $empId = $_POST['empId'];
    $userType=$_POST['userType'];
    $password=$_POST['password'];
    //$password_hash=md5($password);

  if(!empty($id) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($mobile) && !empty($empId) && !empty($password)){
	   if (filter_var($email, FILTER_VALIDATE_EMAIL)){
	   	   $query ="SELECT * FROM users WHERE (idNo='$idNo' AND password='$password_hash')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        if(mysqli_num_rows($query_run)==1){
	
  
 $query= "UPDATE users SET firstName='$firstName',lastName='$lastName', email='$email', mobile='$mobile', empId='$empId' WHERE id='$idNumber' AND password='$password'";
if ($query_run= mysqli_query($con,$query)){
echo 'record sucessfully updated';
}
else{echo 'record not updated. Ensure that your ID number and password are correct';}
 }
	 else{echo 'Wrong ID number/password combination'.  mysqli_error($con);} 
   }
   
   else{echo 'Failed to select details from database'.  mysqli_error($con);}
}
	    else{
	   echo "invalid email address";
	   }
	   }
  else{echo 'All fields are required'.  mysqli_error($con);}
}

  
?>
