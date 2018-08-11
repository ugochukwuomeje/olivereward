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
			$no_of_depositors = 0;
		
							$sql = "SELECT * FROM received_stage_bonus WHERE received = '$id' LIMIT 30";
							$result = $con->query($sql);
							
							
		?>
        			
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                        <h3 class="page-header"><center>Downliners Deposite</center></h3>
						<br>
						<table class='table  table-bordered table-condensed'>
						<tr><th>NO</th><th>Downliner</th><th>Amount</th><th>Level</th><th>date</th></tr>
						<?php
						$levelname = "";
						
					
						   if(!$result->num_rows > 0){
							   
							   
							   echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'>YOU HAVE NOT RECEIVED ANY BONUS</div>";
							   
						   }else{
							   							   
							   while($row_request = mysqli_fetch_array($result)){
								  $no_of_depositors++;
								  $depositor = $row_request['depositor'];
								  
								  if($depositor == "1")
								  {
									  $depositor = "-";
								  }
								  $amount = $row_request['amount'];
								  $level = $row_request['level'];
								  $date = $row_request['date'];								  								  
								  $formated_amount = number_format($amount,2);
								  
								  $formated_date = date('m/d/Y H:i:s', intval($date));
								  switch($level){
									  
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
								  
								   $splited_date = explode("/",$formated_date);
								   $strmonth = $splited_date[0];
								   switch($strmonth){
									   
									case 01:
									$strmonth = "JAN";
									break;									
									   
									case 02:
									$strmonth = "FEB";
									break;

									case 03:
									$strmonth = "MARCH";
									break;
									
									case 04:
									$strmonth = "APRIL";
									break;
									
									case 05:
									$strmonth = "MAY";
									break;
									
									case 06:
									$strmonth = "JUNE";
									break;
									
									case 07:
									$strmonth = "JULY";
									break;
									
									case 08:
									$strmonth = "AUGUST";
									break;
									
									case 09:
									$strmonth = "SEPT";
									break;
									
									case 10:
									$strmonth = "OCT";
									break;
									
									case 11:
									$strmonth = "NOV";
									break;
									
									case 12:
									$strmonth = "DEC";
									break;
								   }
								   
								   $formated_date = $splited_date[1]." ".$strmonth." ". $splited_date[2];
								  
								  echo"<tr><td>$no_of_depositors</td><td>$depositor</td><td>N$formated_amount</td><td>$levelname</td><td>$formated_date</td></tr>";
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
