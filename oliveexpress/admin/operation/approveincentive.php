<?php
session_start();

include("../../connection/db.php");

$username = escape_data($_POST['username']);
$table = escape_data($_POST['table']);

$query_update_stagerward = $con->query("UPDATE $table SET paid = '1' WHERE username = '$username'");

if(!$query_update_stagerward){
	
	echo"COULD NOT UPDATE YOUR USER $table RECORD $con->query";
	exit();
}

echo"1";
exit();

function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>