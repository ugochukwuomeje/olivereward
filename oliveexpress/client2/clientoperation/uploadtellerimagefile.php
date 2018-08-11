<?php
session_start();
include("../../connection/db.php");
if(!isset($_SESSION["email"]))
{

	echo"200";
	exit();
	
}
$id = $_POST["id"];

$telleroperation = $_POST['operation'];

///////////check if teller has been uploaded before

$sql_check_teller = "SELECT * FROM teller WHERE clientid = '$id'";
$query_check_teller = $con->query($sql_check_teller);
if($query_check_teller->num_rows > 0)
{
	echo"CANNOT UPLOAD TELLER AGAIN IT HAS BEEN UPLOADED BEFORE YOU CAN ONLY UPDATE";
	exit();
}

	$depositorname = escape_data($_POST['depositor']);

	if(empty($depositorname)||empty($id)){
	
	echo"SOME OF THE REQUIRED FIELDS ARE EMPTY!";
	exit();
}

if(isset($_FILES["tellerimg"]["type"]))
{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["tellerimg"]["name"]);
		$tellerimg_extension = end($temporary);
		if (($_FILES["tellerimg"]["size"] < 800000)//Approx. 100kb tellerimgs can be uploaded.
		&& in_array($tellerimg_extension, $validextensions)) {
			if ($_FILES["tellerimg"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["tellerimg"]["error"] . "<br/><br/>";
			}
			else
			{
			
				$sourcePath = $_FILES['tellerimg']['tmp_name']; // Storing source path of the tellerimg in a variable
				$targetPath = "uploadedteller/".$_FILES['tellerimg']['name']; // Target path where tellerimg is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded tellerimg
				
				addteller($con, $depositorname, $id, $targetPath);
				echo "Teller Uploaded Successfully...!!";
				
			}
			}
			else
			{
			echo "<span id='invalid'>***Invalid tellerimg Size or Type***<span>";
			}
			}else{
				
				echo"please select the teller image to upload";
				exit();
			}
			
			function addteller($con, $depositorname, $clientid, $targetPath){
				
				$date = time();
				global $telleroperation;
				
				if($telleroperation == "submit")
					{
						$sql = "INSERT INTO teller(clientid, depositor, image, date, confirmation)VALUES('$clientid', '$depositorname','$targetPath', '$date', '0' )";
						$query_teller = $con->query($sql);
						
						if($query_teller){
							
							echo"1";
							exit();
							
						}else{
							
							echo"the error is $con->error";
							exit();
						}
					}
					elseif($telleroperation == "update")
					{
						global $id;
						
						$sql = "UPDATE teller SET firstname = '$firstname', lastname = '$lastname', image = '$targetPath', date = '$date', confirmation1 = '0', confirmation2 = '0', completed = '0' WHERE clientid = '$id'";
						$query_teller = $con->query($sql);
						
						if($query_teller){
							
							echo"1";
							exit();
							
						}else{
							
							echo"the error is $con->error";
							exit();
						}
					}
			}
			
			function escape_data($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
			
	?>		