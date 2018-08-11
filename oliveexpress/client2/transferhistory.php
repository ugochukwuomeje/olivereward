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

include("../connection/db.php");
?>


<?php
include("include/header.php");
?>
<style>

th{
	background-Color:#1C86EE;
	font-size:0.8em;
	color:white;
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
			include("include/breadcrumb.php");
		
							$sql = "SELECT * FROM transferhistory WHERE id = '$id'";
							$result = $con->query($sql);
							
							
		?>
        			
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                        <h3 class="page-header"><center>Transfer History</center></h3>
						<br>
						<table class='table table-striped'>
						<tr><th>Amount before<br>Transfer</th><th>Amount Transfered</th><th>Receiver</th><th>Balance</th><th>Date</th></tr>
						<?php
						   if(!$result->num_rows > 0){
							   
							   echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'>YOU DONT HAVE ANY TRANSFER HISTORY</div>";
							   
						   }else{
							   $paystatus_result;
							   
							   while($row_request = mysqli_fetch_array($result)){
								   
								   $amount_before_transfer = $row_request['amount'];
								   $amount_transfered = $row_request['amounttransfered'];
								   $receiver = $row_request['receiver'];
								   $balance = $row_request['balance'];
								   $timestampdate = $row_request['date'];
								   
								   $readable_date = date('m/d/Y H:i:s', $timestampdate);
								   
								   echo"<tr><td>$amount_before_transfer</td><td>$amount_transfered</td><td>$receiver</td><td>$balance</td><td> $readable_date</td></tr>";
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
