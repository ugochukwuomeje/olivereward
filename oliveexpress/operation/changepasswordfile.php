<?php

include("../connection/db.php");
////////////////////////////////////////////////////////////////////////////

$username = $_POST['username'];

$id = $_POST['id'];

$password = $_POST['password'];
$retypepassword = $_POST['retypepassword'];

if(!($password == $retypepassword))
{
	echo"PASSWORD NOT SAME";
	exit();
}

$encoded_password = md5($password);


////////////////////check whether id is valid

$checkid = $con->query("SELECT * FROM getpassword WHERE id = '$id' AND username = '$username'");

if(!$checkid->num_rows >0){
	echo"invalid id";
	exit();
}

$query_deleteid = $con->query("DELETE  FROM getpassword WHERE id = '$id' AND username = '$username'");

if(!$query_deleteid){
	echo"could not delete id";
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