<?php

include("../connection/db.php");

$f_name = $_POST["firstname"];
$l_name = $_POST["lastname"];
$email = $_POST["email"];
$country_id = $_POST["country"];
$state_id = $_POST["state"];
$city = $_POST["city"];
$password = $_POST["password"];
$repassword = $_POST["retypepassword"];
$mobile = $_POST["mobile"];
$gender = $_POST['gender'];
$sponsor = $_POST["sponsor"];
$upliner = $_POST["upliner"];
$address = $_POST['address'];

///////////////////////////////////////bank information
$bank = $_POST["bank"];
$accountname = $_POST["accountname"];
$accountnumber = $_POST['accountnumber'];

//////////////////////////////////////reterievee state with the state id
$sql_state = "SELECT name FROM states WHERE id = '$state_id'";
$state_query = $con->query($sql_state);
$state_row = mysqli_fetch_array($state_query);
$state = $state_row["name"];

///////////////////////////////////////////reterieve country using country id
$sql_country = "SELECT name FROM countries WHERE id = '$country_id'";
$country_query = $con->query($sql_country);
$country_row = mysqli_fetch_array($country_query);
$country = $country_row["name"];

$emailvalidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$numbervalidation = "/^[0-9]+$/";

if(empty($f_name) ||empty($l_name) ||empty($email) ||empty($country) ||
empty($state) ||empty($city)||empty($password)||empty($repassword)||empty($mobile)||empty($gender)||empty($sponsor)||empty($upliner)||empty($address)){
	
	echo"
	 One of the reqiured field is empty
	";
	exit();
}
if(!preg_match($emailvalidation,$email)){
	echo"
			 This email $email address is not valid
			";
	exit();
}
if(strlen($password) < 6){
	echo"password is weak it should be more than 5 letters";
	exit();
}
if($password != $repassword){
		echo"password is not same
			";
	exit();
}
if(!preg_match($numbervalidation,$mobile)){
	echo"
			 Mobile number $mobile  is not valid
			
			";
	exit();
}
if((strlen($mobile) < 10 )){
	echo"
			 mobile number is not correct
			
			";
	exit();
}

///////////////////////////////////////////////////////////////////////////////check whether the upliner is active	
			$sql = "SELECT * FROM users WHERE referalid = '$upliner'"; 

			$check_query = $con->query($sql);

			if(!$check_query->num_rows>0)
			{
				echo"UPLINER ID DOES NOT EXIST
					";
					exit();
			}
			$row = mysqli_fetch_array($check_query);
			$account_status = $row["active"];
			
			if($account_status == 0 ){
				
				echo"UPLINER ACCOUNT INACTIVE";
					exit();
			}
		
			
///////////////////////////////////////////////////////////////////////////////check whether the sponsor is active	
			$sql_sponsor = "SELECT * FROM users WHERE referalid = '$sponsor'"; 

			$check_query_sponsor = $con->query($sql_sponsor);

			if(!$check_query_sponsor->num_rows>0)
			{
				echo"SPONSOR ID DOES NOT EXIST
					";
					exit();
			}
			$row = mysqli_fetch_array($check_query_sponsor);
			$account_status = $row["active"];
			
			if($account_status == 0 ){
				
				echo"SPONSOR ACCOUNT INACTIVE";
					exit();
			}
			
	//existing email in our database
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1"; 

$check_query = mysqli_query($con,$sql);
$count_email = mysqli_num_rows($check_query);

//////////////////////echck whether referal id existing
if($count_email > 0){
	echo"Email Address is already taken Try Another email address";
	
exit(); 
	}
	else
	{	
				$password = md5($password);
				
					$myid = generate_code(10);
					
					if($myid == '0')
				{
					echo"
						 CANNOT GENERATE ID TRY AGAIN
						";
						exit();
				}
	
		register_upliner($sponsor, $upliner, $myid );

	}


function register_upliner($sponsor, $upliner, $myid)
	{
			
			
			global $f_name;
			global $l_name;			
			global $email;
			global $country;
			global $state;
			global $city;
			global $password;
			global $mobile;
			global $gender;
			global $sponsor;
			global $upliner;
			global $address;
			
			global $bank;
			global $accountnumber;
			global $accountname;
			
			global $con;
		
			
		$date = date("Y-m-d");
		$reflink = "https://www.oliveexpress.com/signup.php?sponsor=$myid";
		
			create_account($myid);
			create_wallet($myid);
	
	$sql = "INSERT INTO users
	(first_name, last_name, email, country, state, city, password, mobile, gender, sponsor, upliner, referalid, reflink address, active, completed, date)
	VALUES ('$f_name', '$l_name', '$email', '$country', '$state', '$city', '$password','$mobile','$gender','$sponsor','$upliner', '$myid', '$reflink','$address', '0', '0', '$date')";	
	$run_query = mysqli_query($con,$sql);
	 
	 $sql_billing_address = "INSERT INTO billing_address( referalid, email, country, state, city, mobile, address)VALUES
	 ('$myid','$email', '$country', '$state', '$city','$mobile','$address')";
	 
	 $query_billing = $con->query($sql_billing_address);
	 
	 if(!$query_billing)
	 {
		echo"billing address error$con->error";
		exit();
	 }
	 
	 if(!$run_query){
		 echo"$con->error";
	 }
				
				$sql3 = "INSERT INTO id (email, id) value('$email', '$myid')";
					
				$run_query2 = $con->query($sql3);
				
				 
				 if($run_query2){
					 
					 increament_population($upliner);
					
					
					 echo"1";
					
					$body = "Hello $f_name $l_name Welcome to finnacle fund international. your account has been activated 
					please login wtih your details to start participating right away <b>Referal</b><br>Your referal link is $reflink";					
				 mail($email,'Welcome', $body,'From: finnacle support services' );
					
					
					
			}
			 else {
				 $error = $con->error;
						 echo"
					 COULD NOT BE REGISTERED $error..!
					";
						exit();
			}
			
			
	}	
	
	/////////////////////////////////////////this is the function for generating code
	
function generate_code($length)
	{
		
			$return_value;
			do{
			global $repeat;
			global $status;		
		
  		
				if ( ! function_exists('openssl_random_pseudo_bytes'))
			{
				throw new RuntimeException('OpenSSL extension is required.');
				echo"
					 OpenSSL REQUIRED!
					";
			exit();
			}

			$bytes = openssl_random_pseudo_bytes($length );

			if ($bytes === false)
			{
				echo"
					 Unable to generaye Id!
					";
				exit();
			}
			else{
			$return_value = substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
				
			$status = check_code($return_value);
			}
		}while($status == true);
		
		return $return_value; 
	
	}
	
	/////////////////////////this function prevents it from generating already generated code
	function check_code($checkbyte)
	{ 	
		global $con;
		global $repeat;
		global $status;
		$sql = "SELECT * FROM id WHERE id = '$checkbyte'";
			 $result = $con->query($sql);
			 
			 if ($result->num_rows > 0) {
				 $repeat = 1;	
            
				$status = true;
			 }	
			else {
				$repeat = 0;		
				$status = false;
			 }	
			return $status;
	}
	
	function create_account($myid) // this ceates account record for the newlly registered member
	{       
		global $con;
		
		$sql = "INSERT INTO account(id, out_flow, balance, pay_status, amount, paid_date)
				value('$myid', 0, 0, 0, 0, 0)";
				
				$result =$con->query($sql);
				
				if(!$result){
					echo"creat account ! cannot creat account";
					exit();
				}
			
	}
	
	function create_wallet($myid) // this creates wallet for the newly registered member 
	{       
		global $con;
		
		$sql = "INSERT INTO wallet(id, amount)
				value('$myid', '0')";
				
				$result =$con->query($sql);
				
				if(!$result){
					echo"creat account ! cannot creat wallet";
					exit();
				}
				
	}	
	
	
	function increament_population($upliner){
		global $con;
		$sql = "SELECT * FROM users WHERE id = '$upliner'";
		$run_query = $con->query($sql);
		
		if(!$run_query){
				echo"creat account ! cannot increament population";
				exit();
			}
			
		$row = mysqli_fetch_array($run_query);
		$completed = $row['completed'];
		
		if($completed <2)
		{
			$completed = $completed + 1;
			$sql2 = "UPDATE users SET completed = '$completed' WHERE id = '$upliner'";
			$run_query2 = $con->query($sql2);
			
		}
		
		
	}
	
?>