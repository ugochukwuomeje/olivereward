<?php
session_start();

include("connection/db.php");

////////////////////////////////////////////////////////// give credit wallet

$order_id = uniqid();
$buyer = $_SESSION['username'];

//////////////////////////////////////////////get the wallet the balance
$sql_wallet = "SELECT * FROM wallet WHERE id = '$username'";
$query_wallet_balance = $con->query($sql_wallet);

$row_query_balance = mysqli_fetch_array($query_wallet_balance);
$buyer_wallet_balance = $row_query_balance['amount'];

$date = time();
$formateddate = date('m/d/Y', $date);
foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
{
	///
    $values11 = explode("__", $value);
	$seller = $values11[6];   /////////////////////////seller username
	$productimage = $values11[0];  ////////////////////the product image
	$productname = $values11[1];///////////////////////the product name
	$productprice = $values[2];//////////////////////// the product price
	$productqty = $values11[3];////////////////////////the product qty
	$producttotal = $values11[4]; //////////////////////the product total price
	
	
	//////////////////////////////////////////////////////////////////////////////store the product in the table
    $sql_store_into_table = "INSERT INTO confirm_order_product (buyer, seller, order_id, product_name, product_price, product_qty, product_image, product_total, date, status)VALUES('$buyer', '$seller', '$order_id', '$productname', '$productprice', '$productqty', '$productimage', '$producttotal', '$formateddate', '0')";
	
	$query_store_into_table = $con->query($sql_store_into_table);
	
	if(!$query_store_into_table)
	{
		?>
			<script type='text/javascript'>	
				alert('CANNOT MAKE PAYMENT');
				window.location = "payment.php";
			</script>
		<?php
	}
}

////////////////////////////////get the billing address
$sql_get_address = "SELECT * FROM billing_address WHERE referalid = '$username'";
$query_get_address = $con->query($sql_get_address);
$row_get_address = mysqli_fetch_array($query_get_address);



//////////////////////////////////////////////install into the billing address
$sql_billing_address = "INSERT INTO confirm_order_address (uniquueid, firstname, lastname, email, country, state, town, mobile, address1, address2 )VALUES()";


///////////////////////////////////////store confirm order address
$sql_address = "SELECT * FROM " 



?>
<!DOCTYPE HTML>
<html>
<head>
<?php
include("include/header.php");
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
					window.location.href = 'cart.php';				
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
 <div class="container">
			<div class="about_top">
			      <!----this section is for ---------------->
				  <center><h3>Invoice</h3></center>
				  <div class="table-responsive cart_info">
				<table class="table table-condensed">
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
					</tbody>
				</table>
	
			</div>
				  
			    <div class="clearfix">
					<center style='margin-top:-2em'>
						<a href='checkout.php'><input type='button' class='btn btn-lg btn-warning' value='checkout'></a>
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