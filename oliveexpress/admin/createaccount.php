<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<?php
session_start();
if(!isset($_SESSION['adminloggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
//$email = $_SESSION['email'];
//$id = $_SESSION['id'];

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
			$pagetitle = "REGISTERED MEMBERS";
		?>
       
        <div class="content mt-3" style='background-Color:white;' >

              <div class="row" >
                    <div class="col-lg-6 " style='margin-Left:20%;margin-bottom:4em; margin-top:2em;'>
					<center><h4>Create Account</h4></center>
						<form class='create_previlege_account_form'>
						      
							<label><b>Enter First Name:</b></label>
							<input type='text' class='form-control' name="firstname">
							<label><b>Enter Username:</b></label>
							<input type='text' class='form-control' name="lastname">							
							<label><b>Enter Username:</b></label>
							<input type='text' class='form-control' name="username">
							<br>
							<label><b>Password:</b></label>
							<input  type='password' class='form-control'  name="password">
							<label><b>RetyPassword:</b></label>
							<input  type='password' class='form-control' name="retypepassword">
							<label><b>Enter Phone number:</b></label>
							<input type='number' class='form-control' name="phonenumber">
							<div>
							<label><b>User Roles</label>
								 <select name="role"  class="gender form-control">
									<?php
										$query_admin = $con->query("SELECT * FROM userroles");
										while($row_admin_userroles = mysqli_fetch_array($query_admin))
										{
											
											$sn = $row_admin_userroles['sn'];											$sn_roles = $row_admin_userroles['roles'];
											
											echo"<option value='$sn'>$sn_roles</option>";
										}
										
										
									
									?>
							     </select>
							 </div>
							 <input class='btn btn-primary' id='btn_create_previlege' type='submit' style='margin-top:10px' >
						</form>
						<center><img src='../images/ajax-loader.gif' id='create_previlege_account_loader'> </center>    
                    </div><br>
				
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
