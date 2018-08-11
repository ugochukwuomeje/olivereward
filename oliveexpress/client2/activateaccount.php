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
                        <h1 class="page-header"><center>Activate Wallet</center></h1>
						
						<form id='tellerform'>
							  <div>
								<span>Depositor<label>*</label></span>
								<input type="text" name='depositor'> 
							  </div>
							<div><span>Upload teller*</span>
														<input type='file' class='form-control' id='tellerimg' placeholder='select teller image' name='tellerimg'></div><br>
							  <input type="submit" value="update Profile" id=''><div></div>
							  <input type='hidden' name='operation' value='submit' >
							  <input type='hidden' name='id' value='<?php echo"$id" ?>' >
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
						<img src='../images/ajax-loader.gif' id='lodingteller'>
				
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
