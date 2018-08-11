<?php
session_start();
include("../../connection/db.php");

$username = $_SESSION['username'];

$transactionpassword = $_POST["transactionpassword"];

$formertrx = $_POST["formertrx"];

$confirmtransactionpassword = $_POST["confirmtransactionpassword"];

if(empty($transactionpassword)){
	
	echo"
	 PLEASE ENTER THE TRANSACTION PASSWORD
	";
	exit();
}

if(empty($formertrx)){
	
	echo"PLEASE ENTER THE FORMER TRANSACTION";
	exit();
}

if(empty($confirmtransactionpassword)){
	
	echo"PLEASE RETYPE THE NEW TRANSACTION PASSWORD";
	exit();
}


if(empty($transactionpassword)){
	
	echo"
	 PLEASE ENTER THE TRANSACTION PASSWORD
	";
	exit();
}

if(!($transactionpassword == $confirmtransactionpassword)){
	
	echo"
	 THE NEW TRANSACTION PASSWORD AND CONFIRM TRANSACTION PASSWORD ARE NOT THESAME
	";
	exit();
}


/////////////////////////////////////////////////////////////////////////////////////check the transaction password
$sql_check_transaction_password = "SELECT * FROM users WHERE username = '$username' AND transactionpassword = '$formertrx'";

$query_transaction_password = $con->query($sql_check_transaction_password);

if(!$query_transaction_password->num_rows>0)
{
	echo"THE OLD TRANSACTION PASSWORD IS INCORRECT";
	exit();
}


	$sql_update = "UPDATE users SET transactionpassword = '$transactionpassword' WHERE username = '$username'";

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