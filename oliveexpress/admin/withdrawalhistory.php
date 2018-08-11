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

if(isset($_GET['username'])){
	$usernametosearch = $_GET['username'];
}
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
			
						if(isset($_GET['username']))
						{
							$sql = "SELECT * FROM account WHERE pay_status = '1' AND id = '$usernametosearch' LIMIT 30";
						}else{
							$sql = "SELECT * FROM account WHERE pay_status = '1' LIMIT 30";
						}
							
							$result = $con->query($sql);
							
							
		?>
        <div class="content mt-3" >

              <div class="row" >
                   <div class="col-lg-12" style='background-Color:white;'>
					<center><img src='../images/ajax-loader.gif' id='img_approve_withdrawal_request'> </center>
                        <h5 class="page-header"><center>Withdrawal History</center></h5>
						
						
						<?php
						   if(!$result->num_rows > 0){
							   
							   echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'><center>YOU DONT HAVE ANY WITHDRAWAL REQUEST</center></div>";
							   
						   }else{
							   
							$total_withdrawal = $result->num_rows;   
							   
	echo"<table class='table table-bordered' style='width:60%'>
						<tr><th style=''>Total Withdrawal</th><th>$total_withdrawal</th></tr>
						<tr><form method='GET' action='withdrawalhistory.php'><td><input type='text' name='username' class='form-control' placeholder='enter username'>						
						</td><td><input type='submit' value='Search Member' class='btn btn-success'btn-small></td></form></tr>
				</table>";
				
				echo"<table class='table  table-bordered table-condensed'>
						<tr><th>USERNAME</th><th>Trx Id</th><th>Opening balance<br>(Naira)</th><th>Opening balance<br>(USD)</th><th>Amount withdrawan<br>(Naira)</th><th>Amount withdrawan<br>(USD)</th><th>Closing Balance<br>(Naira)</th><th>Closing Balance<br>(USD)</th><th>Date</th></tr>";
							   
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
								   
								  
								   
								   $date = date('d/m/Y',$date);
								   
								   echo"<tr><td>$username</td><td>$trxid</td><td>$amount_before_withdrawal</td><td>$amount_before_withdrawal_usd</td><td> $amount_withdrawn</td><td> $amount_withdrawn_usd</td><td>$balance</td><td>$balance_usd</td><td>$date</td></tr>";
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
