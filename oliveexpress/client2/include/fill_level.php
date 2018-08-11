<?php

$myid = $_SESSION['referalid'];
$array_population_current[0] = '0'; //////////////////////////this array stores the id picked from databse by the count_downliners function
$array_position = 0; /////////////////////////////////this stores the array index 
$count_completed_id = 0;

$first_downliner_check = 0;
$second_downliner_check = 0;
$third_downliner_check = 0;
$fourth_downliner_check = 0;
$sixth_downliner_check = 0;


//////////////////////////this line gets the level monetry reward
$sql_money_reward = "SELECT * FROM stage_bonus";
$query_bonus = $con->query($sql_money_reward);
$row_bonus = mysqli_fetch_array($query_bonus);

$level1reward = $row_bonus['level1'];
$level2reward = $row_bonus['level2'];
$level3reward = $row_bonus['level3'];
$level4reward = $row_bonus['level4'];
$level5reward = $row_bonus['level5'];
$level6reward = $row_bonus['level6'];
$starter_bonus = $row_bonus['starter'];


/////////////////////////////////////////////this section gets the both level status for use
$query_check_level = $con->query("SELECT * FROM downliners WHERE id = 'id'");
$row_check_level = mysqli_fetch_array($query_check_level);
$starter_status = $row_check_level['starter'];
$level1_status = $row_check_level['level1'];
$level2_status = $row_check_level['level2'];
$level3_status = $row_check_level['level3'];
$level4_status = $row_check_level['level4'];
$level5_status = $row_check_level['level5'];
$level6_status = $row_check_level['level6'];

//////////////////////////////////////////////////////////////this line pick the population for the stages

$sql_stage_population = $con->query("SELECT * FROM stage_population");
$row_stage_population = mysqli_fetch_array($sql_stage_population);

$starter_population = $row_stage_population['starter'];
$level1_population = $row_stage_population['level1'];
$level2_population = $row_stage_population['level2'];
$level3_population = $row_stage_population['level3'];
$level4_population = $row_stage_population['level4'];
$level5_population = $row_stage_population['level5'];
$level6_population = $row_stage_population['level6'];

if(!$starter_status ==  '1') ///////////////////////this line checks for level1
{
	pick_downliners_tocount($id, $starter_population,'starter');
}elseif(!$level1_status ==  '1'){
	pick_downliners_tocount($id, $level1_population, '1');
}elseif(!$level2_status ==  '1'){
	pick_downliners_tocount($id, $level2_population, '2');
}elseif(!$level3_status ==  '1'){
	pick_downliners_tocount($id, $level3_population, '3');
}elseif(!$level4_status ==  '1'){
	pick_downliners_tocount($id, $level4_population, '4');
}elseif(!$level5_status ==  '1'){
	pick_downliners_tocount($id, $level5_population, '5');
}elseif(!$level6_status ==  '1'){
	pick_downliners_tocount($id, $level6_population, '6');
}


function pick_downliners_tocount($id, $expected_no_of_downliners, $level_fill)
{
	global $array_population_current;
	global $count_completed_id;
	
	
		if($level_fill == 'starter'){
	
			count_downliners($id, $level_fill);
			
			for($a =0; $a<$expected_no_of_downliners; $a++)
			{
				$downliner_id = $array_population_current[$i];
				count_downliners($downliner_id, $level_fill);
				
			}
			
			if($count_completed_id == $expected_no_of_downliners){
				
				////////////////////////function set the level for the id
				
				if($level_fill == 'starter')
				{

						set_level($myid, 'starter');
						give_reward($myid, '1');
										
				
				}		
			}
		}

	if($level_fill == 'level1')
	{
		$reach = 3;
		
	}elseif($level_fill == 'level2'){
		
		$reach = 15;
	}elseif($level_fill == 'level3'){
		
		$reach = 63;
		
	}elseif($level_fill == 'level4'){
		
		$reach = 255;
		
	}elseif($level_fill == 'level5'){
		
		$reach = 1023;
	}elseif($level_fill == 'level6'){
		
		$reach = 4095;
		
	}
		
		
		$sql_starter_downlines = "SELECT * FROM starterdowliners";
		$sql_query = $con->query($sql_starter_downlines);
		$row_starter_downliners = mysqli_fetch_array($sql_query);
		
		$first_downliner = $row_downliner['person1'];
		$second_downliner = $row_downliner['person2'];
		$third_downliner = $row_downliner['person3'];
		$fourth_downliner = $row_downliner['person4'];
		$fifth_downliner = $row_downliner['person5'];
		$sixth_downliner = $row_downliner['person6'];
		
		///////////////////////////////this line calls the count_downlinersfunction for the first downliner to check if the it has upto 6 downliner
		for($a = 0; $a<3; $a++){
			
			count_downliners($first_downliner, $level_fill);
			$downliner_id = $array_population_current[$i];
			
		}
		if($count_completed_id == 6)
		{
			submit_downlines($level_fill, '0', '$first_downliner');
			$count_completed_id = 0
		}else
		{
			submit_downlines($level_fill, '0', 'not');
			$count_completed_id = 0
		}
		///////////////////////////////this line calls the count_downliners function for the second downliner to check if the it has upto 6 downliner
		for($a = 0; $a<$reach; $a++){
			
			count_downliners($second_downliner, $level_fill);
			$downliner_id = $array_population_current[$i];
			
		}
		if($count_completed_id == 6)
		{
			submit_downlines($level_fill, '1', '$second_downliner');
			$count_completed_id = 0
		}else
		{
			submit_downlines($level_fill, '1', 'not');
			$count_completed_id = 0
		}
		
		///////////////////////////////this line calls the count_downlinersfunction for the third downliner to check if the it has upto 6 downliner
		for($a = 0; $a<3; $a++){
			
			count_downliners($third_downliner, $level_fill);
			$downliner_id = $array_population_current[$i];
			
		}
		if($count_completed_id == 6)
		{
			submit_downlines($level_fill, '2', '$third_downliner');
			$count_completed_id = 0
		}else
		{
			submit_downlines($level_fill, '2', 'not');
			$count_completed_id = 0
		}
		
		///////////////////////////////this line calls the count_downlinersfunction for the fourth downliner to check if the it has upto 6 downliner
		for($a = 0; $a<3; $a++){
			
			count_downliners($fourth_downliner, $level_fill);
			$downliner_id = $array_population_current[$i];
			
		}
		if($count_completed_id == 6)
		{
			submit_downlines($level_fill, '3', '$fourth_downliner');
			$count_completed_id = 0
		}else
		{
			submit_downlines($level_fill, '3', 'not');
			$count_completed_id = 0
		}
		
		///////////////////////////////this line calls the count_downlinersfunction for the fifth downliner to check if the it has upto 6 downliner
		for($a = 0; $a<3; $a++){
			
			count_downliners($fifth_downliner, $level_fill);
			$downliner_id = $array_population_current[$i];
			
		}
		if($count_completed_id == 6)
		{
			submit_downlines($level_fill, '4', '$fifth_downliner');
			$count_completed_id = 0
		}else
		{
			submit_downlines($level_fill, '4', 'not');
			$count_completed_id = 0
		}
		
		///////////////////////////////this line calls the count_downlinersfunction for the sixth downliner to check if the it has upto 6 downliner
		for($a = 0; $a<3; $a++){
			
			count_downliners($first_downliner, $level_fill);
			$downliner_id = $array_population_current[$i];
			
		}
		if($count_completed_id == 6)
		{
			submit_downlines($level_fill, '1', '$first_downliner');
			$count_completed_id = 0
		}else
		{
			submit_downlines($level_fill, '1', 'not');
			$count_completed_id = 0
		}
	
		
}



function count_downliners($id, $level_fill)
{
	global $con;
	
	$arrayposition = 0;
	
	$sql = "SELECT * FROM users WHERE upliner = '$id'";
	$query_downliner = $con->query($sql);
	
	if($query_downliner->num_rows > 0)
	{
		while($row_downliner = mysqli_fetch_array($query_downliner))
		{
			if($level_fill == "starter"){
				submit_downlines($level_fill, '$arrayposition', '$downliner_to_add');
			}
			$array_population_current[$array_position] = $row_downliner['referalid'];
			$downliner_to_add = $row_downliner['referalid'];
		
			$arrayposition = $arrayposition + 1;
			
			$count_completed_id++; /////////////////////this counts the no of downlines that completed their two downlines
			
			$level_position_check++; //////////////////this line checks if the selected downline from the databse this id is upto two 
		}
		
			if($level_position_check <2){
			
									if($level_fill == "starter"){	
										submit_downlines($level_fill, '$arrayposition', 'not');
									}
										$array_population_current[$arrayposition] = "not";
										$arrayposition = $arrayposition + 1;
											
									}
		
	}else{ ////////////////////////////// if the id does not have downliner at all
										
				for($a = 0; $a<2; $a++){
					if($level_fill == "starter"){
							submit_downlines($level_fill, '$arrayposition', 'not');																										
						$array_population_current[$arrayposition] = "not";
						$arrayposition = $arrayposition + 1;
					}						
			}
		}
	
}

function submit_downlines($level_fill, '$arrayposition', '$downliner_to_add'){
	
	if($level_fill == '1'){
					fill_downliner('level1downliners', '$arrayposition', '$downliner_to_add')  ////////////////this calls the function that fills the downline table
				}
			elseif($level_fill == '2'){
					fill_downliner('level2downliners', '$arrayposition', '$downliner_to_add')  ////////////////this calls the function that fills the downline table
				}
			elseif($level_fill == '3'){
					fill_downliner('level3downliners', '$arrayposition', '$downliner_to_add')  ////////////////this calls the function that fills the downline table
				}
			elseif($level_fill == '4'){
					fill_downliner('level4downliners', '$arrayposition', '$downliner_to_add')  ////////////////this calls the function that fills the downline table
				}
			elseif($level_fill == '5'){
					fill_downliner('level5downliners', '$arrayposition', '$downliner_to_add')  ////////////////this calls the function that fills the downline table
				}
			elseif($level_fill == '6'){
					fill_downliner('level6downliners', '$arrayposition', '$downliner_to_add')  ////////////////this calls the function that fills the downline table
				}
				elseif($level_fill == 'starterdownliners'){
					fill_downliner('level6downliner', '$arrayposition', '$downliner_to_add')  ////////////////this calls the function that fills the downline table
				}
}

function fill_downliner('$table_to_fill', '$column', '$downliner'){
	global $myid;
	
	$sql = "UPDATE $stable_to_fill SET person$column = '$downliner' WHERE id='$myid'";
	$query_fill_downline = $con->query($sql);
	
	if(!query_fill_level){
		echo"THE ERROR IN FILLING YOUR DOWNLINE IS $con->error";
	}
}

function set_level($id, $column_to_fill){
	
	global $con;
	
	$sql = "UPDATE downliner SET $column_to_fill = '1' WHERE id='$id'";
	$query_fill_level = $con->query($sql);
	
	if(!query_fill_level){
		echo"THE ERRORIN SETTING THE LEVEL IS: $con->error";
		exit();
	}
	
	
}

function give_reward($id, '$table_fill'){
	
	$con;
	
	
	switch($table_fill){
		case '1':
		global $starter;
		$sql_setreward = "UPDATE starter SET amount = $starter, gift = 'phone' WHERE id = '$id'";
		$con->query($sql_setreward);
		break;
		
		case '2':
		global $level1reward;
		$sql_setreward = "UPDATE stage1_reward SET amount = $level1reward, gift = 'phone' WHERE id = '$id'";
		$con->query($sql_setreward);
		break;
		
		case '3':
		global $level2reward;
		$sql_setreward = "UPDATE stage2_reward SET amount = $level2reward, gift = 'phone' WHERE id = '$id'";
		$con->query($sql_setreward);
		break;
		
		case '4':
		global $level4reward;
		$sql_setreward = "UPDATE stage3_reward SET amount = $level4reward, gift = 'phone' WHERE id = '$id'";
		$con->query($sql_setreward);
		break;
		
		case '5':
		global $level5reward;
		$sql_setreward = "UPDATE stage4_reward SET amount = $level5reward, gift = 'phone' WHERE id = '$id'";
		$con->query($sql_setreward);
		break;
		
		case '6':
		global $level6reward;
		$sql_setreward = "UPDATE stage5_reward SET amount = $level6reward, gift = 'phone' WHERE id = '$id'";
		$con->query($sql_setreward);
		break;
		
		case '7':
		global $level7reward;
		$sql_setreward = "UPDATE stage6_reward SET amount = $level7reward, gift = 'phone' WHERE id = '$id'";
		$con->query($sql_setreward);
		break;
	}
	
	
}
?>