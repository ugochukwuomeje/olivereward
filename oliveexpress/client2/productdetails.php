<!doctype html>
<?php

session_start();

include("include/header.php");
$id = $_SESSION['id'];
$refelink = $_SESSION['reflink'];
?>
<style>
	.mydetailstable .table-heading, .mybonustable .table-heading{
		background-color:#DEDEDE;
		color:white;
		font-size:0.7em;
		padding:0.5em;
		height:1.5em;
	}
	
	.mydetailstable th, .mybonustable th{
		color:red;
		font-size:1em;
		padding:0.4em;
		height:1.5em;
		font-face:bold;
	}
	
	.mydetailstable td, .mybonustable td{
		background:#fff;
		color:black;
		font-size:0.8em;
		padding:0.6em;
		height:1.5em;
	}
	 .table3{
		
		font-weight: bold;
		font-size:1.1em;
		
	}
	.table3 td{
		color:#919191;
	}
</style>
<body>


        <!-- Left Panel -->
<?php
include("include/leftmenu.php");
include("../connection/db.php");
?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
			include("include/topmenu.php");
		?>
		
        <!-- Header-->
		
        <div class="content mt-3">

            <div class="col-sm-12" style='background-color:white; padding-top:1em;'>
				
					<div class="col-xl-4 col-lg-6">
						<div class="card">
							<div class="card-body">
								<div class="stat-widget-one">
									<div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
									<div class="stat-content dib">
										<div class="stat-text">Wallet Balance</div>
										<div class="stat-digit">N<?php echo"$wallet_balance"; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="col-xl-4 col-lg-6">
						<div class="card">
							<div class="card-body">
								<div class="stat-widget-one">
									<div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
									<div class="stat-content dib">
										<div class="stat-text">Total Reward</div>
										<div class="stat-digit"><?php echo"$total_reward_number" ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-xl-4 col-lg-6">
						<div class="card">
							<div class="card-body">
								<div class="stat-widget-one">
									<div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
									<div class="stat-content dib">
										<div class="stat-text">Total downline</div>
										<div class="stat-digit"><?php echo"$population" ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
			
			<!---------------------------this ends the first three blocks------>
					
			
								<div class="col-lg-6">
								  <table class='table table-bordered mydetailstable table1'>
									<tr><th colspan='2' class='table-heading'><center style='font-size:1.5em'>My Details<center></th></tr>
										<tr><td>SPONSOR ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><th><?php echo"$sponsor_id" ?></th></tr>
										<tr><td>JOINED DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><th><?php echo"$formated_date" ?></th></tr>
										<tr><td>MOBILE</td><th><?php echo"$mobile" ?></th></tr>
										
								  </table>
								  <table class='table table-bordered mydetailstable table3'>
									<tr><th  class='table-heading'><center style='font-size:1.5em'>Latest News<center></th></tr>
									<td>
									This is to inform all distributors that Olivereward is not an investment, but a pure<br> multilevel Marketing company that is into buying and selling among other services.<br> Anybody that is doing investment does it at His/Her own RISK.<br> 

											Olivereward .....The Better You!<br><br>

											Olivereward .....Outstanding Performance!!<br><br>

											Olivereward .....Promoting Healthy Lifestyle For All!!!<br><br>

									
									</td>
								  </table>
								  
								</div>
								<div class="col-lg-6">
								  <table class='table table-bordered mybonustable table2'>
									<tr><th colspan='2' class='table-heading'><center style='font-size:1.5em'>My Bonus</center></th></tr>
										<tr><td>Current Stage</td><th><?php echo"$stage" ?></th></tr>
										<tr><td>TOTAL BONUS EARNED(USD)</td><th><?php echo"$total_reward_amount_usd" ?></th></tr>
										<tr><td>TOTAL BONUS EARNED(NGN)</td><th><?php echo"$total_reward_amount" ?></th></tr>
										<tr><td>Total BONUS WITHDRAWN(USD)</td><th><?php echo"$total_bonus_withdrawn" ?></th></tr>
										<tr><td>TOTAL BONUS WITHDRAWN(NGN)</td><th>N3000</th></tr>
										<tr><td>TOTAL WALLET BALANCE(USD)</td><th>N3000</th></tr>
										<tr><td>TOTAL WALLET BALANCE(NGN)</td><th>N3000</th></tr>
								  </table>
								  
								  
								  <table class='table table-bordered mydetailstable table3'  style='margin-top:2em;'>
									<tr><th  class='table-heading'><center style='font-size:1.5em'>Referal link<center></th></tr>
									<td style='color:red'>
										<?php echo"$refelink"  ?>
									</td>
								  </table>
								</div>
								
							
							<?php
						?>
			</div>
   
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php
include("include/footer.php");
?>

</body>
</html>
