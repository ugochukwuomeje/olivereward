<?php
session_start();

if(!isset($_SESSION['email']))
{
	header("Location:login.php");
}

$email = $_SESSION['email'];
$username = $_SESSION['username'];
?>
<!DOCTYPE HTML>
<html>
<head>
<?php
include("include/header.php");
include("connection/db.php");
if(!empty($_COOKIE['item'])){
	if(is_array($_COOKIE['item'])){
		foreach($_COOKIE['item'] as $name1 => $value)
		{
			if(isset($_GET["delete"]))
			{  
				$name1 = $_GET['delete'];
				setcookie("item[$name1]", "", time()- 1800);
				?>
				<script type="text/javascript">
					window.location.href = 'checkout.php';				
				</script>
				<?php
			}
		}
	}
}
?>
<style>
.tablehead {background-color:#DC143C;
color:white;}
.form-control{
	
	border-radius:0px;
	margin-bottom:15px;
}
</style>
</head>
<body>
<?php

include("include/menu.php");


?>
<div class="column_center">
  <div class="container">
	<div class="search">
	  <div class="stay">Search Product</div>
	  <div class="stay_right">
		  <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
		  <input type="submit" value="">
	  </div>
	  <div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
  </div>
</div>
<div class="about">

<div class="register-req">
				<div style='background-color:#DC143C; color:white; padding:8px;'><h3 >Please review your delivery address  to ensure it is correct</h3></div>
			</div><!--/register-req-->

			<div class="container shopper-informations" style='margin-top:20px'>
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p><b>Shopper Information</b></p>
							<?php
										///////////////////////////////////this gets the user profile informations
										$sql_users = "SELECT * FROM users WHERE email = '$email'";
										$query_users = $con->query($sql_users);
										$row_users = mysqli_fetch_array($query_users);
										
										/////////////////////////////////this gets the user wallet information
										$sql_wallet_info = "SELECT * FROM wallet WHERE id = '$username'";
										$query_wallet_info = $con->query($sql_wallet_info);
										$row_wallet_info = mysqli_fetch_array($query_wallet_info);
										$wallet_balance = $row_wallet_info['amount'];
									?>
									
							<form style='margin-top:2em'>
								<label for='first_name'>First name </label>
								<input type="text" id='first_name' class='form-control' value='<?php echo$row_users["first_name"] ?>'>
								<label for='last_name'>Last name</label>
								<input type="text" id='last_name' class='form-control' value='<?php  echo$row_users["last_name"]  ?>' >
								<label for=''>Wallet Balance</label>
								<input type="text" id='last_name' class='form-control' value='<?php  echo$wallet_balance  ?>' >
							</form>
						</div>
					</div>
					<div class="col-sm-5" >
						<div class="bill-to">
							<p><b>Delivery Address</b></p>
							<div class="form-one">
								<form>
									<?php
										$sql_checkout = "SELECT * FROM billing_address WHERE referalid = '$username'";
										$query_checkout = $con->query($sql_checkout);
										$row_check = mysqli_fetch_array($query_checkout);
										
										$_SESSION['order_id'] = $row_check["email"];
									?>
																	
									<input type="text" class='form-control' value='<?php echo$row_check["country"]?>' readonly>
									<input type="text" class='form-control' value='<?php echo$row_check["state"]?>' readonly>
									<input type="text" class='form-control' value='<?php echo$row_check["city"]?>' readonly>
									<input type="text" class='form-control' value='<?php echo$row_check["address1"]?>' readonly>
									<input type="text" class='form-control' value='<?php echo$row_check["address2"]?>' readonly>
									<input type="text" class='form-control' value='<?php echo$row_check["mobile"]?>' readonly>
									
								</form>
							</div>
							<div class="form-two" style='margin-top:2em'>
								<p><b>Update Deivery Address</b></p>
								<form style='margin-top:1em' method='POST'>									
																	
									<input type="text" class='form-control' name='f_name' placeholder="First Name" required>
									<input type="text" class='form-control' name='l_name' placeholder="last Name" required>
									<input type="text" class='form-control' name='state' placeholder="state" required>
									<input type="text" class='form-control' name='town' placeholder="town" required>
									<input type="text" class='form-control' name='address' placeholder="Address" required>
									<input type="text" class='form-control' name='mobile' placeholder="mobile no" required>
									
									<button type="submit"  role='button' style='margin-top:1em; margin-bottom:1em' name='update1' class="btn btn-warning">update</button>
								</form>
							</div>
						</div>
					</div>
					<?php
						if(isset($_POST['update1']))
						{
							$email = $_SESSION['email'];
							
							$first_name = $_POST['f_name'];
							$last_name = $_POST['l_name'];
							$state = $_POST['state'];
							$town = $_POST['town']; 
							$address1 = $_POST['address1'];
							$address2 = $_POST['address2'];
							$mobile = $_POST['mobile'];
							$sql_update = "UPDATE billing_address SET first_name = '$first_name', last_name = '$last_name',
							state = '$state', town = '$town', address1 = '$address1', address2 = '$address2', mobile = '$mobile'
							WHERE email = '$email'";
							$query_update = $con->query($sql_update);
							 if($query_update){
								 
								 
								 ?>
								   <script>
									alert("Billing address successfuly saved");
								   </script>
								 <?php
							 }
						}
								 $query_getorderid = $con->query("SELECT * FROM billing_address WHERE email = '$email'");
								 $row_getorderid = mysqli_fetch_array($query_getorderid);
								 $_SESSION["order_id"] = $row_getorderid['id'];
								 
								 
						?>
					<div class="col-sm-4">
						<div class="order-message">
							<p><b>Shipping Order</b></p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16" cols='40'></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
			<div style='background-color:#DC143C; color:white; padding:8px;'>
				<h3><b>Review & Payment</b></h3>
			</div><br>

 <div class="container">
			<div class="about_top">
			      <!----this section is for ---------------->
				  
				  <div class="table-responsive cart_info">
				<table class="table table-condensed">
				<?php
						$d = 0;
					if(!empty($_COOKIE['item'])){
				
								 if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
						{	
							$d = $d + 1;
						}
			}
			if($d == 0)
			{
				echo"<div style='background-color:#DC143C; color:white'><h2><center>no record in the database</center></h2></div><br><br>";
				
				
			}else{
				?>
					<thead class='tablehead'>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					
						foreach($_COOKIE['item'] as $name => $values)
			{
				$values11 = explode("__",$values);
					$name1 = $values11['5'];
					?>
						
						<tr>
							<td class="cart_product">
								<a href=""><img src='client2/clientoperation/<?php echo"$values11[0]" ?>' width='150' height='132' alt=""></a>
							</td>
							<td class="cart_name" style='padding-top:50px'>
								<p style='font-size:1.5em'><?php echo"$values11[1]" ?></p>
								
							</td>
							<td class="cart_price" style='padding-top:50px'>
								<p>N<?php echo"$values11[2]" ?></p>
							</td>
							<td class="cart_quantity" style='padding-top:50px'>
								<div class="cart_quantity_button">
									<a class="cart_quantity_up"  id='<?php echo"$name1";?>' href=""> + </a>
									<input class="cart_quantity_input" type="text" id='<?php echo"qty$name1";?>' name="quantity" value='<?php echo"$values11[3]" ?>' autocomplete="off" size="3" readonly>
									<a class="cart_quantity_down" id='<?php echo"$name1";?>' href=""> - </a>
								</div>
							</td>
							<td class="cart_total" style='padding-top:50px'>
								<p class="cart_total_price" id='<?php echo"cart_price$name1";?>' ><?php echo"$values11[4]" ?></p>
							</td>
							
							<td class="cart_delete" style='padding-top:50px'>
								<a class="cart_quantity_delete" href="cart.php?delete=<?php echo$name1;?>"><img src='images/delete.png'></a>
							</td>
						</tr>
					    
					<?php
					
			}
			?>
							

						
						
					</tbody>
				<?php
				
			}
				if(!empty($_COOKIE['item'])){
				if(is_array($_COOKIE['item'])){
					$tot = 0;
					foreach($_COOKIE['item'] as $name => $values)
			{
				$values11 = explode("__",$values);
				$tot = $tot + $values11[4];
			}
				
			echo"<tr><th></th><th></th><th></th><th style='font-size:1.5em'>Total</th><th style='font-size:1.5em' id='total_price'>N$tot</th></tr>";
			$_SESSION['pay'] = $tot;
			}
				}
			?>
					
					
				</table>
	
			</div>
				  
			    <div class="clearfix">
					<center style='margin-top:-2em'>
						<a href='payment.php'><input type='button' class='btn btn-lg btn-warning' value='Make Payment'></a>
					</center>
				</div>
			</div>  
			<div class="about_bottom">
					 
				<div class="clearfix"> </div>
			</div>
   </div>
  </div>
</div>
<?
include("include/footer.php");
?>
</body>
</html>		