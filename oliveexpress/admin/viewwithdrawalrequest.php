<!doctype html>

<?php
session_start();
if(!isset( $_SESSION['username']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
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
			$pagetitle = "REGISTERED MEMBERS";
		?>
        <?php
			
		
							$sql = "SELECT * FROM account WHERE pay_status = '0'";
							$result = $con->query($sql);
							
							
		?>
        <div class="content mt-3" >

              <div class="row" >
                   <div class="col-lg-12" style='background-Color:white;'>
					<center><img src='../images/ajax-loader.gif' id='img_approve_withdrawal_request'> </center>
                        <h3 class="page-header"><center>Withdrawal History</center></h3>
						<br>
						<table class='table  table-bordered table-condensed'>
						<tr><th>USERNAME</th><th>Mobile</th><th>Trx Id</th><th>Opening balance<br>(Naira)</th><th>Opening balance<br>(USD)</th><th>Amount withdrawan<br>(Naira)</th><th>Amount withdrawan<br>(USD)</th><th>Closing Balance<br>(Naira)</th><th>Closing Balance<br>(USD)</th><th>Date</th><th>view account</th><th>Approve</th></tr>
						<?php
						
						$a = 0;
						$c = 'c';
						 $bankname  = " ";
						 $account = " ";
						 $accname = " ";
						   if(!$result->num_rows > 0){
							   
							   echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'><center>YOU DONT HAVE ANY WITHDRAWAL REQUEST</center></div>";
							   
						   }else{
							   $paystatus_result;
							   
							   while($row_request = mysqli_fetch_array($result)){
								   
								   $amount_before_withdrawal = $row_request['amount_before_withdrawal'];
								   $amount_before_withdrawal_usd = $amount_before_withdrawal/$dollar_rate;
								   $amount_withdrawn = $row_request['amount_withdrawn'];
								   $date = $row_request['date'];
								   $username = $row_request['id'];
								   $balance = $row_request['balance'];
								   $balance_usd = $balance/$dollar_rate; 
								   $paystatus = $row_request['pay_status'];
								   $trxid = $row_request['trxid'];
								   $remark = $row_request['reason'];
								   $amount_withdrawn_usd = $amount_withdrawn/$dollar_rate;
								   
								  $a++;
								  $c = $c . $a; 
								   
								   $date = date('d/m/Y',$date);
								   
								    $queryusers = $con->query("SELECT * FROM users WHERE username = '$username'");
								   $row_users = mysqli_fetch_array($queryusers);
								   $mobile =  $row_users['mobile'];
								   
								   echo"<tr><td>$username</td><td>$mobile</td><td>$trxid</td><td>$amount_before_withdrawal</td><td>$amount_before_withdrawal_usd</td><td> $amount_withdrawn</td><td> $amount_withdrawn_usd</td><td>$balance</td><td>$balance_usd</td><td>$date</td><td><a href='' data-toggle='modal' data-target='#$c' class='btn btn-small btn-primary '>View Account </a></td><td><a href='' approveusername='$username' approveusertrxid='$trxid' class='btn btn-small btn-success approvewithdrawalrequest'>Approve </a></td></tr>";
								   
								   $queryaccountdetails = $con->query("SELECT * FROM bankdetails WHERE id = '$username'");

								   if($queryaccountdetails->num_rows >0){
									   $row_bankdetails = mysqli_fetch_array($queryaccountdetails);
									   
									   $bankname = $row_bankdetails["bank"];
									   $account = $row_bankdetails['acc_number'];
									   $accname = $row_bankdetails['acc_name'];
								   }
								   
								   echo"<div id='$c' class='modal fade' role='dialog'>
									  <div class='modal-dialog'>

										<!-- Modal content-->
										<div class='modal-content'>
										  <div class='modal-header'>
											
											<center><h4 class='modal-title'>Bank Details</h4></center>
										  </div>
										  <div class='modal-body'>
											<form>
												<label>Bank Name</label>
												<input type='text' value='$bankname'>
												<label>ACC Name</label>
												<input type='text' value='$accname'>
												<label>ACC Number</label>
												<input type='text' value='$account'>
												
											<form>
										  </div>
										  <div class='modal-footer'>
											<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
										  </div>
										</div>

									  </div>
									</div>";
							   }
						   }
						
						
						?>
						
						</table>
                    </div>
				
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
