<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?
if(empty($_GET['username'])){
	header("location: index.php");
}

if(empty($_GET['id'])){
	header("location: index.php");
}
?>
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


$username = $_GET['username'];
$id = $_GET['id'];



?>
<div class="about">
  <div class="container">
         <div class="register">
			   
			   <div class="col-md-11 login-right">
			  	<h3>CHANGE PASSWORD</h3>
				<form id='form_lostpassword'>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" name='password' style='width:96%; border: 1px solid #EEE;
	outline-color:#FF5B36; font-size: 1em; padding: 0.5em;'> 
				  </div>
				  <div>
					<span>Retype Password<label>*</label></span>
					<input type="password" name='retypepassword' style='width:96%; border: 1px solid #EEE;
	outline-color:#FF5B36; font-size: 1em; padding: 0.5em;'> 
					<input type="hidden" name='id' value='<?php echo"$id" ?>'> 
					<input type="hidden" name='username'value='<?php echo"$username" ?>' > 
				  </div>				  
				  <input type="submit" value="submit" id='btn_changepassword'><div></div>
				  <img src="images/ajax-loader.gif" id="changepassword_loader" ></img>
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