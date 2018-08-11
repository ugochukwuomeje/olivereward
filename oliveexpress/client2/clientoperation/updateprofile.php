<?php
session_start();
include("../../connection/db.php");

$username = $_SESSION['username'];

$f_name = $_POST["firstname"];
$l_name = $_POST["lastname"];
$email = $_POST["email"];
$country = $_POST["changedcountry"];
$state = $_POST["changestate"];
$city = $_POST["city"];
$mobile = $_POST["mobile"];
$gender = $_POST['gender'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];



$emailvalidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$numbervalidation = "/^[0-9]+$/";

if(empty($f_name) ||empty($l_name) ||empty($email) ||empty($country) ||
empty($state) ||empty($city)||empty($mobile)||empty($gender)||empty($address1)||empty($address2)){
	
	echo"
	 One of the reqiured field is empty
	";
	exit();
}
if(!preg_match($emailvalidation,$email)){
	echo"
			 This email $email address is not valid
			";
	exit();
}

if(!preg_match($numbervalidation,$mobile)){
	echo"
			 Mobile number $mobile  is not valid
			
			";
	exit();
}
if((strlen($mobile) < 10 )){
	echo"
			 mobile number is not correct
			
			";
	exit();
}


	
	$sql_update = "UPDATE users SET first_name = '$f_name', last_name = '$l_name', email='$email', country = '$country', state = '$state', gender = '$gender', city = '$city', mobile = '$mobile', address1 = 'address1' , address2 = 'address2' WHERE username = '$username'";

	$query_update = $con->query($sql_update);
	
	if($query_update)
	{
		echo"1";
		exit();
	}else{
		
		echo"not updated $con->error";
		exit();
	}
	

?>