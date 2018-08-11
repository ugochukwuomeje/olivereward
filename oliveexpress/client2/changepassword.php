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
		
        
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                        <h3 class="page-header"><center>Change Password</center></h3>
						
						
						<form id='changepassword'>
							  <div>
								<span>Old Password<label></label></span>
								<input type="text" name='oldpassword' > 
							  </div>
							  <div>
								<span>Enter New Password<label>*</label></span>
								<input type="password" name='newpassword' style='width:96%; border: 1px solid #EEE;
	outline-color:#FF5B36; font-size: 1em; padding: 0.5em;' > 
							  </div>
							  
							  <div>
								<span>Retype Password<label>*</label></span>
								<input type="password" name='retypepassword' style='width:96%; border: 1px solid #EEE;
	outline-color:#FF5B36; font-size: 1em; padding: 0.5em;'> 
							  </div>
							  
							  <input type="submit" value="update" id='updatepasswordfromdashboard'><div></div>
							  
						</form>
						 <img src="../images/ajax-loader.gif" id="changepassword_loader" ></img>
				
				
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
