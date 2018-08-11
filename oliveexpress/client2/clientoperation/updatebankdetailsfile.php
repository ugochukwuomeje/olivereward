<?php
session_start();
include("../../connection/db.php");

$username = $_SESSION['username'];

$bank = $_POST["bank"];
$accname = $_POST["accname"];
$accnumber = $_POST["accnumber"];



	
	$sql_update = "UPDATE bankdetails SET bank = '$bank', acc_name = '$accname', acc_number='$accnumber' WHERE id = '$username'";

	$query_update = $con->query($sql_update);
	
	if($query_update)
	{
		echo"1";
		exit();
	}else{
		
		echo"not updated $con->error";
		exit();
	}
	

?>