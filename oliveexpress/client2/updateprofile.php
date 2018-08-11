<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
$email = $_SESSION['email'];
$id = $_SESSION['id'];

include("../connection/db.php");
?>


<?php
include("include/header.php");
?>
<body>


        <!-- Left Panel -->
<?php
include("include/leftmenu.php");
?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
			include("include/topmenu.php");
		?>
        <!-- Header-->
		<?php
			include("include/breadcrumb.php");
		?>
        
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                        <h3 class="page-header"><center>Update Profile</center></h3>
						
						<?php
						
							$sql_profile = "SELECT * FROM users WHERE username = '$id'";
							$query_profile = $con->query($sql_profile);
							
							$row_profile = mysqli_fetch_array($query_profile);
							
							$firstname = $row_profile['first_name'];
							$lastname = $row_profile['last_name'];
							$email = $row_profile['email'];
							$country = $row_profile['country'];
							$state = $row_profile['state'];
							$city = $row_profile['city'];
							$mobile = $row_profile['mobile'];
							$gender = $row_profile['gender'];
							$sponsor = $row_profile['sponsor'];
							$reflink = $row_profile['reflink'];
							$address1 = $row_profile['address1'];
							$address2 = $row_profile['address2'];
						
						?>
						
						<form id='form2'>
							  <div>
								<span>First Name<label>*</label></span>
								<input type="text" name='firstname' value='<?php echo"$firstname" ?>'> 
							  </div>
							  <div>
								<span>Last Name<label>*</label></span>
								<input type="text" name='lastname' value='<?php echo"$lastname" ?>'> 
							  </div>
							  <div>
									<span>Gender<label></label></span>
									<input type="text" name='gender' value='<?php echo"$gender" ?>' > 
							  </div>
								 
							  <div>
								<span>Email<label>*</label></span>
								<input type="email" name='email' style='width:96%; border: 1px solid #EEE;
									outline-color:#FF5B36; font-size: 1em; padding: 0.5em;' value='<?php echo"$email" ?>' > 
							  </div>
							  <div>
								<span>Country<label></label></span>
								<input type="text" name='changedcountry' value='<?php echo"$country" ?> ' > 
							  </div>
							   
							   
								 <div>
									<span>State<label></label></span>
									<input type="text" name='changestate' value='<?php echo"$state" ?>' > 
								  </div>
								 
							  <div>
								<span>City<label>*</label></span>
								<input type="text" name='city' value='<?php echo"$city" ?>'> 
							  </div>
							  <div>
								<span>mobile<label>*</label></span>
								<input type="text" name='mobile' value='<?php echo"$mobile" ?>' > 
							  </div>
							  <div>
								<span>Address1<label>*</label></span>
								<input type="text" name='address1' value='<?php echo"$address1" ?>'> 
							  </div>
							  <div>
								<span>Address2<label>*</label></span>
								<input type="text" name='address2' value='<?php echo"$address2" ?>'> 
							  </div>
							  <input type="submit" value="update Profile" id='updateprofile'><div></div>
							  
						</form>
						 <img src="../images/ajax-loader.gif" id="signup_loader" ></img>
				
				
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
