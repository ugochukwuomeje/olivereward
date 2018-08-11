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
	.upliner, .sponsorid, .username, .email
	{
		text-transform: lowercase;
	}
</style>
<?php
include("include/header.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php

include("include/menu.php");
include("connection/db.php");
?>
<div class="about">
  <div class="container">
      <div class="register">
		  	  <form method='POST' action='preview.php'> 
				    <div class='row'>
						<div class='col-sm-6 col-sm-push-3'>
							<h3 style='color:#df1f26'>PERSONAL INFORMATION</h3>
							<div>
								 <span>SPONSOR ID<label>*</label></span>
								 <input type="text" name='sponsor' id='sponsor' required class='form-control sponsorid'>
								 <img src="images/search.gif" id="sponsor_loader" class='search' style='height:50px; width:50px;'></img>
								  <span style='color:red'> <span class='displaysponsor_error'></span></span>
								  <span style='color:green'> <span class='displaysponsor_name'></span></span>
							</div>
							<div>
								<span>UPLINER<label>*</label></span>
								<input type="text" name='upliner' id='upliner' required class='form-control upliner'> 
								<img src="images/search.gif" id="upliner_loader" class='search' style='height:50px; width:50px;'></img>
								<span style='color:red'> <span class='displayupliner_error'></span></span>
								<span style='color:green'> <span class='displayupliner_name'></span></span>
							</div>
							<div>
								<span>FIRST NAME<label>*</label></span>
								<input type="text" name='firstname' required class='form-control'> 
							</div>
							<div>
								 <span>LAST NAME<label>*</label></span>
								 <input type="text" name='lastname' required class='form-control'> 
							 </div>
							 <div>
								 <span>COUNTRY<label>*</label></span>
								 <select name="country"  class="country form-control">
										<option selected="selected">--Select Country--</option>
											 <?php
												$query = "SELECT * FROM countries";
												$run_query = mysqli_query($con,$query);
												while($row = mysqli_fetch_array($run_query))
												{
													?>
													<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
													<?php
												} 
											?>
									   </select>
							 </div>
							 <div>
								 <span>STATE<label>*</label></span>
								 <input type="text" name='state' id='state' required class='form-control'> 
								 
								 
							 </div>
							 <div>
									<span>CITY<label>*</label></span>
									<input type="text" name='city' required class='form-control'> 
							 </div>
							 <div>
								 <span>EMAIL<label>*</label></span>
								 <input type="text" name='email' required class='form-control email'> 
							 </div>
							 <div>
								 <span>MOBILE<label>*</label></span>
								 <input type="text" name='mobile' required class='form-control'> 
							 </div>
							 <div>
								 <span>GENDER<label>*</label></span>
								 <select name="gender"  class="gender form-control">
									<option value="MALE">MALE</option>
									<option value="FEMALE">FEMALE</option>
							     </select>
							 </div>
							 <div>
								 <span>ADDRESS 1<label>*</label></span>
								 <input type="text" name='address1' required class='form-control'> 
							 </div>
							 <div>
								 <span>ADDRESS 2<label>*</label></span>
								 <input type="text" name='address2' required class='form-control'> 
							 </div>

							 <div>
							 <div class='col-sm-3' style='margin-left:-1em'>
									<span ><label>DATE OF BIRTH</label></span>
							</div>
								 
								 <div class='col-sm-3' style='margin-left:-0.6em'>
									
										<select name="year"  class="country form-control ">
										<option value="selecte">YYYY</option>
										<?php
										
											$thisyear = date('Y');
											$useyear = $thisyear - 18;
											$stopyear = $useyear - 70;
											for($a = $useyear; $a>$stopyear; $a--)
											{
												echo"<option value='$a'>$a</option>";
											}
										?>
									   </select>
								 </div>
								 <div class='col-sm-3'>
									
										<select name="month"  class="country form-control">
										<option selected="JAN">JAN</option>
										<option selected="FEB">FEB</option>
										<option selected="MAR">MAR</option>
										<option selected="APR">APR</option>
										<option selected="MAY">MAY</option>
										<option selected="JUN">JUN</option>
										<option selected="JULY">JULY</option>
										<option selected="AUG">AUG</option>
										<option selected="SET">SEP</option>
										<option selected="OCT">OCT</option>
										<option selected="NOV">NOV</option>
										<option selected="DEC">DEC</option>
									   </select>
								 </div>
								 <div class='col-sm-3'>
								
										<select name="day"  class="country form-control">
										<option selected="selected">DD</option>
											<?php
										
											for($a = 1; $a<=31; $a++)
											{
												echo"<option value='$a'>$a</option>";
											}
										?>
											
									   </select>
								 </div><br>
							 </div><br>

								<h3 style='margin-top:1.5em; color:#df1f26'>ACCOUNT INFORMATION</h3>
								
							
							 <div>
										<span>ACCOUNT NAME<label>*</label></span>
										<input type="text" name='accountname' required class='form-control'> 
							</div>
							<div>
										 <span>ACCOUNT NUMBER<label>*</label></span>
										 <input type="text" name='accountnumber' required class='form-control'> 
							</div>
							<div>
										<span>BANK NAME<label>*</label></span>
										<input type="text" name='bank' required class='form-control'> 
							</div>
							
							<div>
									 <span>PAY OPTION<label>*</label></span>
									 <select name="payoption"  class="payoption form-control">
										<option value="ewallet" selected="credit">EWALLET</option>
										<option>CREDIT CARD</option>
										
									 </select>
							 </div>
							 <div>
										 <span><label>PAYEE USERNAME*</label></span>
										 <input type="text" name='payeename' id='payeeusername' required class='form-control'>
										 <span style='color:green'> <span class='displaypayee_name'></span></span>
										 <span style='color:red'> <span class='displaypayee_error'></span></span>
										 <img src="images/search.gif" id="payee_loader" class='search' style='height:50px; width:50px;'></img>
																				
							 </div>	
							 <div class='payee_div'  >
										<span style='display:none' class='payeetrxlabel'>PAYEE TRANSACTION PASSWORD<label>*</label></span>
										<input type="password" name='payeepassword' id='payeetransaction' class='form-control payeetransaction' style='display:none'>
										<span style='color:green'> <span class='displaytransactionpassword_name'></span></span>
										 <span style='color:red'> <span class='displaytransactionpassword_error'></span></span>
										<img src="images/search.gif" id="payeetrxpassword_loader" class='search' style='height:50px; width:50px;'></img>
							 </div>
							 <div>
										<span>USERNAME<label>*</label></span>
										<input type="text" name='username' id='username' required class='form-control username'>
										<span style='color:green'> <span class='displaycorrectusername_name'></span></span>
										<span style='color:red'> <span class='displayincorrectusername_name'></span></span>
										<img src="images/search.gif" id="username_loader" class='search' style='height:50px; width:50px;'></img>
							 </div>
							
							 <div>
										<span>PASSWORD<label>*</label></span>
										<input type="password" name='password' class='form-control' required>
							 </div>
							 <div>
										<span>CONFIRM PASSWORD<label>*</label></span>
										<input type="password" name='retypepassword' required class='form-control'>
							 </div>
							 <div>
										<span>TRANSACTION PASSWORD<label>*</label></span>
										<input type="password" name='transactionpassword' class='form-control' required>
							 </div>
							 <div>
										<span>CONFIRM TRANSACTION PASSWORD<label>*</label></span>
										<input type="password" name='confirmtransactionpassword' class='form-control' required>
							 </div>
								 
									<button type="submit" class='preview'  style='background-color:#df1f26; border:none; color:white; outline:none; font-size: 1em; padding: 0.5em 1.5em; margin-top:1em; margin-bottom:1em'> Preview <i class="fa fa-close bad" style="font-size:20px;color:white"></i> <i class="fa fa-check good" style="font-size:20px;color:green"></i></button>
								   </div>
							   </form>
							   <img src="images/ajax-loader.gif" id="signup_loader" ></img>
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