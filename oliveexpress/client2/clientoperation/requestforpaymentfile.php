<?php
ini_set('max_execution_time', 120);
session_start();

if( !isset($_SESSION["email"]) || !isset($_SESSION["id"]))
{
	
	echo"200";
	exit();
}
$id = $_SESSION["id"];
include("../../connection/db.php");

if(empty($_POST["request"])){
	echo"AMOUNT MUST NOT BE EMPTY";
			exit();
}elseif(empty($_POST["trxpassword"])){
	echo"PLEASE ENTER YOUR TRANSACTION PASSWORD";
			exit();
}

$time_today = time();
///////////////////////////////////////////////////////////////////////////////check whether withdrawal has been placed today
$query_check_withdrawal = $con->query("SELECT * FROM account WHERE id = '$id' ORDER BY sn DESC LIMIT 1");

if($query_check_withdrawal->num_rows >0){
	
	$row_check_withdrawal = mysqli_fetch_array($query_check_withdrawal);
	$lastwithdrawal_date = $row_check_withdrawal['date'];
	
	$date_difference = $time_today - $lastwithdrawal_date;
	
	if($date_difference <86400){
		
		//echo"You cannot place more than two withdrawals within 24hrs";
		//exit();
	}
	
}

$array_phone_numbers[0] = 0;
$phone_number_counter = 0;
///////////////////////////get the phone numbers
$phone_numbers  = $con->query("SELECT * FROM admin");
while($row_numbers =  mysqli_fetch_array($phone_numbers)){
	
$array_phone_numbers[$phone_number_counter] = $row_numbers["phonenumber"];
	
$phone_number_counter++;
	
}




////////////////////////////////////////////////////////////////getting the withdrawal charge
$query_withdrawal = $con->query("SELECT * FROM withdrawalcharge");
$row_withdrawalcharge = mysqli_fetch_array($query_withdrawal);

$withdrawal_charge = $row_withdrawalcharge['charge'];

////////////////////////////////////////////////////check whether transaction_passwword is correct
$transaction_passwword = escape_data($_POST['trxpassword']);

$transaction_passwword = $transaction_passwword;

$query_transaction_password = $con->query("SELECT * FROM users WHERE username = '$id' AND transactionpassword = '$transaction_passwword'");

if(!$query_transaction_password){
	echo"THE ERROR IN GETTING YOUR TRANSACTION PASSWORD IS $con->error";
	exit();
}

if(!$query_transaction_password->num_rows > 0)
{
	echo"THE TRANSACTION PASSWORD DOES NOT EXIST $id $transaction_passwword";
	exit();
}



$initialrequest = escape_data($_POST["request"]);

if($initialrequest == '0')
{
	echo"request cannot be zero";
	exit();
}

$totalbalance = escape_data($_POST['totalbalance']);

$request = $initialrequest + $withdrawal_charge;

if($request > $totalbalance){
	echo"WITHDRAWAL AMOUNT MUST BE LESS THAN THE BALANCE";
			exit();
}

else{
	$date = time();
	$balance = $totalbalance - $request;
	
	$trxid = uniqid();
	
	$sql = "INSERT INTO account (id, amount_before_withdrawal, amount_withdrawn, date, balance, trxid, reason, type, pay_status )
			values('$id', '$totalbalance', '$initialrequest','$date','$balance','$trxid','WITHDRAWAL MADE FROM YOUR WALLET','1', '0')";

	
	 $query = mysqli_query($con,$sql);
	 
	 
	 if(!$query)
	 {
		 echo"THE ERROR WITH SUBMITTING WITHDRAWAL REQUEST IS: $con->error";
		 exit();
	 }
	
	
	$query_withdrawal_charge = $con->query("INSERT INTO account (id, amount_before_withdrawal, amount_withdrawn, date, balance, trxid, reason, type, pay_status )
			values('$id', '-', '$withdrawal_charge','$date','-','$trxid','WITHDRAWAL CHARGE', '0', '1')");
			
			
	if(!$query_withdrawal_charge)
	{
		echo"could not submit the charge $con->error";
		exit();
	}		
	
	$sql2 = "UPDATE wallet SET amount = $balance WHERE id = '$id'"; 
	
	
	
		$result2 = $con->query($sql2);
			if(!$result2)
			{
				echo"THE ERROR WITH UPDATE WALLET IS: $con->error";
				exit();
			}
			
			
			
			
			
			
			
			$username = "support@olivereward.com";
		    $password = "08030799182";
			$message1 = "$id placed order for withdrawal of N$initialrequest";			
			$senderid = "olivereward";
			
			$message1 = urlencode($message1);
			
			
				
				$payer_phone_number =  '08138390589';
				
				$url = 'https://api.smartsmssolutions.com/smsapi.php?username='.$username.'&password='.$password.'&sender='.$senderid.'&recipient='.$payer_phone_number.'&message='.$message1.'&';
				$send = file_get_contents($url);
				sleep(2);
			
			
			
		echo"1";
		exit();
	
	
}

function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>
