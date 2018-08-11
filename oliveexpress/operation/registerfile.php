<?php
if(!isset($_POST['termsandcondition'])){
	
	echo"YOU HAVE TO AGREE WITH THE TERMS AND CONDITIONS";
	exit();
}
ini_set('max_execution_time', 18000);
include("../connection/db.php");

$sponsor = strtolower(escape_data($_POST["sponsor"]));
$upliner = strtolower(escape_data($_POST["upliner"]));
$f_name = escape_data($_POST["firstname"]);
$l_name = escape_data($_POST["lastname"]);
$country = escape_data($_POST["country"]);
$state = escape_data($_POST["state"]);
$city = escape_data($_POST["city"]);
$email = escape_data($_POST["email"]);
$email = strtolower($email);
$mobile = escape_data($_POST["mobile"]);
$gender = escape_data($_POST['gender']);
$address1 = escape_data($_POST['address1']);
$address2 = escape_data($_POST['address2']);
$payoption = escape_data($_POST['payoption']);




//////////////////////////////////////////////check whether the upline is under the tree of the sponsor
$repeattree = 1;
$uplinertoreturn = $upliner;


if(!($sponsor == $upliner)){
while($repeattree == 1){
	
	$uplinertree = $upliner;
	$sponsortreetocheck = $sponsor;
	$whentostop = "g4";
	
	$query_check_sponsortree = $con->query("SELECT * FROM users WHERE username = '$uplinertoreturn'");
	if(!$query_check_sponsortree->num_rows >0 )
	{
		echo"the upliner does not exist $uplinertoreturn";
		$repeattree = 0;
		exit();
	}
	
	
	$row_query_sponsortree = mysqli_fetch_array($query_check_sponsortree);
	$retrievednextupliner = $row_query_sponsortree['upliner'];
	
	if($retrievednextupliner == $sponsortreetocheck){
	
		$repeattree = 0;
	}
	
	if($retrievednextupliner == $whentostop){
		
		echo"$upliner is not under the tree of sponsor $sponsortreetocheck";
		exit();
		$repeattree = 0;
	}
	
	$uplinertoreturn = $retrievednextupliner;

}
}



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

$no_of_refered_starter = 0;

//////////////////////////////////////////////////this section is for the gifts
$sql_gift_reward = "SELECT * FROM stage_gifts";
$query_gift_reward = $con->query($sql_gift_reward);
$row_gift_reward = mysqli_fetch_array($query_gift_reward);

$level1gift = $row_gift_reward['level1'];
$level2gift = $row_gift_reward['level2'];
$level3gift = $row_gift_reward['level3'];
$level4gift = $row_gift_reward['level4'];
$level5gift = $row_gift_reward['level5'];
$level6gift = $row_gift_reward['level6'];
$starter_gift = $row_gift_reward['starter'];

$sql_referal_bonus = "SELECT * FROM referalbonus";
$query_referal_bonus = $con->query($sql_referal_bonus);
$row_referal_bonus = mysqli_fetch_array($query_referal_bonus);

$client_referal_bonus = $row_referal_bonus['amount'];
$registration_amount = $row_referal_bonus['registration_amount'];
		
//////////////////////////////////////////////////////////get the registration bonus



/////////////////////////////////this array is used in finding the postion of the new registrant for the second upliner it is used in the findposition_fillarray function
$array_population_current[0] = 'not';

$arrayposition_higherupliner = 0;//////this is the variable increments in fillhigheruplinerarray function to points to the next array position for storing the sponsor

$proceed = 0;//////////////////////////this variable determines whether the program will continue

///////////this variable is used in the findposition_fillarray for pointing to the position where the downliner will be stored for the upliner
$arrayposition = 0; 

$repeat = 0;

$year = escape_data($_POST['year']);
$month = escape_data($_POST['month']);
$day = escape_data($_POST['day']);

$verify_username = 0;
$array_population[0] = 0;
$repeatlowerupliner = 0;

$arrayrealhigherupliner[0] = '0';  ////////////////this array is used in fillhigheruplinerarray function when looking for the real downliner when the sponsor has passed the second upliner to the registrant

$payeename = escape_data($_POST['payeename']);
$payeepassword = escape_data($_POST['payeepassword']); /////////////////payee password 

$username = escape_data($_POST["username"]);
$password = escape_data($_POST["password"]);
$repassword = escape_data($_POST["retypepassword"]);

$transactionpassword = escape_data($_POST['transactionpassword']);
$confirmtransactionpassword = escape_data($_POST['confirmtransactionpassword']);


///////////////////////////////////////bank information
$bank = escape_data($_POST["bank"]);
$accountname = escape_data($_POST["accountname"]);
$accountnumber = escape_data($_POST['accountnumber']);



$emailvalidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$numbervalidation = "/^[0-9]+$/";

if(empty($upliner)|| empty($sponsor)|| empty($f_name) ||empty($l_name) ||empty($country) || empty($city) || empty($email) ||empty($mobile)||empty($gender)||empty($address1)||empty($address2)||empty($year)||empty($month)||empty($day)||empty($payeename)||empty($username) ||empty($password)||empty($repassword)||empty($transactionpassword)||empty($payeepassword)||empty($confirmtransactionpassword)){
	
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
if($transactionpassword != $confirmtransactionpassword){
		echo"the transactionpassword are not same
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

//////////////////////////////////////////////////////////////////////////////////check whether the upliner is active	
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
			$account_completed = $row["completed"];
			
			if($account_status == 0 ){
				
				echo"UPLINER ACCOUNT INACTIVE";
					exit();                           
			}

			
//////////////////////////////////////////////////////////////////////////////////check whether the upliner is completed	
					
			if($account_completed == 2 ){
				
				echo"THE UPLINER $upliner CANNOT HAVE MORE THAN TWO DOWNLINERS";
				exit();
			}	
			
			
////////////////////////////////////////////////////////////////////////check whether payee password exist
		    
			$sql_check_payeepasswword = "SELECT * FROM users WHERE username = '$payeename' AND transactionpassword='$payeepassword'"; 

			$check_check_payeepasswword = $con->query($sql_check_payeepasswword);

			if(!$check_check_payeepasswword->num_rows>0)
			{
				echo"PAYEE TRANSACTION PASSWORD DOES NOT EXIST ";
					exit();
			}			
			
///////////////////////////////////////////////////////////////////////check whether payee has upto 5000 in the account
			$sql_check_account = "SELECT * FROM wallet WHERE id = '$payeename'"; 

			$query_check_account = $con->query($sql_check_account);

			if(!$query_check_account->num_rows>0)
			{
				echo"PAYEE WALLET ACCOUNT DOES NOT EXIST";
					exit();
			}else{
				
				$row_payeeamount = mysqli_fetch_array($query_check_account);
				$balance = $row_payeeamount['amount'];
				
				if($balance < $registration_amount){
					
					echo"INSUFFICEINT BALANCE IN PAYEE WALLET";
					exit();
				}
				
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
			
			
//////////////////////////////////////////////////////////////////////////////check whether the username is existing
$sql_username = "SELECT * FROM users WHERE username = '$username' LIMIT 1"; 

$username_query = mysqli_query($con,$sql_username);
$count_username = mysqli_num_rows($username_query);

if($count_username > 0){

echo"Username is already taken Try Another Username";
	
exit(); 
	}			

			
			
		
				$password = md5($password);
				
				
					$myid = $username;
					
					if($myid == '0')
				{
					echo"
						 CANNOT GENERATE ID TRY AGAIN
						";
						exit();
				}
	
		register_upliner($sponsor, $upliner, $myid); 
		updatepayeewallet($payeename, $username, $registration_amount);
		givereferalbonus($sponsor, '0');
		
		creditaccountsummary($sponsor, $client_referal_bonus, $myid);
		create_starter_row($myid);
		levelfornewregistrant($myid);
		
		increment_directdownliner_for_firstupliner('starterdownliners', $upliner, "users", '0', '0');
		
		

	

////////////////////////////////////////////////////////////////////////////////////////////this closes the first for loop
function register_upliner($sponsor, $upliner, $myid)
	{
			
			global $sponsor;
			global $upliner;
			global $f_name;
			global $l_name;
			global $country;
			global $state;
			global $city;			
			global $email;
			global $mobile;
			global $gender;
			global $address1;
			global $address2;
			global $year;
			global $month;
			global $day;
			global $payeename;
			
			global $username;
			global $password;
			global $retypepassword;
			global $transactionpassword;
		
			global $bank;
			global $accountnumber;
			global $accountname;
			global $payoption;
			
			global $con;
		
			
		$date = date("F d, Y h:i:s A");
		$reflink = "https://www.olivereward.com/signup.php?sponsor=$myid";
		
			
			
	
		$sql = "INSERT INTO users
		(sponsor, upliner, first_name, last_name, country, state, city,  email,  mobile, gender,  address1, address2, year, month,  day, payeename, payoption, username, password, transactionpassword,  referalid, reflink, active, completed, date)
		VALUES ('$sponsor','$upliner','$f_name', '$l_name','$country',  '$state', '$city','$email', '$mobile','$gender','$address1','$address2','$year','$month','$day','$payeename', '$payoption', '$username','$password','$transactionpassword', '$myid', '$reflink', '1', '0', '$date')";	
		$run_query = mysqli_query($con,$sql);
		
		if(!$run_query){
			 echo"the error is  $con->error";
			 exit();
		 }
		 
		 
		 insert_into_starter($sponsor);
		 
		////////////////////////////////////////////////////////////this line creates the wallet
		////////////////////////////create stater_referals
		 $con->query("INSERT INTO starter_referals(username, number)VALUES('$username','0')");
		
			create_wallet($myid);
	 
			 $sql_billing_address = "INSERT INTO billing_address( referalid, email, country, state, city, mobile, address1, address2)VALUES
			 ('$myid','$email', '$country', '$state', '$city','$mobile','$address1', '$address2')";
			 
			 $query_billing = $con->query($sql_billing_address);
			 
			 if(!$query_billing)
			 {
				echo"billing address error$con->error";
				exit();
			 }
			 
			 
			 //////////////////////////////////creat bank details
			 $query_bank = "INSERT INTO bankdetails (id, bank, acc_name, acc_number) VALUES('$myid', '$bank', '$accountname', '$accountnumber')";
		
	$con->query($query_bank);
				
	 
				
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
		$sql = "SELECT * FROM users WHERE username = '$upliner'";
		$run_query = $con->query($sql);
		
		if(!$run_query){
				echo"create account ! cannot increment population";
				exit();
			}
			
		$row = mysqli_fetch_array($run_query);
		$completed = $row['completed'];
		
		if($completed <2)
		{
			$completed = $completed + 1;
			$sql2 = "UPDATE users SET completed = '$completed' WHERE referalid = '$upliner'";
			$run_query2 = $con->query($sql2);
			
		}
		
		
	}
	
	///////////////////////////////////////this function insert the new registrant for the first upliner and also create record in the population table
	function create_starter_row($id){
		global $con;
		
		$sql_population = "INSERT INTO population(username, number)VALUES('$id','0')";
		$query_resetpopulation = $con->query("$sql_population");
		
		$sql = "INSERT INTO starterdownliners (id, population, directdownliner)VALUES('$id','0','0')";
		$sql_query = $con->query($sql);
		
		if(!$sql_query)
		{
			echo"THE ERROR IN CREATING A STARTER ROW IS $con->error";
			exit();
		}
		
		//////////////////////////this line insert into the six table for the registrant
		for($a = 1; $a<=6; $a++)
		{
			$levelndownliner = "level".$a."downliners";
			$sql_sixdownlines = "INSERT INTO $levelndownliner (id, population, directdownliner)VALUES('$id','0','0')";
			$query_sixdownlines = $con->query($sql_sixdownlines);
			
			if(!$query_sixdownlines)
			{
				echo"THE ERROR IN CREATING ROW IN $levelndownliner IS $con->error";
				exit();
			}
			
		}
	}
	
	
	//////////////////////////////////////this function sets the current level of the registeres user_error
	
	function levelfornewregistrant($username){
		global $con;
		
		$sql = "INSERT INTO currentlevel(id, mycurrentlevel)VALUES('$username', '0')";
		$sql_query = $con->query($sql);
		
		if(!$sql_query)
		{
			echo"could not create row in the currentlevel table";
			exit();
		}
	}
	
	//////////////////////this line increment the population for the first upliner
	function increment_directdownliner_for_firstupliner($tablename, $username, $seconuplinertable, $level , $payingdownliner){
		
		global $con;
		$leveluse  = $level;
		/////////////////////////////this variable stores the number of population of the first upliner in the given table name specified by $tablename
		
		$number_of_downliner = 0;
		$second_upliner = "not";
		/////////////////////////////////////////////////////////////////////////////////check if the first upliner exist in the given levelndownliner table
		$sql = "SELECT * FROM $tablename WHERE id = '$username'";
		$query_create_downliner = $con->query($sql);
		
		if(!$query_create_downliner->num_rows >0){
			
			echo"first upliner $username does not exist in the $tablename table";
			exit();
		}
		
		/////////////////this line gets the population of the first downliner
		if($query_create_downliner->num_rows > 0)
		{
			$row_create_downliner = mysqli_fetch_array($query_create_downliner);
			
			$number_of_downliner = $row_create_downliner['population'];
			$number_of_directdownliner = $row_create_downliner['directdownliner'];
			
			
			//////////////////////////////////////////////////////////////////////////THIS LINE INCREMENTS THE TOTAL DOWNLINER IN THE levelndownliner table for the first upliner
			$query_increment_firstupliner = $con->query("UPDATE $tablename SET population = population + 1 WHERE id = '$username'");
			
			if(!$query_increment_firstupliner)
			{
				echo"THE ERROR IN INCREAMENTING THE TOTAL POPULATION IN STARTERDOWNLINER TABLE FOR THE FIRST UPLINER IS: $con->error";
				exit();
			}else{
				
				if($leveluse > 0)
					{
						givereferalbonus($username, $leveluse);
						received_stage_bonus($leveluse,  $username, $payingdownliner);
					}
			
			}
			
			
			/////////////////////////////////////THIS LINE INCREMENTS DIRECT DOWNLINER UNTILS IT IS 2
			if($number_of_directdownliner <2){
				$query_increment_directdownliner = $con->query("UPDATE $tablename SET directdownliner = directdownliner + 1 WHERE  id = '$username'");
				
				if(!$query_increment_directdownliner)
				{
					echo"THE ERROR IN INCREAMENTING THE TOTAL POPULATION IN STARTERDOWNLINER TABLE FOR THE FIRST UPLINER IS: $con->error";
					exit();
				}
			}
			
			//////////////////////////////////////get the second upliner
			
			if(!($username == "oliveexpress")&&!($username == "oliveexpress2")&&!($username == "oliveexpress3")&&!($username == "oliveexpress4")&&!($username == "oliveexpress5")&&!($username == "oliveexpress6")){
					$sql_second_upliner = $con->query("SELECT * FROM $seconuplinertable WHERE username = '$username'");
					if($sql_second_upliner->num_rows >0)
					{
						$row_second_upliner = mysqli_fetch_array($sql_second_upliner);
						$second_upliner = $row_second_upliner['upliner'];
						increment_directdownliner_for_secondupliner($tablename, $second_upliner, $leveluse, $payingdownliner);
					}
					else{
						echo"THE SECOND UPLINER TO $username DOES NOT EXIST IN THE $seconuplinertable";
						exit();
					}
					
			}
		}
		
	}
	
	function increment_directdownliner_for_secondupliner($tablename, $username,$level, $payingdownliner)
	{
		
		global $con;
		global $proceed;
		$sponsor = "not";
		
		$second_upliner = $username; ///////////////// this line puts the second upliner id into this second_upliner variable
		
		$sql = "SELECT * FROM $tablename WHERE id = '$username'";
		$query_downliner_for_secondupliner = $con->query($sql);
		
		if(!$query_downliner_for_secondupliner){
			
			echo"the error in selecting from $tablename table is second upliner does not exist in the $tablename table";
			exit();
		}
		
		if($query_downliner_for_secondupliner->num_rows >0)
		{
			$row_downliner_for_secondupliner = mysqli_fetch_array($query_downliner_for_secondupliner);
			
			$number_of_downliner = $row_downliner_for_secondupliner['population'];
			$number_of_downliner = $number_of_downliner + 1;
			
			///////////////////////////////////////THIS LINE INCREMENTS THE TOTAL DOWNLINER FOR THE SECOND UPLINER
			
			$query_increment_secondupliner = $con->query("UPDATE $tablename SET population = '$number_of_downliner' WHERE id = '$username'");
			
			if(!$query_increment_secondupliner)
			{
				echo"THE ERROR IN INCREAMENTING THE TOTAL POPULATION IN $tablename TABLE FOR THE SECOND UPLINER IS: $con->error";
				exit();
			}else{
				
				if($level > 0)
					{
						givereferalbonus($username, $level);
						received_stage_bonus($level,  $username, $payingdownliner);
					}
			
			}
			
			$sql_check_complete_downliner = "SELECT * FROM $tablename WHERE id = '$username'";
			$query_sql_check_complete_downliner = $con->query($sql_check_complete_downliner);
			$row_downliner = mysqli_fetch_array($query_sql_check_complete_downliner);
			$check_number_of_downliner = $row_downliner['population'];
			
			if($check_number_of_downliner == '6'){
				
				$proceed = 1;
				setreward($level, $second_upliner);
				/////////////////////////////////////// this section updates the current level
				$sql_update_currentlevel = "UPDATE currentlevel SET mycurrentlevel = mycurrentlevel+1 WHERE id = '$second_upliner'";
				$sql_query_querylevel = $con->query($sql_update_currentlevel);
				
				
				if(!$sql_query_querylevel)
				{
					echo"could not update currentlevel table $con->error";
					exit();
				}
				
				
				
	//////////////////////////////////////////////////////this point selects the current the level of the second upliner
				
				$query_currentlevel = $con->query("SELECT * FROM currentlevel WHERE id = '$username'");
				$row_current_level = mysqli_fetch_array($query_currentlevel);
				
				$level = $row_current_level['mycurrentlevel'];
				
				//////////////////////////////////////////this line set the reward
				
				
				
				///////////////////////////this line gets the sponsor
				$query_getsponsor  = $con->query("SELECT * FROM users WHERE username = '$second_upliner'");
				
				if(!$query_getsponsor)
				{
					echo"THE ERROR IN GETTING SPONSOR IS $con->error";
					exit();
				}
				if($query_getsponsor->num_rows > 0)
				{
					$row_getsponsor = mysqli_fetch_array($query_getsponsor);
					$seconduplinersponsor = $row_getsponsor['sponsor'];
					
					////////////////////////////////////////call the function that verifies if the second upliner sponsor is at thesame level
					$qualifiedsponsor = '0';
					$qualifiedsponsor =	verifyseconduplinersponsor($level, $seconduplinersponsor, $second_upliner);
					
					if(($qualifiedsponsor == '0')||($qualifiedsponsor == "")||($qualifiedsponsor == 'not')){
						echo"could not get sponsor";
						exit();
					}
					
					//////////////////////////////////this line puts the secondupliner and the sponsor in the
					
					$leveldirectdownliner = "level".$level."directdownliner";
					$sqlsubmitdirecdownliner = "INSERT INTO $leveldirectdownliner(username,  upliner)VALUES('$second_upliner', '$qualifiedsponsor')";
					$querysubmitdirectdownliner = $con->query($sqlsubmitdirecdownliner);
					
					if(!$querysubmitdirectdownliner)
					{
						echo"THE ERROR IN SUBMITTIN TO level $level directdownliner TABLE IS $con->error";
						exit();
					}
					
					increment_directdownliner_for_firstupliner("level".$level."downliners", $qualifiedsponsor, "level".$level."directdownliner", $level, $second_upliner);
					
				}
		
			}
		
				
			}else{
			
			echo"SECOND UPLINER $username DOES NOT EXIST IN THE $tablename TABLE";
			exit();
			}
			
			
		}
	
	
		function setreward($level, $username)
		{
			global $no_of_refered_starter;
			global $con;
			global $no_of_refered_starter;
			global $level1reward;
			global $level2reward;
			global $level3reward;
			global $level4reward;
			global $level5reward;
			global $level6reward;
			global $starter_bonus;
			
			 $sumlevel1reward = $level1reward * 6;
			 $sumlevel2reward = $level2reward * 6;
			 $sumlevel3reward = $level3reward * 6;
			 $sumlevel4reward = $level4reward * 6;
			 $sumlevel5reward = $level5reward * 6;
			 $sumlevel6reward = $level6reward * 6;
			
			
			global $level1gift;
			global $level2gift;
			global $level3gift;
			global $level4gift;
			global $level5gift;
			global $level6gift;
			global $starter_gift;
			
			
			switch($level){
				
				case '0':
				get_number_stater_referals($username);
				$sumstarter_bonus  = $starter_bonus * $no_of_refered_starter;
				$sql = "INSERT INTO starter_rewards ( username, amount, gift, paid)VALUES('$username', '$sumstarter_bonus', '$starter_gift', '0')";
				$query_reward = $con->query($sql);
				
				if(!$query_reward)
				{
					echo"the error in setting the reward is: $con->error";
					exit();
				}
				break;
				
				case '1':
				$sql = "INSERT INTO stage1_reward ( username, amount, gift, paid)VALUES('$username', '$sumlevel1reward', '$level1gift', '0')";
				$query_reward = $con->query($sql);
				
				///////////////////// add the 10,000 reward to wallet
				$add_stage1_wallet = $con->query("UPDATE wallet SET amount = amount + $level1gift WHERE id = '$username' ");
				
				if(!$query_reward)
				{
					echo"the error in setting the reward is: $con->error";
					exit();
				}
				if(!$add_stage1_wallet)
				{
					echo"the error in adding the stage1 cash reward to wallet is: $con->error";
					exit();
				}
				$trxunique = uniqid();
				$date = time();
				$con->query("INSERT INTO transferhistory ( id,amount , amounttransfered, receiver, balance, reason, trxid, date)VALUES('olivereward','0', '$level1gift', '$username', '0', 'transfered for completing stage1', '$trxunique', '$date')");
				break;
				
				case '2':
				$sql = "INSERT INTO stage2_reward ( username, amount, gift, paid)VALUES('$username', '$sumlevel2reward', '$level2gift', '0')";
				$query_reward = $con->query($sql);
				
				if(!$query_reward)
				{
					echo"the error in setting the reward is: $con->error";
					exit();
				}
				break;
				
				case '3':
				$sql = "INSERT INTO stage3_reward ( username, amount, gift, paid)VALUES('$username', '$sumlevel3reward', '$level3gift', '0')";
				$query_reward = $con->query($sql);
				
				if(!$query_reward)
				{
					echo"the error in setting the reward is: $con->error";
					exit();
				}
				break;
				
				case '4':
				$sql = "INSERT INTO stage4_reward ( username, amount, gift, paid)VALUES('$username', '$sumlevel4reward', '$level4gift', '0')";
				$query_reward = $con->query($sql);
				
				if(!$query_reward)
				{
					echo"the error in setting the reward is: $con->error";
					exit();
				}
				break;
				
				case '5':
				$sql = "INSERT INTO stage5_reward ( username, amount, gift, paid)VALUES('$username', '$sumlevel5reward', '$level5gift', '0')";
				$query_reward = $con->query($sql);
				
				if(!$query_reward)
				{
					echo"the error in setting the reward is: $con->error";
					exit();
				}
				break;
				
				case '6':
				$sql = "INSERT INTO stage6_reward ( username, amount, gift, paid)VALUES('$username', '$sumlevel6reward', '$level6gift', '0')";
				$query_reward = $con->query($sql);
				
				if(!$query_reward)
				{
					echo"the error in setting the reward is: $con->error";
					exit();
				}
				break;
			}
			
		}
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////this section ensures that the sponsor and the secondupliner are in thesame level and finds another person if they are not
		function verifyseconduplinersponsor($level_use, $seconduplinersponsor, $second_upliner)
		{
			global $con;
			$level = $level_use;
			$sent_second_upliner = $second_upliner;
			global $arrayposition_higherupliner;
			$correctsponsor = 0;
			
			$final_sponsor = 'not';
			
			////////////////////check if the sponsor is thesame level with the upliner
			$sql = "SELECT * FROM currentlevel WHERE id = '$seconduplinersponsor'";
			$query_sponsor = $con->query($sql);
			
			if(!$query_sponsor->num_rows > 0)
			{
				echo"could not get the seconduplinersponsor from the current level";
				exit();
			}
			
			$row_sponsor = mysqli_fetch_array($query_sponsor);
			$sponsor_level = $row_sponsor['mycurrentlevel'];
			
			if($level == $sponsor_level)
			{
				
				///////check whether sponsor directdownliner is full
				$leveldownliners = "level".$level."downliners";
				$query_directdownliner = $con->query("SELECT * FROM $leveldownliners WHERE id = '$seconduplinersponsor'");
				
				if(!$query_directdownliner)
				{
					echo"the error in picking $seconduplinersponsor is $con->error";
					exit();
				}
				$row_downliner = mysqli_fetch_array($query_directdownliner);
				if(!$query_directdownliner->num_rows >0)
				{
					echo"the second upliner sponsor $seconduplinersponsor does not exist for this second upliner $second_upliner in the $leveldownliners table";
					exit();
				}
				
				$noofdirectdownliner = $row_downliner['directdownliner'];
				
				if($noofdirectdownliner < 2)
				{
					
					$final_sponsor = $seconduplinersponsor;    
				}elseif($noofdirectdownliner == 2){
					
					$final_sponsor = findcorrectsponsor($seconduplinersponsor, $level);
					
					//echo"the second upliner sponsor is: $seconduplinersponsor";
					//exit();
				}
				return $final_sponsor;
			}elseif($level > $sponsor_level)
			{
				
				$sqlchecksponsor = $con->query("SELECT * FROM users WHERE username = '$seconduplinersponsor'");
				if(!$sqlchecksponsor->num_rows >0)
				{
					echo"second $seconduplinersponsor upliner sponsor does not exist ";
					exit();
				}
				$row_querychecksponsor =  mysqli_fetch_array($sqlchecksponsor);
				$sponsortocheck = $row_querychecksponsor['sponsor'];
				
				///echo"finally picked upliner is $sponsortocheck";
				
				 $final_sponsor = verifyseconduplinersponsor($level, $sponsortocheck, $sent_second_upliner);
				 return $final_sponsor;
			}
			
			elseif($level < $sponsor_level){
				
				global $repeatlowerupliner;
				$repeatlowerupliner = 0;
				$continuecheckhigherupliner = 0;
				global $continue_check;
				global $arrayrealhigherupliner;
				
				$directdownlinertable = "level".$level."directdownliner";
				$downlinercheckfull = "level".$level."downliners";
				
				$realupliner = 'not';
				$arrayrealhigherupliner[0] = 'not';
				
				$pickedsponsor = 0;
				$arraysponsordownlinertocheck[0] = 'not';
				
					echo"your sponsor that has passed you is $seconduplinersponsor<br>";/////////////////////////delete this
					fillhigheruplinerarray($seconduplinersponsor, $level);
					
						for($a=0; $a<count($arrayrealhigherupliner); $a++)
							{
								
							
								$sponsorhigherupliertocheck = $arrayrealhigherupliner[$a];
								
echo"<br><br>$sponsorhigherupliertocheck  was picked from array arrayrealhigherupliner to know if he could be the upliner to $second_upliner because he going to level $level<br><br>";/////////////////////////delete this					
								///////////////////////////////////////////check the level
								
								
				/////////////////////////////this if statement ensures that the second upliner whose correct sponsor is been looked for is not picked again
								if($sponsorhigherupliertocheck != $second_upliner){
									
							
		///////////////////////////////////////////check whether its downliner population is full 
		         $query_check_full_directdownliner = $con->query("SELECT * FROM $downlinercheckfull WHERE id = '$sponsorhigherupliertocheck'");
				 
				 if(!$query_check_full_directdownliner->num_rows > 0)
				 {
					 echo"$sponsorhigherupliertocheck does not exist in the $downlinercheckfull for higher upliner";
					 exit();
				 }
				 
				 
						$row_check_full_direcdownliner = mysqli_fetch_array($query_check_full_directdownliner);
				 
						$directdownliner_population = $row_check_full_direcdownliner['population'];
						        if($directdownliner_population <6){
										if($continuecheckhigherupliner == 0)
										{
											
												echo"$sponsorhigherupliertocheck was finally picked to be the sponsor to $second_upliner<br><br>";
												
												$realupliner = $sponsorhigherupliertocheck;
												$arrayposition_higherupliner = 0;
												$continuecheckhigherupliner = 1;
												$repeatlowerupliner = 1;
												$final_sponsor = findcorrectsponsor($realupliner, $level);			
			
												return $final_sponsor;
											}
									
								
								
									}else
									{
														echo"could not find so it called it again<br><br>";
														fillhigheruplinerarray($sponsorhigherupliertocheck, $level);
													
									}
							}											
								else
								{
									
									fillhigheruplinerarray($sponsorhigherupliertocheck, $level);
								}
								
							}
							
				//$final_sponsor = findcorrectsponsor($realupliner, $level);			
			
				//return $final_sponsor;
			}
			
			
		}	
	
	
	///////////////////////////////////////////////////////////this function finds the position of the second upliner for the sponsor
	
			function findcorrectsponsor($sentupliner, $level){
			
				global $con; $finalupliner = 'not'; $stop = '0';
				$upliner = $sentupliner;
				$towupliner[0] = 0; 
				$arrayposition = 0;
				
				$leveldirectdownliner = "level".$level."directdownliner";
				$leveldownliner = "level".$level."downliners";
				
				$query_checksponsor = $con->query("SELECT * FROM $leveldirectdownliner WHERE upliner = '$upliner'");
					if(!$query_checksponsor->num_rows >0){
						echo"THE UPLINER $upliner does not exist in the $leveldirectdownliner tablefor this downliner";
						exit();
					}
						while($row_check_sponsor = mysqli_fetch_array($query_checksponsor))
						{
							$towupliner[$arrayposition] = $row_check_sponsor['username'];
							$arrayposition++;
						}
				
				for($b=0; $b<count($towupliner);  $b++){
					
					$c = $towupliner[$b];
					
					$query_checkfirstdownliner = $con->query("SELECT * FROM $leveldownliner WHERE id = '$c'");
						if(!$query_checkfirstdownliner->num_rows >0)
						{
							echo"THE UPLINER $c DOES NOT EXIST IN THE $leveldownliner TABLE $con->error<br><br>";
							exit();
						}
							$row_query = mysqli_fetch_array($query_checkfirstdownliner);
					
					$checkiffilled = $row_query['directdownliner'];
						
						if($stop == '0'){
							
							if($checkiffilled < 2)
							{
								$finalupliner = $c;
								
								$stop = '1';
							}
						}	
					
				}
				return $finalupliner;
			}
		
		function fillhigheruplinerarray($pickedsponsortocheck, $tablelevel )
		{
			$downlinertable = "level".$tablelevel."directdownliner";
			global $con;
			global $repeatlowerupliner;
			global $arrayposition_higherupliner;
			global $arrayrealhigherupliner;
			
			if($repeatlowerupliner == 0){
				$queryhigherupliner = $con->query("SELECT * FROM $downlinertable WHERE upliner = '$pickedsponsortocheck'");
			         if(!$queryhigherupliner){
						 echo"THE SPONSOR THAT HAS PASSED YOU THAT YOU ARE LOOKING DOES NOT EXIT $con->error";
						 exit();
					 }
				
					if($queryhigherupliner->num_rows >0)
					{
						while($row_higherupliner = mysqli_fetch_array($queryhigherupliner))
						{
							$arrayrealhigherupliner[$arrayposition_higherupliner] = $row_higherupliner['username'];
							echo$row_higherupliner['username'];
				echo" was put in the fillhigheruplinerarray function to know if he could be the upliner<br><br>";/////////////////////remove this
							$arrayposition_higherupliner++;
						}
					}
				}	
					
		}
		
		function givereferalbonus($sponsor, $level)
		{
			$referalbonus = 0;
			
			global $con;
			global $level1reward;
			global $level2reward;
			global $level3reward;
			global $level4reward;
			global $level5reward;
			global $level6reward;
			global $starter_bonus;
			global $client_referal_bonus;
			
			switch($level){
				case '0':
				$referalbonus = $client_referal_bonus;
				break;
				
				case '1':
				$referalbonus = $level1reward;
				break;
				
				case '2':
				$referalbonus = $level2reward;
				break;
				
				case '3':
				$referalbonus = $level3reward;
				break;
				
				case '4':
				$referalbonus = $level4reward;
				break;
				
				case '5':
				$referalbonus = $level5reward;
				break;
				
				case '6':
				$referalbonus = $level6reward;
				break;
				
			}
			
			global $con;
			
			$query_referalbonus = $con->query("UPDATE wallet SET amount = amount + $referalbonus WHERE id = '$sponsor'");
			
			if(!$query_referalbonus){
				
				echo"could not increment wallet for the $referalbonus";
				exit();
			}
		}
		
		function creditaccountsummary($sponsor, $referalbonus, $myid)
		{
			global $con;
			$date = time();
			
			$sql_account_summary = "INSERT INTO accountsummary(id, amount, date, depositor)VALUES('$sponsor', '$referalbonus','$date', '$myid')";
			
			$query_account_summary = $con->query($sql_account_summary);
			
			if(!$query_account_summary){
				
				echo"could not insert into account summary $con->error";
				exit();
			}
		}
		
		function received_stage_bonus($level, $receiver, $depositor){
			
			$depositoruse = $depositor;
			global $con;
			global $level1reward;
			global $level2reward;
			global $level3reward;
			global $level4reward;
			global $level5reward;
			global $level6reward;
			global $starter_bonus;
			global $client_referal_bonus;
			
			switch($level){
				case '0':
				$referalbonus = $client_referal_bonus;
				break;
				
				case '1':
				$referalbonus = $level1reward;
				break;
				
				case '2':
				$referalbonus = $level2reward;
				break;
				
				case '3':
				$referalbonus = $level3reward;
				break;
				
				case '4':
				$referalbonus = $level4reward;
				break;
				
				case '5':
				$referalbonus = $level5reward;
				break;
				
				case '6':
				$referalbonus = $level6reward;
				break;
				
			}
			$date =  time();
			$sql_received_stage_bonus = "INSERT INTO received_stage_bonus(level, amount, received, depositor, date)VALUES('$level', '$referalbonus', '$receiver', '$depositoruse', '$date')";
			
			$query_received_stage_bonus = $con->query($sql_received_stage_bonus);
			
			if(!$query_received_stage_bonus){
				
				echo"the error in submitting the received stage bonus is $con->error";
				exit();
			}
		}
		
		function updatepayeewallet($payeename, $username, $registration_amount)
		{
			
			global $con;
			
			$update_payee_wallet  = $con->query("UPDATE wallet SET amount = amount - '$registration_amount' WHERE id = '$payeename'");
			
			if(!$update_payee_wallet){
				echo"could not update the payee wallet";
				exit();
			}
			
			$trxunique = $username;
			$regdate = time();	/////////////////////////////////////////////////////////////////////update transfer history table
			
			$updatepayeetransferhistorytable = $con->query("INSERT INTO transferhistory ( id,amount , amounttransfered, receiver, balance, reason, trxid, date)VALUES('$payeename','0', '$registration_amount', 'olivereward', '0', 'used for registration', '$trxunique', '$regdate')");
			
			if(!$updatepayeetransferhistorytable){
				echo"COULD NOT UPDATE THE PAYEE WALLET $con->error";
				exit();
			}
		}
		
		function insert_into_starter($sponsor){
			
			global $con;
			
			///////////////////////////////////////////////////////////////////////////////////check the sponsors level
			$row_sponsor_level = mysqli_fetch_array($con->query("SELECT * FROM currentlevel WHERE id = '$sponsor'"));
			
			$sponsor_level = $row_sponsor_level['mycurrentlevel'];
			
			if($sponsor_level == '0'){
				$sql = "UPDATE starter_referals SET number = number + 1 WHERE username = '$sponsor'";
				$query_starter = $con->query($sql);
				
				if(!$query_starter)
				{
					echo"the error in updateing starter_referals is $con->error";
					exit();
				}
			}

				
		}
		
		function get_number_stater_referals($username){
			
			global $con;
			global $no_of_refered_starter;
			
			////////////////get the number of people in starter
			$query_number_starter_referals = $con->query("SELECT * FROM starter_referals WHERE username  = '$username'");
			
			if(!$query_number_starter_referals){
				
				echo"the error in getting number of referals is $con->error";
				exit();
			}
			$row_get_refered_starter = mysqli_fetch_array($query_number_starter_referals);
			$no_of_refered_starter = $row_get_refered_starter['number'];			
		}
		
function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }		
		
?>
