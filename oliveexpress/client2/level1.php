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
$myid = $id;
$username_id = $_SESSION['username'];

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
                       <h3 class="page-header"><center>Starter Genealogy</center></h3>
								<div class="container" >
			<div class="row">
				
					<div class="col-sm-12 padding-right" id=''>
						
					 <?php

$array_population2;


echo"<div class='panel panel-info' >";
echo"<div class='panel-heading'><div><br><br></div></div>";
echo"<div class='panel-body' Style='width:100%; height:400px; overflow:scroll'>";

	
	$array_population2[0] = $id;  ///////////////////////////////array
	
	$repeat = 0;
	$check_to_display_realimage = 0;//////////////////////////////////
	$check_wether_to_set_level = 0;
	$arrayposition = 0;
	$array_counter = 0;
	$array_population_current[0] = null;
	$first_call = 0; /////////////////////////////////this value determines whether the get_downliners2 will be called after the get_downliners3 is called
	
	//////////////////////////////////////////////////this displays the image for the user
	
	$sql_user = "SELECT * FROM users WHERE referalid = '$id'";
	$query_user = $con->query($sql_user);
	$row_query = mysqli_fetch_array($query_user);
	
	$username_user = $row_query['username'];
	$upliner_user = $row_query['upliner'];
	
	echo"<center><table><tr><td style='color:green;font-size:0.7em;'><img src='../images/client.png'><b><br>User&nbsp;&nbsp;</b>$username_user</span></td></tr></table></center>";
			
	$starter_level_dodwnliners[0] = 0;  //////////////this array stores the starter leve downlines picked get_downliners3 function
										//////////////which checks whether id has two downliners from there it will picked by get downliners2 function

	$level_position_counter = 0;
	
			
	get_downliners3($id);
	
	if($first_call == 1)
	{
		//$arrayposition = 0;
		get_downliners2($array_population_current);
	}
	
	function get_downliners2(&$array_population2){
		
		
		global $con;
			
		global $repeat;
		global $array_counter;
		
		$array_counter = 0;
		
		$repeat = 0;
		
		echo"<center ><table style='font-size:0.7em;' ><tr>";	
		
		for( $i = $array_counter; $i<count($array_population2); $i++){			
			
						
			$id = $array_population2[$i];
			//$array_counter++;
			$sql = "SELECT * FROM users WHERE referalid = '$id'";
			$run_query = $con->query($sql);
			$row = mysqli_fetch_array($run_query);
		
		
			$username = $row['username'];
			$upliner = $row['upliner'];
			$referalid = $row['referalid'];
			
			$color = "";
			$status = $row['active'];
			
			if($status == 1)
			{
			  $color = "green";	
			}else{
				
				$color = "red";
			}
						
			echo"<td style='color:$color; margin-left:-3em'><img src='../images/client.png'><b><br>User&nbsp;</b>$username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>";
			
			
			
			get_downliners3($id);
			
			
			
		}
		
		   echo"</tr></table></center>";
				echo"<center ><table style='font-size:0.68em;' ><tr>";		
		
			//echo"</tr></table>";
			
			if($repeat ==1)
			{
					get_downliners3($id);
			}
		
		
	}
echo"</tr></table></center>";


	/////////////////////////////////////////////////////
	function get_downliners3($id){
		global $array_population_current;
		global $repeat ;
		global $arrayposition;
		global $con;
		global $level_position_counter; ///
		global $myid;
		global $first_call;
		global $check_wether_to_set_level; /////////this variable deteemines when to set the level to 1 in the level table
		$level_position_check = 0;
		
				$sql = "SELECT  * FROM users WHERE upliner = '$id'";
					$run_query = $con->query($sql);
					  
					  
					if($run_query->num_rows>0){
						
						while($row = mysqli_fetch_array($run_query)){
								
									$array_population_current[$arrayposition] = $row['referalid']; 
									$upliner_to_fill = $row['referalid'];
									
									$check_wether_to_set_level++;////////////when this reaches 6 the set level function will be called
									
									if($check_wether_to_set_level == 6){
										
										set_level($myid);
									}
									
									fill_level($myid, $upliner_to_fill, $level_position_counter);
									
									$arrayposition = $arrayposition + 1;
									$level_position_counter++;
									$repeat = 1;
									
									$first_call = 1;
									
									$level_position_check++;

						}
						
						if($level_position_counter <2){
							
							$level_position_check++;
						}
						
			
					}
					
					
	}
	
		/////////////////////////////////////////////////////
		
		function check_to_display_leve1($id)////////////////////this function displays the level1 downlines
		{
			$sql_level1 = "SELECT * FROM level1 WHERE " 
		}
		
		function check_to_display_leve2($id)////////////////////this function displays the level1 downlines
		{
			$sql_level1 = "SELECT * FROM level1 WHERE " 
		}
		
		function check_to_display_leve3($id)////////////////////this function displays the level1 downlines
		{
			$sql_level1 = "SELECT * FROM level1 WHERE " 
		}
		
		function check_to_display_leve4($id)////////////////////this function displays the level1 downlines
		{
			$sql_level1 = "SELECT * FROM level1 WHERE " 
		}
		
		function check_to_display_leve5($id)////////////////////this function displays the level1 downlines
		{
			$sql_level1 = "SELECT * FROM level1 WHERE " 
		}
		
		function check_to_display_leve6($id)////////////////////this function displays the level1 downlines
		{
			$sql_level1 = "SELECT * FROM level1 WHERE " 
		}
		
	function level_operation($id){
		global $array_population_current;
		global $repeat ;
		global $arrayposition;
		global $con;
		global $level_position_counter; ///
		global $myid;
		global $first_call;
		global $check_wether_to_set_level; /////////this variable deteemines when to set the level to 1 in the level table
		$level_position_check = 0;
		
				$sql = "SELECT  * FROM users WHERE upliner = '$id'";
					$run_query = $con->query($sql);
					  
					  
					if($run_query->num_rows>0){
						
						while($row = mysqli_fetch_array($run_query)){
								
									$array_population_current[$arrayposition] = $row['referalid']; 
									$upliner_to_fill = $row['referalid'];
									
									$check_wether_to_set_level++;////////////when this reaches 6 the set level function will be called
									
									if($check_wether_to_set_level == 6){
										
										set_level($myid);
									}
									
									fill_level($myid, $upliner_to_fill, $level_position_counter);
									
									$arrayposition = $arrayposition + 1;
									$level_position_counter++;
									$repeat = 1;
									
									$first_call = 1;
									
									$level_position_check++;

						}
						
						if($level_position_counter <2){
							
							$level_position_check++;
						}
						
			
					}
					
					
	}
	
	function fill_level($id, $downliner, $number)
	{
		global $con;
		
		$sql_submit_downliner  = "UPDATE starterlevel SET person$number = '$downliner'";
		$query_submit_upliner  = $con->query($sql_submit_downliner);
		
		if(!$query_submit_upliner)
		{
			echo"the error for filling the leve is: $con->error";
		}
	}
	
	function set_level($id)
	{
		global $con;
		
		$sql_set_level  = "UPDATE downliners SET leve1 = '1' WHERE id = '$id'";
		$sql_set_level_query = $con->query($sql_set_level);
		
		if(!$sql_set_level_query)
		{
			echo"the error for setting the level is: $con->error";
		}
	}
	
	

echo"</div>";
echo"</div>";



?>
			</div>
		</div>
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
