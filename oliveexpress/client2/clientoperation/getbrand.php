<?php
if(isset($_POST['id']))
{
	$id=$_POST['id'];

	
require_once("../../connection/db.php");

	$query = "SELECT * FROM brands WHERE category = '$id' AND status = '1'";
	$run_query = mysqli_query($con,$query);
		
		echo"<option value='0'>---choose brand---</option>";
	while($row = mysqli_fetch_array($run_query))
				{
			    $myid = $row['brand_id'];
				$name = $row['brand_title'];
				echo"
				
				<option value='$myid'>$name</option>";
			
			}
			
}			
?>