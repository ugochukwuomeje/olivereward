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
						<form class='form'>
						      
							<label><b>Enter Username:</b></label>
							<input type='text' class='form-control' name="username">
							<br>
							<label><b>Amount(USD):</b></label>
							<input  type='number' class='form-control' id='amount' name="amount"><span style='color:red'>Amount in Naira: <span class='amountnaira'></span></span><br>
							<input class='btn btn-primary' id='creditmember' type='submit' style='margin-top:10px' >
						</form>
						<center><img src='../images/ajax-loader.gif' id='creditmember_loader'> </center>    
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
