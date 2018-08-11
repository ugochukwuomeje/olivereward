<?php
if(isset($_POST['id']))
{
	$id=$_POST['id'];

	
include("connection/db.php");

	$query = "SELECT * FROM states WHERE country_id = '$id'";
	$run_query = mysqli_query($con,$query);
		
	while($row = mysqli_fetch_array($run_query))
				{
			    $myid = $row['id'];
				$name = $row['name'];
				echo"
				
				<option value='$myid'>$name</option>";
			
			}
			
}			
?>