<?php
session_start();

include("../connection/db.php");

///////////////////////////get the entery amount

$query_getregistraion = $con->query("SELECT * FROM referalbonus");

$row_referal_bonus = mysqli_fetch_array($query_getregistraion);
$registration_amount = $row_referal_bonus['registration_amount'];


$payeeusername = $_POST['payeeusername'];

/////////////////////////////////////////select from the database
$query_user = $con->query("SELECT * FROM users WHERE referalid = '$payeeusername'");

if(!$query_user->num_rows>0){

	echo"1";
	exit();
	
}else{
	
	////////////////////////////////////////////////////////////////////////////search whether payee has more than 25000
	$query_payee_balance = $con->query("SELECT * FROM wallet WHERE id = '$payeeusername'");
	$row_payee_balance = mysqli_fetch_array($query_payee_balance);
	
	$payee_balance = $row_payee_balance['amount'];
	
	if($payee_balance < $registration_amount  )
	{
		echo"2";
		exit();
	}
	
	
	
	$row_users = mysqli_fetch_array($query_user);
	$first_name = $row_users['first_name'];
	$last_name = $row_users['last_name'];
	
	$name = $first_name." ".$last_name."__"."1";
	echo"$name";
	exit();
	
}

echo"$converted";
exit();
?>









