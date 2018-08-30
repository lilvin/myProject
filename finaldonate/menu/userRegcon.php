<?php
//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";


$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to MySQL:".mysql_error());
if ($con->connect_error){
die("connection failed:".$con->connect_error);
}


//inserting record 
 
  $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $idNumber = $_POST['idNumber'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
	$empId=$_POST['empId'];
	$userType="user";
	  $password = $_POST['password'];
	  // $password_hash=md5($password);
	  
	  if(!empty($idNumber) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($mobile) && !empty($password)){
	  if (filter_var($email, FILTER_VALIDATE_EMAIL)){	   
	   
	   $sql = "INSERT INTO users(firstName,lastName,idNumber,mobile,email,empId,userType,password) VALUES ('$firstName','$lastName','$idNumber','$mobile','$email','$empId',$userType'$password')";
	   
	   if($con->query($sql)===TRUE)
	   {
	   echo"registration successfull";
	   }
	   else{
	   echo "registration failed. You might have entered an existing email address or ID number.";
	   }
	   }
	    else{
	   echo "invalid email address";
	   }
	    }
  else{echo 'All fields are required'.  mysqli_error($con);}
     
	   $con->close();
	   
?>
