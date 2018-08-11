<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

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
	padding-top:-1em;
}
.table{
	width:100%;
	
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
		
							/////////////////////for transfer
							$sql_transfer = "SELECT * FROM transferhistory WHERE id  = '$id' ORDER BY date DESC";
							$transfer_result = $con->query($sql_transfer);
							
							if(!$transfer_result)
							{
								echo"the error is $con->error";
							}
							
							//////////////////////for receiver
							$sql_received = "SELECT * FROM transferhistory WHERE receiver = '$id' ORDER BY date DESC";
							$result_received = $con->query($sql_received);
							
							if(!$result_received)
							{
								echo"the error is $con->error";
							}
							
							
		?>
        			
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white; margin-bottom:1em'>
                        <h2 class="page-header"><center>Transaction History </center></h2>

<!------------------repeatition---------------------------------------------------------------------------------------->
<div class="panel-group" id="accordion" style='margin-bottom:2em; margin-top:2em'>
    <div class="panel panel-default">
      <div class="panel-heading">
        <center class="panel-title" style='background-Color: #DC143C;'>
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1a"><center class="panel-title">
									<h4 style='color:white'>click to View Debit History </h4>
									</center></a>
        </center>
      </div>
      <div id="collapse1a" class="panel-collapse collapse in">
        <div class="panel-body">
<table class='table  table-bordered' >
						<tr><th>SN</th><th>TxID</th><th>Credit<br>Amount(USD)</th><th>Credit<br>Amount(NIRA)</th><th>Debit<br>Amount(USD)</th><th>Debit<br>Amount(NIRA)</th><th>Sender Id</th><th>Date</th><th>Remark&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>
						<?php
						$sn = 0;
						   if((!$transfer_result->num_rows > 0)){
							   
							   echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'>YOU DONT HAVE ANY TRANSACTION HISTORY</div>";
							   
						   }else{
							   $paystatus_result;
				//////////////////////////////for transfer			   
							   while($row_transfer = mysqli_fetch_array($transfer_result)){
								   
								   $sn++;
								   $usd_amount_transfered = $row_transfer['amounttransfered']/$dollar_rate;
								   $naira_amount_transfered = $row_transfer['amounttransfered'];
								   $balance = $row_transfer['balance']/$dollar_rate;
								   $receiver = $row_transfer['id'];
								   $date = $row_transfer['date'];
								   $balance = $row_transfer['balance']/$dollar_rate;
								   $reason = $row_transfer['reason'];
								   
								   $trxid = $row_transfer['trxid'];
								   $usd_credit = 0;
								   $naira_credit = 0;
								   if($reason == 'used for registration'){
									   
									   $reason = $reason." ".$trxid;
								   }
								   
								   $formated_date = date('m/d/Y H:i:s', intval($date));
								   
								   $splited_date = explode("/",$formated_date);
								   $strmonth = $splited_date[0];
								   switch($strmonth){
									   
									case 01:
									$strmonth = "JAN";
									break;									
									   
									case 02:
									$strmonth = "FEB";
									break;

									case 03:
									$strmonth = "MARCH";
									break;
									
									case 04:
									$strmonth = "APRIL";
									break;
									
									case 05:
									$strmonth = "MAY";
									break;
									
									case 06:
									$strmonth = "JUNE";
									break;
									
									case 07:
									$strmonth = "JULY";
									break;
									
									case 08:
									$strmonth = "AUGUST";
									break;
									
									case 09:
									$strmonth = "SEPT";
									break;
									
									case 10:
									$strmonth = "OCT";
									break;
									
									case 11:
									$strmonth = "NOV";
									break;
									
									case 12:
									$strmonth = "DEC";
									break;
								   }
								   
								   $formated_date = $splited_date[1]." ".$strmonth." ". $splited_date[2];
								   echo"<tr><td>$sn</td><td>$trxid</td><td>$usd_credit</td><td>$naira_credit</td><td>$usd_amount_transfered</td><td>$naira_amount_transfered</td><td>$id</td><td>$formated_date</td><td>$reason</td></tr>";
							   }
				
               
						   }
						?>
						
									</table>		
		</div>
      </div>
    </div>
    <div class="panel panel-default" style='margin-top:1em'>
      <div class="panel-heading">
        <center class="panel-title" style='background-Color: #DC143C;'>
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2a"><h4 style='color:white'>Click to View Deposite History </h4></a>
        </center>
      </div>
      <div id="collapse2a" class="panel-collapse collapse">
        <div class="panel-body">
			<table class='table  table-bordered' >
						<tr><th>SN</th><th>TxID</th><th>Credit<br>Amount(USD)</th><th>Credit<br>Amount(NIRA)</th><th>Debit<br>Amount(USD)</th><th>Debit<br>Amount(NIRA)</th><th>Sender Id</th><th>Date</th><th>Remark&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>
						<?php
						$sn = 0;
						   if((!$result_received->num_rows > 0)){
							   
							   echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'>YOU DONT HAVE ANY TRANSACTION HISTORY</div>";
							   
						   }else{
							   $paystatus_result;
				//////////////////////////////for transfer			   
							   
                ////////////////////////////////////////for receiver				
							   while($row_request = mysqli_fetch_array($result_received)){
								   
								   $sn++;
								   $usd_credit = $row_request['amounttransfered']/$dollar_rate;
								   $naira_credit = $row_request['amounttransfered'];
								   $balance = $row_request['balance']/$dollar_rate;
								   $sender = $row_request['id'];
								   $date = $row_request['date'];
								   $balance = $row_request['balance'];
								   $reason = "Received $".$usd_credit." From ".$sender;
								   $trxid = $row_request['trxid'];
								   $formated_date = date('m/d/Y H:i:s', intval($date));
								   $usd_amount_received = 0;
								   $naira_amount_transfered = 0;
								   $usd_amount_transfered = 0;
								   
								   $splited_date = explode("/",$formated_date);
								   $strmonth = $splited_date[0];
								   switch($strmonth){
									   
									case 01:
									$strmonth = "JAN";
									break;									
									   
									case 02:
									$strmonth = "FEB";
									break;

									case 03:
									$strmonth = "MARCH";
									break;
									
									case 04:
									$strmonth = "APRIL";
									break;
									
									case 05:
									$strmonth = "MAY";
									break;
									
									case 06:
									$strmonth = "JUNE";
									break;
									
									case 07:
									$strmonth = "JULY";
									break;
									
									case 08:
									$strmonth = "AUGUST";
									break;
									
									case 09:
									$strmonth = "SEPT";
									break;
									
									case 10:
									$strmonth = "OCT";
									break;
									
									case 11:
									$strmonth = "NOV";
									break;
									
									case 12:
									$strmonth = "DEC";
									break;
								   }
								   
								   $formated_date = $splited_date[1]." ".$strmonth." ". $splited_date[2];
								   
								   echo"<tr><td>$sn</td><td>$trxid</td><td>$usd_credit</td><td>$naira_credit</td><td>$usd_amount_transfered</td><td>$naira_amount_transfered</td><td>$sender</td><td>$formated_date</td><td>$reason</td></tr>";
						   }
						
						   }
						?>
						
									</table>
		</div>
      </div>
    </div>
  
  </div> 			  
			  
			  
			  
			  
			</div>
		  </div>
		</div>
		
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php
include("include/footer.php");
?>
</body>
</html>
