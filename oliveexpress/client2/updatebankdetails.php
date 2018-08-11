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
                        <h3 class="page-header"><center>Update Account Details</center></h3>
						
						<?php
						
							$sql_profile = "SELECT * FROM bankdetails WHERE id = '$id'";
							$query_profile = $con->query($sql_profile);
							
							$row_profile = mysqli_fetch_array($query_profile);
							
							$bank = $row_profile['bank'];
							$acc_name = $row_profile['acc_name'];
							$acc_number = $row_profile['acc_number'];
							
						?>
						
						<form id='form_bankdetails'>
							  <div>
								<span>Bank Name<label>*</label></span>
								<input type="text" name='bank' value='<?php echo"$bank" ?>'> 
							  </div>
							  <div>
								<span>ACC Name<label>*</label></span>
								<input type="text" name='accname' value='<?php echo"$acc_name" ?>'> 
							  </div>
							  <div>
								<span>ACC Number<label>*</label></span>
								<input type="text" name='accnumber' value='<?php echo"$acc_number" ?>'> 
							  </div>
							<br>
							  <input type="submit" value="update Bank detals" class='btn btn-primary' id='updatebankdetails'><div></div>
							  
						</form>
						 <img src="../images/ajax-loader.gif" id="updatebankdetals_loader" ></img>
				
				
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
