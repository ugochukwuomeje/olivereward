<!doctype html>

<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
$email = $_SESSION['email'];
$id = $_SESSION['id'];
$dollar_rate = $_SESSION['dollar_rate'];

include("../connection/db.php");
?>


<?php
include("include/header.php");
?>
<style>

th{
	background-Color:#DC143C;
	font-size:0.8em;
	color:white;
	
}
tr{
	font-size:0.8em;
	padding-top:-0.4em;
}
td{
	padding:3em;
}
</style>
<body>



        <!-- Left Panel -->
<?php
include("include/leftmenu.php");
?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
			include("include/topmenu.php");
		?>
        <!-- Header-->
		<?php
			
		
							$sql = "SELECT * FROM account WHERE id = '$id'";
							$result = $con->query($sql);
							
							
		?>
        			
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                        <h3 class="page-header"><center>Withdrawal History</center></h3>
						<br>
						<table class='table  table-bordered table-condensed'>
						<tr><th>Trx Id</th><th>Opening balance<br>(Naira)</th><th>Opening balance<br>(USD)</th><th>Amount withdrawan<br>(Naira)</th><th>Amount withdrawan<br>(USD)</th><th>Closing Balance<br>(Naira)</th><th>Closing Balance<br>(USD)</th><th>Date</th><th>Pay status</th><th>Remark</th></tr>
						<?php
						   if(!$result->num_rows > 0){
							   
							   echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'>YOU DONT HAVE ANY WITHDRAWAL HISTORY</div>";
							   
						   }else{
							   $paystatus_result;
							   
							   while($row_request = mysqli_fetch_array($result)){
								   
								   $amount_before_withdrawal = $row_request['amount_before_withdrawal'];
								   $amount_before_withdrawal_usd = $amount_before_withdrawal/$dollar_rate;
								   $amount_withdrawn = $row_request['amount_withdrawn'];
								   $date = $row_request['date'];
								   $balance = $row_request['balance'];
								   $balance_usd = $balance/$dollar_rate; 
								   $paystatus = $row_request['pay_status'];
								   $trxid = $row_request['trxid'];
								   $remark = $row_request['reason'];
								   $amount_withdrawn_usd = $amount_withdrawn/$dollar_rate;
								   
								   if($paystatus == 0)
								   {
									   $paystatus_result = "Not paid";
								   }
								   elseif($paystatus == 1){
									   
									$paystatus_result = "paid";
								   }
								   
								   $date = date('d/m/Y',$date);
								   
								   echo"<tr><td>$trxid</td><td>$amount_before_withdrawal</td><td>$amount_before_withdrawal_usd</td><td> $amount_withdrawn</td><td> $amount_withdrawn_usd</td><td>$balance</td><td>$balance_usd</td><td>$date</td><td>$paystatus_result</td><td>$remark</td></tr>";
							   }
						   }
						
						
						?>
						
						</table>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php
include("include/footer.php");
?>
</body>
</html>
