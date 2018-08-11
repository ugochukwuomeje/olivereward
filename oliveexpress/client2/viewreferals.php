<!doctype html>

<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
$email = $_SESSION['email'];
$id = $_SESSION['id'];
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
	padding:3em;
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
		?>
        <!-- Header-->
		<?php
			
		
							$sql = "SELECT * FROM users WHERE sponsor = '$id' LIMIT 30";
							$result = $con->query($sql);
							
							
		?>
        			
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                        <h3 class="page-header"><center>My Referals</center></h3>
						<br>
						<table class='table  table-bordered table-condensed'>
						<tr><th>Username</th><th>Phone</th><th>Current level</th><th>Reg Date</th></tr>
						<?php
						$levelname = "";
						   if(!$result->num_rows > 0){
							   
							   
							   echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'>YOU HAVE NOT REFERED ANYBODY</div>";
							   
						   }else{
							   							   
							   while($row_request = mysqli_fetch_array($result)){
								  
								  $downlinerusername = $row_request['username'];
								  $date = $row_request['date'];
								  $phone = $row_request['mobile'];
								   
								  $currentlevel = $con->query("SELECT * FROM currentlevel WHERE id = '$downlinerusername'");
								  $row_currentlevel = mysqli_fetch_array($currentlevel);
								  $mylevel = $row_currentlevel['mycurrentlevel'];
								  
								  switch($mylevel){
									  
									  case 0:
									  $levelname = "Chick";
									  break;
									  
									  case 1:
									  $levelname = "Dove";
									  break;
									  
									  case 2:
									  $levelname = "Indigo";
									  break;
									  
									  case 3:
									  $levelname = "Patridge";
									  break;
									  
									  case 4:
									  $levelname = "Flamingo";
									  break;
									  
									  case 5:
									  $levelname = "Peacock";
									  break;
									  
									  case 6:
									  $levelname = "Eagle";
									  break;
									  
								  }
								  
								  echo"<tr><td>$downlinerusername</td><td>$phone</td><td>$levelname</td><td>$date</td></tr>";
							   }
						   }
						
						
						?>
						
						</table>
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
