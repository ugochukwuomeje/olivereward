<?php
session_start();

$transfer_reason = "TRANSFER FROM OLIVEREWARD FOR REGISTRATION";
$trxid = uniqid();
$date = time();
if(isset($_SESSION["loggedin"]) ) ///////////////////////////please put ! before isset
{

	echo"please login";
	exit();
	
}

$id = $_SESSION['username'];
$amount_in_usd = $_POST['amount'];
$dollar_conversion = $_SESSION['dollar_rate'];

$amount_in_naira = $amount_in_usd * $dollar_conversion;

include("../../connection/db.php");

if(empty($_POST['username'])){
	
	echo"PLEASE ENTER THE AMOUNT";
	exit();
}
$clientusername = escape_data($_POST['username']);



///////////////////////////check whether username exists
$query_check_user = $con->query("SELECT * FROM wallet WHERE id = '$clientusername'");
if(!$query_check_user->num_rows >0)
{
	echo"username does not exist";
	exit();
}

/////////////////////////////////////////////creddit client wallet

$sql_credit_wallet = "UPDATE wallet SET amount = amount + '$amount_in_naira ' WHERE id = '$clientusername'";
$query_credit_wallet = $con->query($sql_credit_wallet);

if(!$query_credit_wallet){
	echo"could not credit client $con->error";
	exit();
}

/////////////////////////////////////////////update transfer history

$sql_credit_transferhistory = "INSERT INTO transferhistory(id, amount, amounttransfered, receiver, balance, reason, trxid, date)VALUES('$id', '0', '$amount_in_naira ', '$clientusername', '0', '$transfer_reason', '$trxid', '$date')";
$query_credit_transferhistory = $con->query($sql_credit_transferhistory);

if(!$query_credit_transferhistory){
	echo"could not insert into the transfer history table $con->error";
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