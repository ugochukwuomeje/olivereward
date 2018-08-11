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
		
							$sql = "SELECT * FROM wallet WHERE id = '$id'";
							$result = $con->query($sql);
							$row = mysqli_fetch_array($result);
							$amount = $row["amount"];
							
							$dollar_amount = $amount/$dollar_rate
		?>
        			
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                        <h1 class="page-header"><center>Make Transfer</center></h1>
						
						
						<form id='transferform'>
							
							<div>
							  <span>Total Balance In Naira<label></label></span>
							  <input type="text" id="totalbalance" name="totalbalance" value="<?php echo$amount  ?>"  readonly>
							</div>
							<div>
							  <span>Total Balance In Dollar<label></label></span>
							  <input type="text" id="totalbalance"  value="<?php echo$dollar_amount  ?>"  readonly>
							</div>
						<div>
								<span>Amount<label>* In Dollars</label></span>	
							  <input type='number' id="amount_transfer" name="amount"  style='width:96%'>
							  <span style='color:red' style='width:100%'>Amount in Naira: <span class='amountnaira'></span></span>
						</div>	
						<div>
								<span>Receiver User name<label></label></span>
							  <input type="text" id="receiver_username" name="receiver_username" >
						</div>
						<div>
								<span>Transaction Password<label></label></span>
							  <input type="text" id="transaction_passowrd" name="transaction_passowrd"  >
						</div>
						<div>
								<span>Remarkk<label></label></span>
							  <input type="text" id="remark" name="remark"  >
						</div>
							   <input type="submit" value="submit" id='transfer'>
							  
						</form>
						<img src='../images/ajax-loader.gif' id='transfer_request_loader'>
				
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
