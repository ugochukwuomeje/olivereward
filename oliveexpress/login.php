<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<?php
include("include/header.html");
?>

</head>
<body>
<?php

include("include/menu.php");
include("connection/db.php");
?>
<div class="about">
  <div class="container">
         <div class="register">
			   <div class="col-md-6 login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="register.php">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form id='form2'>
				  <div>
					<span>Username<label>*</label></span>
					<input type="text" name='username' > 
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" name='password' style='width:96%; border: 1px solid #EEE;
	outline-color:#FF5B36; font-size: 1em; padding: 0.5em;'> 
				  </div>
				  <a class="forgot" href="lostpassword.php">Forgot Your Password?</a>
				  <input type="submit" value="Login" id='login_button'><div></div>
				  <img src="images/ajax-loader.gif" id="login_loader" ></img>
			    </form>
			   </div>
				  
			   <div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="footer_bg">
</div>
<?php
include("include/footer.php");
?>
</body>
</html>		