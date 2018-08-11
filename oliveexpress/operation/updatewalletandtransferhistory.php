<?php

ini_set('max_execution_time', 18000);
include("../connection/db.php");


$username = "ijeoma";

$add_stage1_wallet = $con->query("UPDATE wallet SET amount = amount + 10000 WHERE id = '$username' ");
				
				
				if(!$add_stage1_wallet)
				{
					echo"the error in adding the stage1 cash reward to wallet is: $con->error";
					exit();
				}
				$trxunique = uniqid();
				$date = time();
		$lastupdate = $con->query("INSERT INTO transferhistory ( id,amount , amounttransfered, receiver, balance, reason, trxid, date)VALUES('olivereward','0', '10000', '$username', '0', 'transfered for completing stage1', '$trxunique', '$date')");

if($lastupdate){
	
	echo"updated correctly";
	exit();
}
				
?>
