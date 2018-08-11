<?php
session_start();
include("../connection/db.php");
////////////////////////////////////////////////////////////////////////////

$username = $_SESSION['username'];

$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$retypepassword = $_POST['retypepassword'];

if(empty($oldpassword)|| empty($newpassword)|| empty($retypepassword)) {
	
	echo"SOME OF THE FIELD IS EMPTY";
	exit();
}

if(!($newpassword == $retypepassword))
{
	echo"PASSWORD NOT SAME";
	exit();
}

$encoded_password = md5($newpassword);
$encoded_oldpassword = md5($oldpassword);

/////////////////////////////////////////////check the old passowrd
$query_oldpassword = $con->query("SELECT * FROM users WHERE password = '$encoded_oldpassword'");
if(!$query_oldpassword->num_rows >0){
	
	echo"PLEASE THE OLD PASSWORD IS INCORRECT";	
	exit();
}


$query_change_password = $con->query("UPDATE users SET password = '$encoded_password' WHERE username = '$username'");

if(!$query_change_password){
	
	echo"could not change password";
	exit();
}

echo"1";
exit();

?>