<?php
session_start();
if(!isset($_SESSION['adminloggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}


include("../connection/db.php");


?>



<?php
include("include/header.php");
?>
<style>
.table-heading{
		background-color:#DC143C;
		color:white;
		font-size:0.7em;
		padding:0.5em;
		height:1.5em;
	}
</style>
<body>

        <!-- Left Panel -->
<?php
include("include/leftmenu.php");
?>

    

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
			include("include/topmenu.php");
			$pagetitle = "REGISTERED MEMBERS";
			
			///////////////////////////get the exchange rate
			$query_exchange_rate = $con->query("SELECT * FROM dollarrate ");
			$row_rate = mysqli_fetch_array($query_exchange_rate);
			
			$exchange_rate = $row_rate['rate'];
			
			$query_regamount = $con->query("SELECT * FROM referalbonus");
			$row_regamount = mysqli_fetch_array($query_regamount);
			$reg_amount =  $row_regamount['registration_amount'];
			
			
			$query_registered_members = $con->query("SELECT * FROM users WHERE id > '7'");
			$number_of_registered_members = $query_registered_members->num_rows;
			
			$total_amount = $number_of_registered_members * $exchange_rate;
			$formated_total = number_format($total_amount,2);
			
			////////////////////////////////////////////////////////////////////////////
			$total_amount_naira = $reg_amount * $number_of_registered_members;
			$formated_total_amount_naira = number_format($total_amount_naira,2);
			///////////////////////////////////////////////////////////////////
			
			
			
			/////////////////////////////////////////////////////////get the total withdrawal 
			$query_sum_paid = $con->query("SELECT SUM(amount_withdrawn) AS value_sum FROM account WHERE pay_status ='1' and type = '1'");
			
			if(!$query_sum_paid)
			{
				echo"the error is: $con->error";
			}
			$row_sum_paid = mysqli_fetch_array($query_sum_paid); 
			$sum_paid = $row_sum_paid['value_sum'];
			$dollar_sum_paid = $sum_paid/$exchange_rate;
			$formated_sum_paid = number_format($dollar_sum_paid,2);
			
			//////////////////////////////////////total sum paid in naira
			$formated_total_paid_naira = number_format($sum_paid,2);
			
			///////////////////the balance in usd
			$balance_remaining = $total_amount - $dollar_sum_paid;
			$formated_balance = number_format($balance_remaining,2);
			
			//////////////////////////////balance in Naira
			$balance_remaining = $total_amount - $dollar_sum_paid;
			$formated_balance = number_format($balance_remaining,2);
		?>
        <!-- Header-->
		
        
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-color:white; padding-top:1em;'>
					
						<div class="col-xl-3 col-lg-6">
							<div class="card">
								<div class="card-body">
									<div class="stat-widget-one">
										<div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
										<div class="stat-content dib">
											<div class="stat-text">Population</div>
											<div class="stat-digit" ><?php 
											
											echo"$number_of_registered_members" ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card">
								<div class="card-body">
									<div class="stat-widget-one">
										<div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
										<div class="stat-content dib">
											<div class="stat-text">Total Deposite</div>
											<div class="stat-digit" style='font-size:0.6em'>$<?php echo"$formated_total (N $total_amount_naira)"; ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card">
								<div class="card-body">
									<div class="stat-widget-one">
										<div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
										<div class="stat-content dib">
											<div class="stat-text">Total Withdrawal</div>
											<div class="stat-digit">$<?php echo"$formated_sum_paid" ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="stat-widget-one">
										<div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
										<div class="stat-content dib">
											<div class="stat-text">Balance</div>
											<div class="stat-digit">$<?php echo"$formated_balance" ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
<?php

$query_chick_current_level = $con->query("SELECT * FROM currentlevel WHERE mycurrentlevel = '0'");
$total_chick = $query_chick_current_level->num_rows;

$query_dove_current_level = $con->query("SELECT * FROM currentlevel WHERE mycurrentlevel = '1'");
$total_dove = $query_dove_current_level->num_rows;

$query_indigo_current_level = $con->query("SELECT * FROM currentlevel WHERE mycurrentlevel = '2'");
$total_indigo = $query_indigo_current_level->num_rows;

$query_patridge_current_level = $con->query("SELECT * FROM currentlevel WHERE mycurrentlevel = '3'");
$total_patridge = $query_patridge_current_level->num_rows;

$query_flamingo_current_level = $con->query("SELECT * FROM currentlevel WHERE mycurrentlevel = '4'");
$total_flamingo = $query_flamingo_current_level->num_rows;

$query_peacock_current_level = $con->query("SELECT * FROM currentlevel WHERE mycurrentlevel = '5'");
$total_peacock = $query_peacock_current_level->num_rows;

$query_eagle_current_level = $con->query("SELECT * FROM currentlevel WHERE mycurrentlevel = '6'");
$total_eagle = $query_eagle_current_level->num_rows;

////////////////////////////////////////////////////////////total qualified for gift
$query_starter_reward = $con->query("SELECT * FROM starter_rewards ");
$total_starter = $query_starter_reward->num_rows;

$query_stage1_reward = $con->query("SELECT * FROM stage1_reward ");
$total_stage1 = $query_stage1_reward->num_rows;

$query_stage2_reward = $con->query("SELECT * FROM stage2_reward ");
$total_stage2 = $query_stage2_reward->num_rows;

$query_stage3_reward = $con->query("SELECT * FROM stage3_reward ");
$total_stage3 = $query_stage3_reward->num_rows;

$query_stage4_reward = $con->query("SELECT * FROM stage4_reward ");
$total_stage4 = $query_stage4_reward->num_rows;

$query_stage5_reward = $con->query("SELECT * FROM stage5_reward ");
$total_stage5 = $query_stage5_reward->num_rows;

$query_stage6_reward = $con->query("SELECT * FROM stage6_reward ");
$total_stage6 = $query_stage6_reward->num_rows;

////////////////////////////////////////////////////////////total qualified for gift and paid
$query_starter_reward_paid = $con->query("SELECT * FROM starter_rewards WHERE paid = '1'");
$total_starter_paid = $query_starter_reward_paid->num_rows;
$total_starter_notpaid = $total_starter - $total_starter_paid;


$query_stage1_reward_paid = $con->query("SELECT * FROM stage1_reward WHERE paid = '1'");
$total_stage1_paid = $query_stage1_reward_paid->num_rows;
$total_stage1_notpaid = $total_stage1 - $total_stage1_paid;


$query_stage2_reward_paid = $con->query("SELECT * FROM stage2_reward WHERE paid = '1'");
$total_stage2_paid = $query_stage2_reward_paid->num_rows;
$total_stage2_notpaid = $total_stage2 - $total_stage2_paid;

$query_stage3_reward_paid = $con->query("SELECT * FROM stage3_reward WHERE paid = '1'");
$total_stage3_paid = $query_stage3_reward_paid->num_rows;
$total_stage3_notpaid = $total_stage3 - $total_stage3_paid;

$query_stage4_reward_paid = $con->query("SELECT * FROM stage4_reward WHERE paid = '1'");
$total_stage4_paid = $query_stage4_reward_paid->num_rows;
$total_stage4_notpaid = $total_stage4 - $total_stage4_paid;

$query_stage5_reward_paid = $con->query("SELECT * FROM stage5_reward WHERE paid = '1'");
$total_stage5_paid = $query_stage5_reward_paid->num_rows;
$total_stage5_notpaid = $total_stage5 - $total_stage5_paid;

$query_stage6_reward_paid = $con->query("SELECT * FROM stage6_reward WHERE paid = '1'");
$total_stage6_paid = $query_stage6_reward_paid->num_rows;
$total_stage6_notpaid = $total_stage6 - $total_stage6_paid;
?>						



						
						<div class='col-lg-4'>
							<table class='table table-bordered '>
								<tr class='table-heading'><th>Stage</th><th>current Population</th><tr>
								<tr><th>Chick</th><td><?php echo"$total_chick" ?></td><tr>
								<tr><th>Dove</th><td><?php echo"$total_dove" ?></td><tr>
								<tr><th>Indigo</th><td><?php echo"$total_indigo" ?></td><tr>
								<tr><th>Patridge</th><td><?php echo"$total_patridge" ?></td><tr>
								<tr><th>Flamingo</th><td><?php echo"$total_flamingo" ?></td><tr>
								<tr><th>Peacock</th><td><?php echo"$total_peacock" ?></td><tr>
								<tr><th>Eagle</th><td><?php echo"$total_eagle" ?></td><tr>
							</table>
						</div>
						<div class='col-xl-8 col-lg-8'>
							<table class='table table-bordered'>
								<tr class='table-heading'><th>Stage</th><th>Qualified</th><th>Paid</th><th>Not Paid</th><tr>
								<tr><th>Chick</th><td><?php echo"$total_starter" ?></td><td>---</td><td>---</td><tr>
								<tr><th>Dove</th><td><?php echo"$total_stage1" ?></td><td><?php echo"$total_stage1_paid" ?></td><td><?php echo"$total_stage1_notpaid" ?></td><tr>
								<tr><th>Indigo</th><td><?php echo"$total_stage2" ?></td><td><?php echo"$total_stage2_paid" ?></td><td><?php echo"$total_stage2_notpaid" ?></td><tr>
								<tr><th>Patridge</th><td><?php echo"$total_stage3" ?></td><td><?php echo"$total_stage3_paid" ?></td><td><?php echo"$total_stage3_notpaid" ?></td><tr>
								<tr><th>Flamingo</th><td><?php echo"$total_stage4" ?></td><td><?php echo"$total_stage4_paid" ?></td><td><?php echo"$total_stage4_notpaid" ?></td><tr>
								<tr><th>Peacock</th><td><?php echo"$total_stage5" ?></td><td><?php echo"$total_stage5_paid" ?></td><td><?php echo"$total_stage5_notpaid" ?></td><tr>
								<tr><th>Eagle</th><td><?php echo"$total_stage6" ?></td><td><?php echo"$total_stage6_paid" ?></td><td><?php echo"$total_stage6_notpaid" ?></td><tr>
							</table>
						</div>
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
