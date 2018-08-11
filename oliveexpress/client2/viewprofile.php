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
                       <h4 class="page-header"><center>View Profile</center></h4>
						
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
							$transactionpassword = $row_profile['transactionpassword'];
						
						?>
					<center><table class='table table-bordered' style='width:70%'>
						<tr><th>FIRST NAME</th><td><?php echo"$firstname" ?></td></tr>
						<tr><th>LAST NAME</th><td><?php echo"$lastname" ?></td></tr>
						<tr><th>EMAIL</th><td><?php echo"$email"  ?></td></tr>
						<tr><th>COUNTRY</th><td><?php echo"$country" ?></td></tr>
						<tr><th>STATE</th><td><?php echo"$state" ?></td></tr>
						<tr><th>CITY</th><td><?php echo"$city" ?></td></tr>
						<tr><th>MOBILE</th><td><?php echo"$mobile" ?></td></tr>
						<tr><th>GENDER</th><td><?php echo"$gender" ?></td></tr>
						<tr><th>SPONSOR</th><td><?php echo"$sponsor" ?></td></tr>
						<tr><th>REFLINK</th><td><?php echo"$reflink" ?></td></tr>
						<tr><th>ADDRESS1</th><td><?php echo"$address1" ?></td></tr>
						<tr><th>ADDRESS2</th><td><?php echo"$address2" ?></td></tr>
					</table></center>
						
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
