<?php
session_start();
include('../connection/db.php');
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container"  name="form" action="" method="POST">
    <p><input type="text" placeholder="username" required name="username"></p>
    <p><input type="password" placeholder="Password" required name="pwd"></p>
    <p><input type="submit" name="submit1" value="Log in"></p>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
    <?php
	  if(isset($_POST['submit1'])){
		  
		  $username = $_POST['username'];
		  $password = md5($_POST['pwd']);
		  
		$res = $con->query(" SELECT * FROM admin WHERE username = '$username' && password='$password' ");  
	  if($res->num_rows >0)
	  {
		  
		  $sql_dollar = "SELECT * FROM dollarrate";
			$query_dollar = $con->query($sql_dollar);
			$row_dollar = mysqli_fetch_array($query_dollar);
			
			$dollar_rate = $row_dollar['rate'];
	
			$_SESSION['dollar_rate'] = $dollar_rate;
		  
		 while($row =  mysqli_fetch_array($res))
		{
			
			$_SESSION['username'] = $row['username'];
			$_SESSION['firstname'] = $row['first_name'];
			$_SESSION['lastname'] = $row['last_name'];
			$_SESSION['role'] = $row['role'];
			$_SESSION['adminloggedin'] = 1;
			?>
			
			<script type='text/javascript'>
				window.location='home2.php';
			</script>
			<?php
		}
	   
	  }else{
		  
		  ?>
		  <script type='text/javascript'>
				alert("THE PASSWORD OR USERNAME IS INCORRECT");
			</script>
		  
		  <?php
	  }
		
	  }
	?>
    
    
  </body>
</html>
