<!doctype html>
<?php

session_start();

include("include/header.php");
$id = $_SESSION['id'];
$refelink = $_SESSION['reflink'];
$loggedin = $_SESSION['loggedin'];
$dollar_rate = $_SESSION['dollar_rate'];
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
include("../connection/db.php");
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
		
        <div class="content mt-3">

            <div class="col-sm-12" style='background-color:white; padding-top:1em;'>
				
					
					<?php
					$all_bonus_total = 0;
					/////////////////////////////////////////the total referal bonus
					$query_all_bonus = $con->query("SELECT * FROM received_stage_bonus WHERE received = '$id'");
					
					if($query_all_bonus->num_rows >0)
					{
						while($row_query_all_bonus = mysqli_fetch_array($query_all_bonus))
							{
							  $all_bonus_total = $all_bonus_total +  $row_query_all_bonus['amount'];
							}
							
					}
					
										
					/////////////////////////////////////////////////////////////
					$total_bonus_withdrawn_usd = 0;
					///////////////////////////////////getting the population
					$sql_getpopulation = "SELECT * FROM population WHERE username = '$id'";
					$sql_query = $con->query($sql_getpopulation);
					$row_population = mysqli_fetch_array($sql_query);
					
					$population = $row_population['number'];
					/////////////////////
					//////////////////////////////////getting the stage rewards
					$stage1_active = 0;
					$stage2_active = 0;
					$stage3_active = 0;
					$stage4_active = 0;
					$stage5_active = 0;
					$stage6_active = 0;
					$stage1_gift = 0;
					$starter_active = 0;
					$sql_starter_rewards = "SELECT * FROM starter_rewards WHERE username = '$id'";
					$query_starter_rewards = $con->query($sql_starter_rewards);
					if($query_starter_rewards->num_rows > 0){
						$starter_active = 1;
						$row_starter_rewards = mysqli_fetch_array($query_starter_rewards);
						$starter_amount = $row_starter_rewards['amount'];
						$formated_starter_amount = number_format($starter_amount,2);
						$starter_gift = $row_starter_rewards['gift'];
						$outputstarter = "<tr><td style='color:red'>---</td><td style='color:red'>$formated_starter_amount</td></tr>";
					}
					$sql_stage1_reward = "SELECT * FROM stage1_reward WHERE username = '$id'";
					$query_stage1reward = $con->query($sql_stage1_reward);
					if($query_stage1reward->num_rows > 0){
						$stage1_active = 1;
						$row_stage1reward = mysqli_fetch_array($query_stage1reward);
						$stage1_amount = $row_stage1reward['amount'];
						$formated_stage1_amount = number_format($stage1_amount,2);
						$stage1_gift = $row_stage1reward['gift'];
						$output1 = "<tr><td style='color:red'<td style='color:red'>Dove</td></td><td style='color:red'>$stage1_gift</td><td style='color:red'>$formated_stage1_amount</td></tr>";
					}
					$sql_stage2_reward = "SELECT * FROM stage2_reward WHERE username = '$id'";
					$query_stage2reward = $con->query($sql_stage2_reward);
					if($query_stage2reward->num_rows > 0){
						$stage2_active = 1;
						$row_stage2reward = mysqli_fetch_array($query_stage2reward);
						$stage2_amount = $row_stage2reward['amount'];
						$stage2_gift = $row_stage2reward['gift'];
						$formated_stage2_amount = number_format($stage2_amount,2);
						$output2 = "<tr><td style='color:red'<td style='color:red'>Dove</td><td style='color:red'>$stage2_gift</td><td style='color:red'>$formated_stage2_amount</td></tr>";
					}
					$sql_stage3_reward = "SELECT * FROM stage3_reward WHERE username = '$id'";
					$query_stage3reward = $con->query($sql_stage3_reward);
					if($query_stage3reward->num_rows > 0){
						$stage3_active = 1;
						$row_stage3reward = mysqli_fetch_array($query_stage3reward);
						$stage3_amount = $row_stage3reward['amount'];
						$stage3_gift = $row_stage3reward['gift'];
						$formated_stage3_amount = number_format($stage3_amount,2);
						$output3 = "<tr><td style='color:red'<td style='color:red'>Dove</td><td style='color:red'>$stage3_gift</td><td style='color:red'>$formated_stage3_amount</td></tr>";

					}
					$sql_stage4_reward = "SELECT * FROM stage4_reward WHERE username = '$id'";
					$query_stage4reward = $con->query($sql_stage4_reward);
					if($query_stage4reward->num_rows > 0){
						$stage4_active = 1;
						$row_stage4reward = mysqli_fetch_array($query_stage4reward);
						$stage4_amount = $row_stage4reward['amount'];
						$stage4_gift = $row_stage4reward['gift'];
						$formated_stage4_amount = number_format($stage4_amount,2);
						$output4 = "<tr><td style='color:red'<td style='color:red'>Dove</td><td style='color:red'>$stage4_gift</td><td style='color:red'>$formated_stage4_amount</td></tr>";

					}
					$sql_stage5_reward = "SELECT * FROM stage5_reward WHERE username = '$id'";
					$query_stage5reward = $con->query($sql_stage5_reward);
					if($query_stage5reward->num_rows > 0){
						$stage5_active = 1;
						$row_stage5reward = mysqli_fetch_array($query_stage5reward);
						$stage5_amount = $row_stage5reward['amount'];
						$stage5_gift = $row_stage5reward['gift'];
						$formated_stage5_amount = number_format($stage5_amount,2);
						$output5 = "<tr><td style='color:red'<td style='color:red'>Dove</td><td style='color:red'>$stage5_gift</td><td style='color:red'>$formated_stage5_amount</td></tr>";
					}
					$sql_stage6_reward = "SELECT * FROM stage6_reward WHERE username = '$id'";
					$query_stage6reward = $con->query($sql_stage6_reward);
					if($query_stage6reward->num_rows > 0){
						$stage6_active = 1;
						$row_stage6reward = mysqli_fetch_array($query_stage6reward);
						$stage6_amount = $row_stage6reward['amount'];
						$stage6_gift = $row_stage6reward['gift'];
						$formated_stage6_amount = number_format($stage6_amount,2);
						$output6 = "<tr><td style='color:red'<td style='color:red'>Dove</td><td style='color:red'>$stage6_gift</td><td style='color:red'>$formated_stage6_amount</td></tr>";
					}
					///////////////////////////////////////////////////////////
					
					//////////////////////////////////////////////////////////getting the stage names
					$sql_stage_name = "SELECT * FROM stagenames";
					$query_stagenames = $con->query($sql_stage_name);
					$row_stagenames = mysqli_fetch_array($query_stagenames);
					$stage0 = $row_stagenames['stage0'];
					$stage1 = $row_stagenames['stage1'];
					$stage2 = $row_stagenames['stage2'];
					$stage3 = $row_stagenames['stage3'];
					$stage4 = $row_stagenames['stage4'];
					$stage5 = $row_stagenames['stage5'];
					$stage6 = $row_stagenames['stage6'];
					//////////////////////////////////////////////////////////////calculating total reward in amount
					
					///////////////////////////////////////////////////////////////getting your current level1
					$sql_current_level = "SELECT * FROM currentlevel WHERE id = '$id'";
					$query_current_level = $con->query($sql_current_level);
					$row_current_level = mysqli_fetch_array($query_current_level);
					
					$mycurrentlevel = $row_current_level['mycurrentlevel'];
					
					if($mycurrentlevel == 0)
					{
						$stage = $stage0;
					}elseif($mycurrentlevel == 1)
					{
						$stage = $stage1;
					}elseif($mycurrentlevel == 2)
					{
						$stage = $stage2;
					}elseif($mycurrentlevel == 3)
					{
						$stage = $stage3;
					}elseif($mycurrentlevel == 4)
					{
						$stage = $stage4;
					}elseif($mycurrentlevel == 5)
					{
						$stage = $stage5;
					}elseif($mycurrentlevel == 6)
					{
						$stage = $stage6;
					}
					///////////////////////////////////////////////////////////////////////////
					
					////reward from level1
					$starter_reward_amount = 0;	
					$total_reward_amount = 0;
					
					$total_reward_amount_usd = $total_reward_amount/$dollar_rate;
					
					$sql_starter_reward_amount = "SELECT * FROM starter_rewards WHERE id = '$id'";
					$query_starter_reward = $con->query($sql_starter_reward_amount);
					if($query_starter_reward->num_rows >0){
						$row_starter_reward = mysqli_fetch_array($query_starter_reward);
						$starter_reward_amount = $row_starter_reward['amount'];
					
					}
					
					$level1_reward_amount = 0;					
					$sql_level1_reward_amount = "SELECT * FROM stage1_reward WHERE id = '$id'";
					$query_level1_reward = $con->query($sql_level1_reward_amount);
					if($query_level1_reward->num_rows >0){
						$row_level1_reward = mysqli_fetch_array($query_level1_reward);
						$level1_reward_amount = $row_level1_reward['amount'];
					}
					
					$level2_reward_amount = 0;					
					$sql_level2_reward_amount = "SELECT * FROM stage2_reward WHERE id = '$id'";
					$query_level2_reward = $con->query($sql_level2_reward_amount);
					if($query_level2_reward->num_rows >0){
						$row_level2_reward = mysqli_fetch_array($query_level2_reward);
						$level2_reward_amount = $row_level2_reward['amount'];
					}	
					
					$level3_reward_amount = 0;					
					$sql_level3_reward_amount = "SELECT * FROM stage3_reward WHERE id = '$id'";
					$query_level3_reward = $con->query($sql_level3_reward_amount);
					if($query_level3_reward->num_rows >0){
						$row_level3_reward = mysqli_fetch_array($query_level3_reward);
						$level3_reward_amount = $row_level3_reward['amount'];
					}	
					
					$level4_reward_amount = 0;					
					$sql_level4_reward_amount = "SELECT * FROM stage4_reward WHERE id = '$id'";
					$query_level4_reward = $con->query($sql_level4_reward_amount);
					if($query_level4_reward->num_rows >0){
						$row_level4_reward = mysqli_fetch_array($query_level4_reward);
						$level4_reward_amount = $row_level4_reward['amount'];
					}	
					
					$level5_reward_amount = 0;					
					$sql_level5_reward_amount = "SELECT * FROM stage5_reward WHERE id = '$id'";
					$query_level5_reward = $con->query($sql_level5_reward_amount);
					if($query_level5_reward->num_rows >0){
						$row_level5_reward = mysqli_fetch_array($query_level5_reward);
						$level5_amount = $row_level5_reward['amount'];
					}	
					
					$level6_reward_amount = 0;					
					$sql_level6_reward_amount = "SELECT * FROM stage6_reward WHERE id = '$id'";
					$query_level6_reward = $con->query($sql_level6_reward_amount);
					if($query_level6_reward->num_rows >0){
						$row_level6_reward = mysqli_fetch_array($query_level6_reward);
						$level6_reward_amount = $row_level6_reward['amount'];
					}	
					
					$total_reward_amount = $level6_reward_amount + $level5_reward_amount + $level4_reward_amount + 	$level3_reward_amount + $level2_reward_amount + $level1_reward_amount + $starter_reward_amount;
					
					$wallet_balance = 0;
					///////////////////////////////////////////this section gets the wallet balance
					$sql_wallet_balance = "SELECT * FROM wallet WHERE id = '$id'";
					$query_wallet_balance = $con->query($sql_wallet_balance);
					
					$row_wallet_balance = mysqli_fetch_array($query_wallet_balance);
					$wallet_balance = $row_wallet_balance['amount'];
					$wallet_balance_usd = $wallet_balance/$dollar_rate;
					$formated_balance = number_format($wallet_balance,2);
					$formated_balance_usd = number_format($wallet_balance_usd,2);
					?>


					<div class="col-xl-4 col-lg-6">
						<div class="card">
							<div class="card-body">
								<div class="stat-widget-one">
									<div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
									<div class="stat-content dib">
										<div class="stat-text">Wallet Balance</div>
										<div class="stat-digit">$<?php echo"$formated_balance_usd"; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>



					<?php
						$total_reward_number = 0;
						
						$sql_total_rewards = "SELECT * FROM downliners WHERE id = '$id'";
						$query_total_rewards= $con->query($sql_total_rewards);
						
						$row_total_reward =  mysqli_fetch_array($query_total_rewards);
						
						//$starter_reward = $row_total_reward['starter'];
						$reward_level1_reward = $row_total_reward['level1'];
						$reward_level2_reward = $row_total_reward['level2'];
						$reward_level3_reward = $row_total_reward['level3'];
						$reward_level4_reward = $row_total_reward['level4'];
						$reward_level5_reward = $row_total_reward['level5'];
						$reward_level6_reward = $row_total_reward['level6'];
						
						$total_reward = $reward_level1_reward + $reward_level2_reward + $reward_level3_reward + $reward_level4_reward
										+ $reward_level5_reward + $reward_level6_reward;
									
						
					?>
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
					
			<?php
						/////////////////////////////////////this line get your registration details
							$sql_mydetails = "SELECT * FROM users WHERE referalid = '$id'";
							$query_mydetails = $con->query($sql_mydetails);
							$row_mydetails = mysqli_fetch_array($query_mydetails);
							
							$sponsor_id = $row_mydetails['sponsor'];
							$formated_date = $row_mydetails['date'];
						 
							$mobile = $row_mydetails['mobile'];
							$reflink = $row_mydetails['reflink'];
							
							$total_bonus = 0;
							////////////////////////////////////////////////////////////////this line calculate the total money earned from referal bonus
							$sql_balance = "SELECT * FROM accountsummary WHERE id = '$id'";
							$query_balance = $con->query($sql_balance);
							
							if($query_balance->num_rows > 0){
								while($row_balance = mysqli_fetch_array($query_balance)){
									$total_bonus = $total_bonus + $row_balance['amount'];
								}
							}

							//////////////therefore total bonus referal + reward
							$total_reward_amount = $total_bonus; //+ $total_reward_amount;
							
							/////////////////////////////total bonus earned in naira
							$all_bonus_total = $all_bonus_total + $total_reward_amount + $stage1_gift;
							$formated_all_bonus_total = number_format($all_bonus_total, 2);
							
							/////////////////////////total referal bonus earned in dollars
							$total_reward_amount_usd = $total_reward_amount/$dollar_rate;
							
							
							/////////////////////////////total bonus earned in dollars
							$all_bonus_total_usd = $all_bonus_total/$dollar_rate;
							
							$formated_all_bonus_total_usd = number_format($all_bonus_total_usd, 2);
							
							
							
							$total_bonus_withdrawn = 0;
							$total_transfered = 0;
							$total_transfered_usd = 0;
							///////////////////////////////////////this line calculates amount trnsfered
							$sql_transfered = "SELECT * FROM transferhistory WHERE id = '$id' AND reason <> 'transfer for registration' AND reason <> 'used for registration'";
							$query_transfered = $con->query($sql_transfered);
							if($query_transfered->num_rows >0){
								
								while($row_transfered = mysqli_fetch_array($query_transfered)){
									$total_transfered = $total_transfered + $row_transfered['amounttransfered'];
								}
								
								$total_transfered_usd = $total_transfered/$dollar_rate;
								
							}
							
							////////////////////////////////////////////////this line calculate bonus withdrawn
							$sql_bonus_withdrawn = "SELECT * FROM account WHERE id = '$id'";
							$query_bonus_withdrawn = $con->query($sql_bonus_withdrawn);
							
							if($query_bonus_withdrawn->num_rows > 0){
								while($row_bonus_withdrawn = mysqli_fetch_array($query_bonus_withdrawn)){
									$total_bonus_withdrawn = $total_bonus_withdrawn + $row_bonus_withdrawn['amount_withdrawn'];
								}
									
									$total_bonus_withdrawn = $total_bonus_withdrawn;
									$total_bonus_withdrawn_usd = ($total_bonus_withdrawn)/$dollar_rate;
									
							}
							?>
								<div class="col-lg-6">
								  <table class='table table-bordered mydetailstable table1'>
									<tr><th colspan='2' class='table-heading'><center style='font-size:1.5em'>My Details<center></th></tr>
										<tr><td>SPONSOR ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><th><?php echo"$sponsor_id" ?></th></tr>
										<tr><td>JOINED DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><th><?php echo"$formated_date" ?></th></tr>
										<tr><td>MOBILE </td><th><?php echo"$mobile" ?></th></tr>
										
								  </table>
								  <table class='table table-bordered mydetailstable table3'>
									<tr><th  class='table-heading'><center style='font-size:1.5em'>Latest News<center></th></tr>
									<td>
									This is to inform all distributors that Olivereward International limited is not an investment company, but a pure<br> multilevel Marketing company that is into online buying and selling among other services.<br> Anybody that is doing investment package or giving anybody money onbehalf of the company does that at His/Her own RISK.<br> 

											Olivereward .....The Fortune Creator!<br><br>

											Olivereward .....The Empowerment Vehicle!!<br><br>

											Olivereward .....Making Life Better!!!<br><br>

									
									</td>
								  </table>
								  
								</div>
								<div class="col-lg-6">
								  <table class='table table-bordered mybonustable table2'>
									<tr><th colspan='2' class='table-heading'><center style='font-size:1.5em'>My Bonus</center></th></tr>
										<tr><td>Current Stage</td><th><?php echo"$stage" ?></th></tr>
										<tr><td>TOTAL REFERAL BONUS EARNED(USD)</td><th><?php $formated_reward_amount_usd = number_format($total_reward_amount_usd,2); echo"$formated_reward_amount_usd" ?></th></tr>
										<tr><td>TOTAL REFERAL BONUS EARNED(NGN)</td><th><?php $formated_total_reward_amount = number_format($total_reward_amount, 2); echo"$formated_total_reward_amount" ?></th></tr>
										<tr><td>TOTAL BONUS EARNED(USD)</td><th><?php echo"$formated_all_bonus_total_usd" ?></th></tr>
										<tr><td>TOTAL BONUS EARNED(NGN)</td><th><?php echo"$formated_all_bonus_total" ?></th></tr>
										<tr><td>TOTAL AMOUNT WITHDRAWN(USD)</td><th><?php $formated_total_bonus_withdrawn_usd = number_format($total_bonus_withdrawn_usd, 2); echo"$formated_total_bonus_withdrawn_usd" ?></th></tr>
										
										<tr><td>TOTAL AMOUNT WITHDRAWN(NGN)</td><th><?php $formated_total_bonus_withdrawn = number_format($total_bonus_withdrawn, 2); echo"$formated_total_bonus_withdrawn" ?></th></tr>
										<tr><td>TOTAL AMOUNT TRANSFERED OUT(USD)</td><th><?php $formated_total_transfered_usd = number_format($total_transfered_usd, 2); echo"$formated_total_transfered_usd" ?></th></tr>
										<tr><td>TOTAL AMOUNT TRANSFERED OUT(NGN)</td><th><?php $formated_total_transfered = number_format($total_transfered, 2); echo"$formated_total_transfered" ?></th></tr>
										<tr><td>TOTAL WALLET BALANCE(USD)</td><th><?php echo"$formated_balance_usd";   ?></th></tr>
										<tr><td>TOTAL WALLET BALANCE(NGN)</td><th><?php echo"$formated_balance" ?></th></tr>
								  </table>
								  
								  <?php
								  
									if($starter_active == 1){
										
										?>
								  <table class='table table-bordered mydetailstable table3'  style='margin-top:2em;'>
									<tr><th  class='table-heading' style='background-color:red'><center style='font-size:1.2em'>Stage<center></th><th  class='table-heading' style='background-color:red'><center style='font-size:1.2em'>Stage Reward<center></th><th  class='table-heading' style='background-color:red'><center style='font-size:1.2em'>Stage Cash Bonuses<center></th></tr>
									<?php
										if($starter_active==1){
										//	echo"$outputstarter";
										}
									if($stage1_active == 1){
										echo"$output1";
									}
									if($stage2_active == 1){
										echo"$output2";
									}
									if($stage3_active == 1){
										echo"$output3";
									}
									if($stage4_active == 1){
										echo"$output4";
									}
									if($stage5_active == 1){
										echo"$output5";
									}
									if($stage6_active == 1){
										echo"$output6";
									}
									?>	
								  </table>
								  <?php
									}
									?>
								  
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
