<?php

include("../connection/db.php");
		$arrayposition = 0;;
		$repeat;
		$check_when_to_stop;
		$array_population_current;
	get_downliners3("ijeoma");
	
	if($first_call == 1)
	{
		
		get_downliners2();
		
	}

function get_downliners2(){
		$i = 0;
		global $con;
		global $arrayposition;
		global $repeat;
		global $array_population_current;

		
					while($repeat == 1){
			$id = $array_population_current[$i];

			
			 $repeat = 0;
			 $i++;
			get_downliners3($id);
					}
					
					echo"THE TOTAL DOWNLINE IS: $arrayposition";

	}
	
		function get_downliners3($id){
		global $array_population_current;

		global $arrayposition;

						global $repeat ;
						//global $arrayposition;
						global $con;
					
						global $first_call;
						
						
						
								$sql = "SELECT  * FROM users WHERE upliner = '$id'";
									$run_query = $con->query($sql);
									  
									  
									if($run_query->num_rows>0){
										
										while($row = mysqli_fetch_array($run_query)){
												
													$array_population_current[$arrayposition] = $row['referalid']; 

													$arrayposition++;
													
													$repeat = 1;
													

										}
										
										$first_call = 1;
							
									}
					
		
	
	}
?>	