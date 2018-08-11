<?php
session_start();

$dollar_rate = $_SESSION['dollar_rate'];

$value = $_POST['id'];

$converted_amount = $value *$dollar_rate;
$converted = "N".$converted_amount;
echo"$converted";
exit();
?>









