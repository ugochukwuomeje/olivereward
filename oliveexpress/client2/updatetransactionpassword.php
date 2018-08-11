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
                        <h3 class="page-header"><center>Update Transaction Password</center></h3>
						
						<?php
						
							$sql_trxpassword = "SELECT * FROM users WHERE username = '$id'";
							$query_trxpassword = $con->query($sql_trxpassword);
							
							$row_trxpassword = mysqli_fetch_array($query_trxpassword);
							
							
							$trxpassword = $row_trxpassword['transactionpassword'];
						
						?>
						
						<form id='form2'>
							  <div>
								<span>Previous<label></label></span>
								<input type="text" name='formertrx' > 
							  </div><br>
							  <div>
								<span>New Transaction Password<label>*</label></span>
								<input type="text" name='transactionpassword' > 
							  </div><br>
							   <div>
								<span>Confirm Transaction Password<label>*</label></span>
								<input type="text" name='confirmtransactionpassword' > 
							  </div><br>
							  
							  <input type="submit" value="update" id='updatetransationpassword'><div></div>
							  
						</form>
						 <img src="../images/ajax-loader.gif" id="trx_loader" ></img>
				
				
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
