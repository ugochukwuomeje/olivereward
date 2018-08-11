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
			
		
							$sql = "SELECT * FROM wallet WHERE id = '$id'";
							$result = $con->query($sql);
							$row = mysqli_fetch_array($result);
							$amount = $row["amount"];
		?>
        			
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                        <h4 class="page-header"><center>Make Withdrawal</center></h4>
						<center><div class='alert alert-danger'><span style='color:red'>Note: There is charge of N1000 or $4 for every withdrawal You Make</span></div></center><br>
						<form id='tellerform'>
							
							<div>
								<span>Total Balance<label></label></span>
							  <input type="text" id="totalbalance" name="totalbalance" value="<?php echo$amount  ?>"  readonly>
							</div>
						<div>
								<span>Withdrawal Amount<label>*</label></span>	
							  <input type='text' id="request" name="request" style='width:97%' >
						</div>
						<div>
								<span>Enter Transaction Password<label>*</label></span>	
							  <input type='password' id="trxpassword" name="trxpassword"  >
						</div>						
							   <input type="submit" value="submit" id='payment_request'><div></div>
							  <div class='row'>									
									<div class=' col-xs-8 col-sm-8 col-md-8 ' id='imgsection'>
										<div id='image_preview'>
											<img id='previewing_dpteller' class='img-responive' src='' style='; width:200px; height:200px;'>
										</div>
																		
									</div>
													
									<div id='message'>
													
									</div>
							  </div><br>
						</form>
						<img src='../images/ajax-loader.gif' id='payment_request_loader'>
				
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
