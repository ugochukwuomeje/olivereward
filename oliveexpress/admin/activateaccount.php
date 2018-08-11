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
