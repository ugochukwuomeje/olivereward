<?php
session_start();

include("../connection/db.php");

$username = $_POST['username'];

/////////////////////////////////////////select from the database
$query_user = $con->query("SELECT * FROM users WHERE username = '$username'");

if($query_user->num_rows>0){
	
	
	echo"2";
	exit();
	
}else{
	
	echo"1";
	exit();
}

?>









