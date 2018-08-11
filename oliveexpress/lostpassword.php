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
			   
			   <div class="col-md-11 login-right">
			  	<h3>ENTER YOUR USERNAME</h3>
				<form id='form_lostpassword'>
				  <div>
					<input type="text" name='username' > 
				  </div>				  				  
				  <input type="submit" value="submit" id='lost_password'><div></div>
				  <img src="images/ajax-loader.gif" id="losspassword_loader" ></img>
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