<?php
session_start();

include("../connection/db.php");

$username = $_POST['username'];
$transaction_password = $_POST['trxpassword'];

/////////////////////////////////////////select from the database
$query_user = $con->query("SELECT * FROM users WHERE username = '$username' AND transactionpassword = '$transaction_password'");

if(!$query_user->num_rows>0){
	
	
	echo"1";
	exit();
	
}else{
	
	echo"2";
	exit();
}

?>









