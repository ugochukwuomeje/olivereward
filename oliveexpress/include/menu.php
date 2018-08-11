<?php

$loggedin = 0;
$whishlistquantity = 0;
if(isset($_SESSION['loggedin']))
{
	$loggedin = 1;
	$firstname = $_SESSION['f_name'];
	$lastname = $_SESSION['l_name'];
	
	$email = $_SESSION['email'];
}



$cartquantity = 0;

if(isset($_POST['submit1'])){
	if(!empty($_COOKIE['item'])){
			 if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
				{	
				
				foreach($_COOKIE['item'] as $name => $value)
					{
						$cartquantity = $cartquantity + 1;
					}
					$cartquantity = $cartquantity + 1;
				}

	}
}
else{
	
	if(!empty($_COOKIE['item'])){
		 if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
			{	
			
			foreach($_COOKIE['item'] as $name => $value)
				{
					$cartquantity = $cartquantity + 1;
				}
			}

}
               
}


?>

<div class="header">
	<div class="header_top">
		<div class="container">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=""/></a>
			</div>
			<ul class="shopping_grid">
			
				<?php
				
					if($loggedin == 1){
						
						echo"<a href='#' style='padding-top:10px; color:white'><li> Welcome: $firstname $lastname</li></a>";
					  echo"<a href='logout.php'><li>Logout</li></a>";
					  //
					}else{
					  echo"<a href='login.php'><li>Login</li></a>
						   <a href='register.php'><li>Join now</li></a>";
					}
				?>
			      
			      <a href="cart.php"><li><span class="m_1">Shopping Bag</span>&nbsp;&nbsp;<?php echo"$cartquantity " ?> &nbsp;<img src="images/bag.png" alt=""/></li></a>
			      <div class="clearfix"> </div>
			</ul>
		    <div class="clearfix"> </div>
		</div>
	</div>
	<div class="h_menu4"><!-- start h_menu4 -->
		<div class="container">
				<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
					<li class="active"><a href="index.php" data-hover="Home">Home</a></li>
					<?php
						if($loggedin == 1){
						
					echo"<li><a href='client2/home.php' data-hover='Careers'>Dashboard</a></li>";
						}
					?>
					<li><a href="about.php" data-hover="About Us">ABOUT US</a></li>
					<li><a href="compensation.php" data-hover="About Us">COMPENSATION PLAN</a></li>
					<li><a href="faq.php" data-hover="Contact Us">Faq</a></li>
					<li><a href="contact.php" data-hover="Contact Us">CONTACT US</a></li>
					
				 </ul>
				 <script type="text/javascript" src="js/nav.js"></script>
	      </div><!-- end h_menu4 -->
     </div>
</div>