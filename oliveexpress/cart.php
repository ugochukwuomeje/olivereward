<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
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