<?php
include("connection/db.php");

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
	header("location:register.php");
}

if(empty($_POST['state'])){
	
	?>
	<script>
		alert("please select state");
		window.location.href = "register.php";
	</script>
	<?php
}



$sponsorid = $_POST['sponsor'];
$upliner = $_POST['upliner'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$country = $_POST['country'];
$state = $_POST['state'];


$query_country = $con->query("SELECT * FROM countries WHERE id = '$country'");
$row_country = mysqli_fetch_array($query_country);
$country = $row_country['name'];

$city = $_POST['city'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
////////////////////////////////date of birth section
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];

$payeename = $_POST['payeename'];  
$accountnumber = $_POST['accountnumber'];
$accountname = $_POST['accountname'];
$bank = $_POST['bank'];

$payoption = $_POST['payoption'];
$username = $_POST['username'];
$password = $_POST['password'];

$payeepassword = $_POST['payeepassword'];

$retypepassword = $_POST['retypepassword'];
$transactionpassword = $_POST['transactionpassword'];
$confirmtransactionpassword = $_POST['confirmtransactionpassword'];


?>

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<style>
	.row div
	{
		padding-top:1em;
	}
	.upliner, .sponsorid, .username
	{
		text-transform: uppercase;
	}
</style>
<?php
include("include/header.php");
?>

</head>
<body>
<?php

include("include/menu.php");

?>
<div class="about">
  <div class="container">
      <div class="register">
		  	  <form> 
				    <div class='row'>
						<div class='col-sm-6 col-sm-push-3'>
							<h3 style='color:#df1f26'>PERSONAL INFORMATION</h3>
							<div>
								 <span>SPONSOR ID<label>*</label></span>
								 <input type="text" name='sponsor' value='<?php echo"$sponsorid" ?>' required class='form-control sponsorid' readonly> 
							</div>
							<div>
								<span>UPLINER<label>*</label></span>
								<input type="text" name='upliner' value='<?php echo"$upliner" ?>' required class='form-control upliner' readonly> 
							</div>
							<div>
								<span>FIRST NAME<label>*</label></span>
								<input type="text" name='firstname' value='<?php echo"$firstname" ?>' required class='form-control' readonly> 
							</div>
							<div>
								 <span>LAST NAME<label>*</label></span>
								 <input type="text" name='lastname' value='<?php echo"$lastname" ?>' required class='form-control' readonly> 
							 </div>
							 <div>
								 <div>
								 <span>COUNTRY<label>*</label></span>
								 <input type="text" name='country' value='<?php echo"$country" ?>' required class='form-control' readonly> 
							 </div>
							 </div>
							 <div>
								 <span>STATE<label>*</label></span>
								 <input type="text" name='state' value='<?php echo"$state" ?>' required class='form-control' readonly> 
							 </div>
							 <div>
									<span>CITY<label>*</label></span>
									<input type="text" name='city' value='<?php echo"$city" ?>' required class='form-control' readonly> 
							 </div>
							 <div>
								 <span>EMAIL<label>*</label></span>
								 <input type="text" name='email' value='<?php echo"$email" ?>' required class='form-control' readonly> 
							 </div>
							 <div>
								 <span>MOBILE<label>*</label></span>
								 <input type="text" name='mobile' value='<?php echo"$mobile" ?>' required class='form-control' readonly> 
							 </div>
							 <div>
								 <span>GENDER<label>*</label></span>
								 <input type="text" name='gender' value='<?php echo"$gender" ?>' required class='form-control' readonly>
							 </div>
							 <div>
								 <span>ADDRESS 1<label>*</label></span>
								 <input type="text" name='address1' value='<?php echo"$address1" ?>' required class='form-control' readonly> 
							 </div>
							 <div>
								 <span>ADDRESS 2<label>*</label></span>
								 <input type="text" name='address2' value='<?php echo"$address2" ?>' required class='form-control' readonly> 
							 </div>

							 <div>
							 <div class='col-sm-3' style='margin-left:-1em'>
									<span ><label>DATE OF BIRTH</label></span>
							</div>
								 
								 <div class='col-sm-3' style='margin-left:-0.6em'>
									
										<span ><label>YEAR</label></span>
										<input type="text" name='year' value='<?php echo"$year" ?>' required class='form-control' readonly> 

								 </div>
								 <div class='col-sm-3'>
									<span ><label>MONTH</label></span>
									<input type="text" name='month' value='<?php echo"$month" ?>' required class='form-control' readonly> 
								 </div>
								 <div class='col-sm-3'>
										<span ><label>DAY</label></span>
										<input type="text" name='day' value='<?php echo"$day" ?>' required class='form-control' readonly> 
								 </div><br><br>
							 

							 <div>
								 <span><label>PAYEE NAME*</label></span>
								 <input type="text" name='payeename' value='<?php echo"$payeename" ?>' required class='form-control' readonly> 
							 </div>
							 </div><br>
							 <div class='payee_div'  >
								<input type="hidden" name='payeepassword' value='<?php echo"$payeepassword" ?>'  style='display:none'>
							 </div>
							 
								<h3 style='margin-top:1.5em; color:#df1f26'>ACCOUNT INFORMATION</h3>
							<div>
										 <span>ACCOUNT NUMBER<label>*</label></span>
										 <input type="text" name='accountnumber' value='<?php echo"$accountnumber" ?>' required class='form-control' readonly> 
							</div>
							<div>
										<span>BANK NAME<label>*</label></span>
										<input type="text" name='bank' value='<?php echo"$bank" ?>' required class='form-control' readonly> 
							</div>
							<div>
										<span>ACCOUNT NAME<label>*</label></span>
										<input type="text" name='accountname' value='<?php echo"$accountname" ?>' required class='form-control' readonly> 
							</div>
							<div>
									 <span>PAY OPTION<label>*</label></span>
									 <input type="text" name='payoption' value='<?php echo"$payoption" ?>' required class='form-control' readonly> 

							 </div>
									
							 <div>
										<span>USERNAME<label>*</label></span>
										<input type="text" name='username' value='<?php echo"$username" ?>' required class='form-control username' readonly>
							 </div>
							
							 <div>
										<span>PASSWORD<label>*</label></span>
										<input type="password" name='password' value='<?php echo"$password" ?>' class='form-control' required readonly>
							 </div>
							 <div>
										<span>CONFIRM PASSWORD<label>*</label></span>
										<input type="password" name='retypepassword' value='<?php echo"$retypepassword" ?>' required class='form-control' readonly>
							 </div>
							 <div>
										<span>TRANSACTION PASSWORD<label>*</label></span>
										<input type="password" name='transactionpassword' value='<?php echo"$transactionpassword" ?>' class='form-control' required readonly>
							 </div>
							 <div>
										<span>CONFIRM TRANSACTION PASSWORD<label>*</label></span>
										<input type="password" name='confirmtransactionpassword' value='<?php echo"$confirmtransactionpassword" ?>' class='form-control' required readonly>
							 </div>
							 
							 <div>
									<div class='col-sm-3'>	
										<input type="checkbox" style='width:1em; height:1em' name='termsandcondition' class='' required>
									</div>
									<div class='col-sm-7 col-sm-pull-2'>
										I Have read through and Agreed With the terms and conditions of the company
									</div>
							 </div>
								 
									<input type="submit" value="submit" id='signup_button' style='background-color:#df1f26; border:none; color:white; outline:none; font-size: 1em; padding: 0.5em 1.5em; margin-top:1em; margin-bottom:1em'>
								   <img src="images/ajax-loader.gif" id="signup_loader" ></img>
								   </div>
								   
							   </form>
							   
				   <div>
				</div>
		   </div>
	</div>
</div>
<?php
include("include/footer.php");
?>
</body>
</html>		