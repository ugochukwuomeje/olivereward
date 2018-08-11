<?php
session_start();

if( !isset($_SESSION["email"]) || !isset($_SESSION["id"]))
{
	
	echo"200";
	exit();
}
include("../../connection/db.php");

$id = $_SESSION['id'];
$dollar_rate = $_SESSION['dollar_rate'];



if(empty($_POST["amount"])){
	echo"AMOUNT MUST NOT BE EMPTY";
			exit();
}
if(empty($_POST["receiver_username"])){
	echo"RECEIVER MUST NOT BE EMPTY";
			exit();
}

if(empty($_POST["transaction_passowrd"])){  
	echo"TRANSACTION PASSWORD MUST NOT BE EMPTY";
			exit();
}

$amount_to_transfer = $dollar_rate * escape_data($_POST["amount"]);

$username = escape_data($_POST['receiver_username']);
$totalbalance = escape_data($_POST['totalbalance']);
$transaction_passowrd = escape_data($_POST['transaction_passowrd']);

if($amount_to_transfer > $totalbalance){
	echo"TRANSFER AMOUNT MUST BE LESS THAN THE BALANCE";
			exit();
}


/////////////////////////////////////////check whether transaction passowrd exist
$sql_verify_transaction_password = "SELECT * FROM users WHERE username = '$id' AND transactionpassword='$transaction_passowrd'";
$query_verify_transaction_password = $con->query($sql_verify_transaction_password);

if(!$query_verify_transaction_password > 0)
{
	echo"INVALID TRANSACTION PASSWORD ";
	exit();
}



/////////////////////////////////////////check whether username exit
$sql_verify_username = "SELECT * FROM users WHERE username = '$username'";
$query_verify_username = $con->query($sql_verify_username);

if(!$query_verify_username->num_rows > 0)
{
	echo"THE USERNAME IS INVALID";
	exit();
}

$current_time = time();


$query_receiver_wallet = $con->query("SELECT * FROM wallet WHERE id = '$username'");
$row_receiver_wallet = mysqli_fetch_array($query_receiver_wallet);
$wallet_balance = $row_receiver_wallet['amount'];

////////////////////////////////////////////////////update the recivers wallet
$new_amount = $wallet_balance + $amount_to_transfer;

$query_update_wallet = $con->query("UPDATE wallet SET amount = '$new_amount' WHERE id = '$username'");

if(!$query_update_wallet)
{
	echo"THE ERROR IN UPDATING THE WALLET IS: $con->error";
	exit();
}

////////////////////////////////////////////////////update the senders wallet
$new_sender_amount = $totalbalance - $amount_to_transfer;

$query_update_wallet_sender = $con->query("UPDATE wallet SET amount = '$new_sender_amount' WHERE id = '$id'");

if(!$query_update_wallet_sender)
{
	echo"THE ERROR IN UPDATING THE senders WALLET IS: $con->error";
	exit();
}

////////////////////////////////////////////////////insert into transfer history
$time_of_transfer = time();
$trx = uniqid();
$query_transferhistory = $con->query("INSERT INTO transferhistory (id, amount, amounttransfered, receiver, balance, reason, trxid, date)VALUES('$id','$totalbalance', '$amount_to_transfer','$username','$new_sender_amount', 'transfered $amount_to_transfer to $username', '$trx', '$time_of_transfer' )");

if(!$query_transferhistory)
{
	echo"THE ERROR IN CREATING A NEW TRANSFER HISTORY RECORD IS: $con->error";
	exit();
}


	echo"1";

///////////////////////////////////////////////////////////////////sen email


function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>
