<!DOCTYPE html>
<html lang="en">
<?php
session_start();
/*if(!isset($_SESSION['loggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
}*/
include("header.php");
include("../connection/db.php");
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
       <?php
	       include("menu.php");
	   ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Registered Members</h1>
						<table class='table table-striped '>
						<tr style='background:#36648B; color:white'><th>First <br>name</th><th>Last<br>Name</th><th>email</th><th>Mobile</th><th>Sponsor</th><th>Upline</th><th>Approve</th></tr>
						<?php
						   $query_registered_members = $con->query("SELECT * FROM users WHERE active='0'");

						  
						   
						   if($query_registered_members->num_rows > 0)
						   {
									while($row_registered_members = mysqli_fetch_array($query_registered_members))
									{
										$firstname = $row_registered_members['first_name'];
										$lastname = $row_registered_members['last_name'];
										$email = $row_registered_members['email'];
										$mobile = $row_registered_members['mobile'];
										$clientid = $row_registered_members['referalid'];
										$sponsor = $row_registered_members['sponsor'];
										$upliner = $row_registered_members['upliner'];
										
										echo"<tr><td>$firstname</td><td>$lastname</td><td>$email</td><td>$mobile</td><td>$sponsor</td><td>$upliner</td><td><button id='$email' clientid='$clientid'  class='btn btn-success btn-small credit_client'>approve</button>";
										
									}
									
								
						   }else{
							   
							   echo"<div class='alert alert-danger'>THERE ARE NO UNAPPROVED MEMBERS</div>";
						   }		
								
						?>
							
						<table>
                    </div><br>
					
                    <!-- /.col-lg-12 -->
					
					
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
			<center><img src='../images/ajax-loader.gif' id='img_approve_teller'></center>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	<script>
		<?php
		include('../myscript/shopping_cart.js');	
		?>
	</script>

</body>

</html>
