<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}

if(empty($_POST['title']))
{
	echo"please set the message title";
	exit();
}

if(empty($_POST['body']))
{
	echo"please type the message";
	exit();
}

$msgid = uniqid();
$username = $_SESSION['username'];
$title = escape_data($_POST['title']);
$body = escape_data($_POST['body']);
	
require_once("../../connection/db.php");

$date = time();

$sql_insert_message = "INSERT INTO support(title, body, msgid, username, answered, date)VALUES('$title', '$body', '$msgid', '$username','0', '$date')";
$query_insert_message = $con->query($sql_insert_message);

if(!$query_insert_message)
{
	echo"could not submit $con->error";
	exit();
}else{
	echo"1";
}


function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }			
?>