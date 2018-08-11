<?php
session_start();

$session_username = $_SESSION['username'];
$session_first_name = $_SESSION['firstname'];
$session_last_name = $_SESSION['lastname'];

if(!isset($_SESSION['adminloggedin'])){
	
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
}
include("../../connection/db.php");



$first_name = escape_data($_POST['firstname']);
$last_name = escape_data($_POST['lastname']);
$username = escape_data($_POST['username']);
$retypepassword = escape_data($_POST['retypepassword']);
$phonenumber = escape_data($_POST['phonenumber']);
$password = escape_data($_POST['password']);
$role = escape_data($_POST['role']);

if(empty($first_name)|| empty($last_name)|| empty($username) ||empty($retypepassword) ||empty($phonenumber) || empty($password) || empty($role)){
	
	echo"one of the fields is empty";
	exit();
}


if(!($password == $retypepassword)){
	echo"password not thesame";
	exit();
}

$password =  md5($password);

$query_insert_user = $con->query("INSERT INTO admin(first_name, last_name, username, phonenumber,  password, role)VALUES('$first_name', '$last_name', '$username','$phonenumber',  '$password','$role')");
	
if(!$query_insert_user){
	echo"could not register $con->error";
	exit();
}
else{
	
	$date = time();
	
	$get_positon = $con->query("SELECT * FROM userroles WHERE sn = '$role'");
	$row_position = mysqli_fetch_array($get_positon);
	
	$position = $row_position['roles'];
	
	//////////////////////////////////////////////////////the monitor
	$putmonitor = $con->query("INSERT INTO monitor(firstname, lastname, username, task, date)VALUES('$session_first_name', '$session_last_name', '$session_username','$session_first_name $session_last_name created account for $first_name $last_name as $position', '$date')");
	
	if(!$putmonitor)
	{
		echo"could not create monitor $con->error";
		exit();
	}
	
	echo"1";
	exit();
}

function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>