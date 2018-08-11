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
			$pagetitle = "REGISTERED MEMBERS";
		?>
        <?php
			
		
							$sql = "SELECT * FROM monitor";
							$result = $con->query($sql);
							
							
		?>
        <div class="content mt-3" >

              <div class="row" >
                   <div class="col-lg-12" style='background-Color:white;'>
					<center><img src='../images/ajax-loader.gif' id='img_approve_withdrawal_request'> </center>
                        <h3 class="page-header"><center>View Monitor</center></h3>
						<br>
						<table class='table  table-bordered table-condensed'>
						<tr><th>FIRST NAME</th><th>LAST NAME</th><th>OPERATION</th><th>DATE</th></tr>
						<?php
							while($row_monitor = mysqli_fetch_array($result)){
								
								$firstname = $row_monitor['firstname'];
								$lastname = $row_monitor['lastname'];
								$task = $row_monitor['task'];
								$date = $row_monitor['date'];
								$formated_date = date('m-d-Y', $date);
									echo"<tr><td>$firstname</td><td>$lastname</td><td>$task</td><td>$formated_date</td></tr>";
									
							}
						?>
						
						</table>
                    </div>
				
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
