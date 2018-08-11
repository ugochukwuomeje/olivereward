<?php
session_start();
$id = $_SESSION['id'];

$token = rand(10000, 99999);

$username = $_SESSION['username'];
$email = $_SESSION['email'];


$date = time();

include("../../connection/db.php");

$sql_check_token = "SELECT * FROM token WHERE id = '$id'";
$query_check_token = $con->query($sql_check_token);

if(!$query_check_token->num_rows >0)
{
		$sql_submit_toke = "INSERT INTO token(id, token, date, used)VALUES('$id', '$token', '$date', '0')";
		$query_token  = $con->query($sql_submit_toke);

		if(!$query_token)
		{
			echo"THE ERROR IN GENERATING TOKEN IS: $con->error";
			exit();
		}
		
		$body = "Hello $username your token is $token";					
				 mail($email,'your token', $body,'From: oliveerward' );


		echo"<h3>your token has been sent to your email and phone number</h3>";
		exit();
}else{
	
	$sql_submit_toke = "UPDATE token SET token = '$token', date='$date', used = '0' WHERE id = '$id'";
		$query_token  = $con->query($sql_submit_toke);

		if(!$query_token)
		{
			echo"THE ERROR IN GENERATING TOKEN IS: $con->error";
			exit();
		}

		echo"<h3>your token has been sent to your email and phone number</h3>";
		exit();
}



?>