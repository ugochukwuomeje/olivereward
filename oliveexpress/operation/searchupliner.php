<?php
session_start();

include("../connection/db.php");

$upliner = $_POST['upliner'];

/////////////////////////////////////////select from the database
$query_user = $con->query("SELECT * FROM users WHERE referalid = '$upliner'");



if(!$query_user->num_rows>0){

	echo"1";
	exit();
	
}else{
	
	$row_users = mysqli_fetch_array($query_user);
	
	$number_downliner = $row_users['completed'];
	
	if($number_downliner == 2){
		echo"2";
		exit();
	}
	
	
	
	$first_name = $row_users['first_name'];
	$last_name = $row_users['last_name'];
	
	$name = $first_name." ".$last_name;
	echo"$name";
	exit();
	
}

echo"$converted";
exit();
?>









