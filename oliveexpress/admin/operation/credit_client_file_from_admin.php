<?php
session_start();

if(!isset($_SESSION["adminloggedin"]) ) ///////////////////////////please put ! before isset
{

	echo"please login";
	exit();
	
}

$id = $_SESSION['username']
include("../../connection/db.php");

$clientusername = escape_data($_POST['username']);

///////////////////////////////////////get the referal bonus
$query_referal_bonus = $con->query("SELECT * FROM referalbonus ");
$row = mysqli_fetch_array($query_referal_bonus);

$amount = $row['amount'];

/////////////////////////////////////////////creddit client wallet

$sql_credit_wallet = "UPDATE wallet SET amount = amount + '$amount' WHERE id = '$clientusername'";
$query_credit_wallet = $con->query($sql_credit_wallet);

if(!$query_credit_wallet){
	echo"could not credit client";
	exit();
}
else{
	
	echo'1';
	exit();
}


function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>