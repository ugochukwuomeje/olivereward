<?php
session_start();

include("../../connection/db.php");

$usertrxid = escape_data($_POST['trxid']);
$username = escape_data($_POST['username']);

$query_update_withdrawal = $con->query("UPDATE account SET pay_status = '1' WHERE id = '$username' AND trxid = '$usertrxid'");

if(!$query_update_withdrawal){
	
	echo"COULD NOT UPDATE YOUR USER WITHDRAWAL RECORD $con->query";
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