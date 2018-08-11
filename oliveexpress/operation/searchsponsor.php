<?php
session_start();

include("../connection/db.php");

$sponsor = $_POST['sponsor'];

/////////////////////////////////////////select from the database
$query_user = $con->query("SELECT * FROM users WHERE referalid = '$sponsor'");

if(!$query_user->num_rows>0){
	
	
	echo"1";
	exit();
	
}else{
	
	$row_users = mysqli_fetch_array($query_user);
	$first_name = $row_users['first_name'];
	$last_name = $row_users['last_name'];
	
	$name = $first_name." ".$last_name;
	echo"$name";
	exit();
	
}

echo"$converted";
exit();
?>









