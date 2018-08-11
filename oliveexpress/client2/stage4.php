<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<style>

.infodisplay {
    position: relative;
 
    
}

.infodisplay .tooltiptext {
   display: hidden;
   margin-left:-1em;
    width: 220px;
    background-color: #555;
	font-size: 0.9em;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    position: absolute;
    z-index: 1;  
    opacity: 0;
    transition: opacity 0.3s;
}

.infodisplay .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.infodisplay:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

</style>



<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
$email = $_SESSION['email'];

if(!isset($_GET['search'])){
	$id = $_SESSION['id'];
}else{
	$id = $_GET['search'];
}


$myid = $_SESSION['id'];
$username_user = $_SESSION['username'];

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
        
        
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                       <h3 class="page-header"><center>Flamingo Tree View</center></h3>
								<div class="container" >
			<div class="row">
				
					<div class="col-sm-12 padding-right" id=''>
						
					 <?php


echo"<div class='panel panel-info' >";
echo"<div class='panel-heading'><div><br><br></div></div>";
echo"<div class='panel-body' Style='width:100%; height:400px; overflow:scroll'>";

	
	$finish_array = 6;//////////////////////this determines it should finish a level and leaves
	$repeat = 0;
	$arrayposition = 0; 	  //////////////////////this determines which array should hold the downliner gotten from database by the get_downliners3
	$target = 2; //////////////this is where it will reach and display on the next line
	$check_when_to_stop = 0;
	$reach = 0;/////////////////////////////this will be increamented to reach $target
	$check_when_to_call_leve1 = 0;
	$array_population_current[0] = null;
	$first_call = 0; /////////////////////////////////this value determines whether the get_downliners2 will be called after the get_downliners3 is called
	
			$query_check_user_active = $con->query("SELECT * FROM users WHERE referalid = '$id'");
	$row_check_user_active = mysqli_fetch_array($query_check_user_active);
	
	$userstatus = $row_check_user_active['active'];
	$first_username = $row_check_user_active['username'];
	$last_name = $row_check_user_active['last_name'];
	$upliner = $row_check_user_active['upliner'];
	$first_name = $row_check_user_active['first_name'];
	$sponsor = $row_check_user_active['sponsor'];
	$mobile = $row_check_user_active['mobile'];
	
	if($query_check_user_active->num_rows > 0){
			echo"<center><table><tr><td style=''><center><div  class='infodisplay'><img src='../images/useractive.png'><b><br></b>$id</span>
			<span class='tooltiptext'>
			<b>First name:</b> $first_name<br>
			<b>Last name:</b> $last_name<br>
			<b>Sponsor:</b> $sponsor<br>
			<b>Upliner:</b> $upliner<br>
			<b>Mobile:</b> $mobile
			</span>			
			</div><br><img src='../images/line.png'></td></center></tr></table></center>";

	}else{
			echo"<center><table><tr><td style=''><center><img src='../images/nouser.png'><b><br></b>$id</span><br><img src='../images/line.png'></td></center></tr></table></center>";

	}

	
	get_downliners3($id);
	
	if($first_call == 1)
	{
		
		get_downliners2();
		
	}
	
	function get_downliners2(){
		
		global $check_when_to_call_leve1;
		global $con;
		global $arrayposition;
		global $repeat;
		global $finish_array;
		global $target;
		global $reach;
		global $check_when_to_stop;
		global $array_population_current;
		
		
		$repeat = 0;
		
		echo"<center><table><tr>";	
		
		for( $i = 0; $i<6; $i++){		
				
					$id = $array_population_current[$i];
					
					//echo"$i";
					
					
						if($id != "not"){
							
							$reach++;
				
								$sql = "SELECT * FROM users WHERE username = '$id'";
								$run_query = $con->query($sql);
								$row = mysqli_fetch_array($run_query);
							
								$username = $row['username'];
								$upliner = $row['upliner'];
								$referalid = $row['referalid'];
								
								$last_name = $row['last_name'];
								$upliner = $row['upliner'];
								$first_name = $row['first_name'];
								$sponsor = $row['sponsor'];
								$mobile = $row['mobile'];
								
								$status = $row['active'];
								
								if($status == '1')
								{
								echo"<td><center><div  class='infodisplay'><a href='http://localhost/oliveexpress/client2/startertreeview.php?search=$username'><img src='../images/useractive.png'>
								 <span class='tooltiptext'>
										<b>First name:</b> $first_name<br>
										<b>Last name:</b> $last_name<br>
										<b>Sponsor:</b> $sponsor<br>
										<b>Upliner:</b> $upliner<br>
										<b>Mobile:</b> $mobile
									</span>
								 </a></div><br>$username<br> <img src='../images/lines.png'></center></td>";
								$check_when_to_call_leve1++;
								
									
									if($reach == $target)
									{
										echo"</tr></table></center><center ><table ><tr>";
										$target = 2*$reach;
										$reach = 0;
									}	
									$check_when_to_stop++; 
																	
									get_downliners3($id);

								}
								
									
									////////////////////this conditional statement checks when to close the table
									
							
						}
								else
								{
									$reach++;
									$check_when_to_stop++;
									
									echo"<td ><center><img src='../images/nouser.png'><br><img src='../images/lines.png'></center></td>";
									
									if($reach == $target)
									{
										echo"</tr></table></center><center ><table ><tr>";
										$target = 2*$reach;
										$reach = 0;
									}
									
									get_downliners3($id);
								}
		
		   //echo"</tr></table></center>";
				//echo"<center ><table style='font-size:0.68em;' ><tr>";		
		
			//echo"</tr></table>";
			
		
	}
	
echo"</tr></table></center>";
	}

	/////////////////////////////////////////////////////
	function get_downliners3($id){
		global $array_population_current;
		global $finish_array;
		global $arrayposition;
		global $check_when_to_stop;
						global $repeat ;
						//global $arrayposition;
						global $con;
					
						global $first_call;
						
						$level_position_check = 0;
		if($check_when_to_stop < $finish_array)
		{
						
						
								$sql = "SELECT  * FROM level4directdownliner WHERE upliner = '$id'";
								
									$run_query = $con->query($sql);
									  
									  
									if($run_query->num_rows>0){
										
										while($row = mysqli_fetch_array($run_query)){
												
													$array_population_current[$arrayposition] = $row['username']; 
													//$upliner_to_fill = $row['referalid'];
													
													//echo"$upliner_to_fill $arrayposition<br>";
													
													
													$arrayposition++;
													
													$repeat = 1;
													
													$level_position_check++;

										}
										
										if($level_position_check <2){
										
											$check_to_display_realimage = 0; ///////////////////////this shows that image should not be displayed
											
											$array_population_current[$arrayposition] = "not";
											$arrayposition = $arrayposition + 1;
											
										}
										
										$first_call = 1;
							
									}else{ ////////////////////////////// if the id does not have downliner at all
										
										for($a = 0; $a<2; $a++){
																						
											
											$array_population_current[$arrayposition] = "not";
											$arrayposition = $arrayposition + 1;
											
										}
									}
		
					
		}else{$repeat = 0;}/////////////////////this is when it has reached 6
	
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
