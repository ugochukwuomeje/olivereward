
<?php
$pick_from_monitor = 0;////////this points to array location to pick the upliner
$reach_monitor = 0;

$arraypointer_tostore = 0; ////////this points to array location to store the upliner

$target_person = 2; ///ths is the no of persons to put into array
$reach_person = 0;
$arraytarget_pickperson = 2;
$pick_from[0] = "ijeoma";

$arrayputmonitorreach = 2;
$arrayputuplinerpointer = 0;
$arrayputmonitorstart = 0;
$arrayupliner[0] = "not";

for($a=1; $a<=6; $a++)
{

if($reach_person == $target_person)
		{
			$reach_person = 0;
			$target_person = $target_person * 2;
			$pick_from_monitor = 0;
			
		}
		if($arrayputmonitorstart == $arrayputmonitorreach){
		
		$pick_from = array_replace($pick_from, $arrayupliner);
		$arrayputmonitorreach = $arrayputmonitorreach * 2;
		$arrayputmonitorstart = 0;
		$arrayputuplinerpointer = 0;
		
	}
	if($reach_monitor == 0)
	{

			$upliner = $pick_from[$pick_from_monitor];
			  $pick_from_monitor++;
			
	}
		

		$reach_monitor++;
		$reach_person++;
		
		if($reach_monitor == 2){
			$reach_monitor = 0;
			
		}	

	$uplinertoputintoarray = "upliner".$a;
	
	
	
	$arrayupliner[$arrayputuplinerpointer] = $uplinertoputintoarray;
	$arrayputuplinerpointer++;
	$arrayputmonitorstart++;

	
		echo"$upliner ";
		echo" upliner to put into array $uplinertoputintoarray  <br>";
	
}
		

?>		