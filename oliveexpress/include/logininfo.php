<?php
$loggedin = 0;
$whishlistquantity = 0;
if(isset($_SESSION['username']))
{
	$loggedin = 1;
	$firstname = $_SESSION['f_name'];
	$lastname = $_SESSION['l_name'];
	
	$email = $_SESSION['email'];
}


if($loggedin == 0){
	
	
}
?>