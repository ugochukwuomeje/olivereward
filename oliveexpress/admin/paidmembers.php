<!doctype html>

<?php
session_start();
if(!isset( $_SESSION['username']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
$dollar_rate = $_SESSION['dollar_rate'];


include("../connection/db.php");
?>


<?php
include("include/header.php");
?>
<style>

th{
	background-Color:#DC143C;
	font-size:0.8em;
	color:white;
	
}
tr{
	font-size:0.8em;
	padding-top:-0.4em;
}
td{
	font-size:0.9em;
	margin-top:-0.8em;
}
</style>
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
			
			
			$stage = $_GET['stage'];
			$stagemembers = "";
			if(isset($_GET['username'])){
				
				$usertosearch = $_GET['username'];
			}
			switch($stage){
				
				case 'starter':
				$stagemembers = "CHICK";
				break;
				
				case 1:
				$stagemembers = "DOVE";
				break;
				
				case 2:
				$stagemembers = "INDIGO";
				break;
				
				case 3:
				$stagemembers = "PATRIDGE";
				break;
				
				case 4:
				$stagemembers = "FLAMINGO";
				break;
				
				case 5:
				$stagemembers = "PEACOCK";
				break;
				
				case 6:
				$stagemembers = "EAGLE";
				break;
				
				} 
			
		?>
        
        <div class="content mt-3" >

              <div class="row" >
                   <div class="col-lg-12" style='background-Color:white;'>
					<center><img src='../images/ajax-loader.gif' id='img_approve_withdrawal_request'> </center>
                        <h5 class="page-header"><center>Qualified <?php echo"$stagemembers" ?> Members</center></h5>
						
						<?php
							
							$table = "stage".$stage."_reward";
							
							if(isset($_GET['username'])){
							$sql = "SELECT * FROM $table WHERE paid = '1' AND username LIKE '%$usertosearch%' LIMIT 30";
						}else{
							
							$sql = "SELECT * FROM $table WHERE paid = '1' LIMIT 30";
						}
						
							$result = $con->query($sql);
							
							if($result->num_rows >0)
							{
								
								$total = $result->num_rows;
				echo"<table class='table table-bordered' style='width:60%'>
						<tr><th style=''>Total Members Paid</th><th>$total</th></tr>
						<tr><form method='GET' action='paidmembers.php'><td><input type='text' name='username' class='form-control' placeholder='enter username'>
						<input type='hidden' name='stage' value='$stage'>
						</td><td><input type='submit' value='Search Member' class='btn btn-success'btn-small></td></form></tr>
				</table>";
						echo"<table class='table  table-bordered table-condensed'>
						<tr><th>USERNAME</th><th>FIRST NAME</th><th>LAST NAME</th><th>COUNTRY</th><th>STATE</th><th>CITY</th></tr>";
								while($row_result = mysqli_fetch_array($result))
									{
										$memberusername = $row_result['username'];
										
										$query_user = $con->query("SELECT * FROM users WHERE username = '$memberusername'");
										if($query_user->num_rows >0)
										{
											$row_user = mysqli_fetch_array($query_user);
											$firstname = $row_user['first_name'];
											$lastname = $row_user['last_name'];
											$country = $row_user['country'];
											$state = $row_user['state'];
											$city = $row_user['city'];
											
											
	echo"<tr><td>$memberusername</td><td>$firstname</td><td>$lastname</td><td>$country</td><td>$state</td><td>$city</td></tr>";
										}
									}
									echo"</table>";
									
							}else{
								
	echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'>YOU DONT HAVE ANY MEMBER FOR THIS STAGE</div>";							
							}	
						?>
						

						
						
						
                    </div>
				
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

        </div> <!-- .content -->
    <!-- /#right-panel -->

    <!-- Right Panel -->
<?php
include("include/footer.php");
?>
</body>
</html>
