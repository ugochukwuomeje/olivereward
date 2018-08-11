<?php
if(isset($_POST['id']))
{
	$id=$_POST['id'];

	
require_once("../../connection/db.php");

	$query = "SELECT * FROM categories WHERE class = '$id' AND status = '1'";
	$run_query = mysqli_query($con,$query);
		
		echo"<option value='0'>---Choose category---</option>";
	while($row = mysqli_fetch_array($run_query))
				{
			    $myid = $row['cat_id'];
				$name = $row['cat_title'];
				echo"
				
				<option value='$myid'>$name</option>";
			
			}
			
}			
?>