<?php
ini_set('max_execution_time', 18000);
session_start();
include("../connection/db.php");

	$username = mysqli_real_escape_string($con, $_POST["username"]);
	$adminusername = mysqli_real_escape_string($con, $_POST["adminusername"]);
	$adminpassword = md5($_POST["adminpassword"]);
	
	$sql_checkadmin = $con->query("SELECT * FROM admin WHERE username = '$adminusername' AND password='$adminpassword' LIMIT 1");
	
	if(!$sql_checkadmin->num_rows >0){
		
		echo"ADMIN LOGIN DETAILS INCORRECT";
		exit();
	}
	$row_checkadmin = mysqli_fetch_array($sql_checkadmin);
	
	$adminfirstname = $row_checkadmin['first_name'];
	$adminlastname = $row_checkadmin['last_name'];
	$date = time();
	
	$sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
	
	//////////////////get the dollar rate
	$sql_dollar = "SELECT * FROM dollarrate";
	$query_dollar = $con->query($sql_dollar);
	$row_dollar = mysqli_fetch_array($query_dollar);
	
	$dollar_rate = $row_dollar['rate'];
	
	$run_query = mysqli_query($con, $sql);
	
	if(!$run_query)
	{
		echo"$con->error";
		exit();
	}
	$count = mysqli_num_rows($run_query);
	
	if($count > 0)
	{
		$row =mysqli_fetch_array($run_query);
		$_SESSION["l_name"] = $row["last_name"];
		$_SESSION["f_name"] = $row["first_name"];
		$_SESSION['reflink'] = $row['reflink'];
		$_SESSION['id'] = $row['referalid'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['loggedin'] = 1;
		$_SESSION['status'] = $row['active'];
		$_SESSION['dollar_rate'] = $dollar_rate;
		$id = $row['referalid'];
		
		$arrayposition = 0;;
		$repeat;
		$check_when_to_stop;
		$array_population_current;
		get_downliners3($username);
	
		if($first_call == 1)
		{
			
			get_downliners2();
			
		}
		
		$insert_into_monitor = $con->query("INSERT INTO monitor(firstname, lastname, username, task, date)VALUES('$adminfirstname', '$adminlastname', '$adminusername', 'you loggedin to $username account', '$date')");
				echo"1";				
	}
	else{
		echo"Invalid username or password ";
		exit();
	}
	 
/////////////////////////////////////////////////////////////////////////////
		

function get_downliners2(){
		$i = 0;
		global $username;
		global $con;
		global $arrayposition;
		global $repeat;
		global $array_population_current;

		
					for($a = 0; $a<count($array_population_current); $a++){
						$id = $array_population_current[$a];

						
						 //$repeat = 0;
						 //$i++;
						get_downliners3($id);
					}
					
//////////////////////////////////////////////////////////////////this section updates the populations
$sql_update_population = "UPDATE population SET number = '$a' WHERE username = '$username' ";
$query_population = $con->query($sql_update_population);
if(!$query_population)
{
	echo"THE ERROR IN UPDATING THE POPULATIONIS: $con->error";
	exit();
}
/////////////////////////////////////

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
////////////////////////////////////////////////////////////////////////////	

?>