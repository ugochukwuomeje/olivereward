<?php
session_start();

include("../../connection/db.php");

$username = escape_data($_POST['username']);
$msgid = escape_data($_POST['msgid']);
$reply = escape_data($_POST['reply']);
$messagetitle = escape_data($_POST['reply']);

if(empty($reply)){
	
	echo"please write a reply";
	exit();
}

$querymessage = $con->query("INSERT INTO replysupport(msgid, username, title, replymessage, viewed)VALUES('$msgid', '$username', '$messagetitle', '$reply','0')");

if(!$querymessage){
	echo"COULD NOT SUBMIT REPLY $con->error";
	exit();
}

$con->query("UPDATE support SET answered = '1' WHERE msgid = '$msgid' AND username= '$username'");

echo"1";
exit();

function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>