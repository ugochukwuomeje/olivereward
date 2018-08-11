<?php
session_start();
//if(empty($_SESSION['pay'])){
	?>
	<script type='text/javascript'>
	
	//window.location = "index.php";
	</script>
	<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | exotiscent.com</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<script src="myscript/main.js"></script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="myscript/shopping_cart.js"></script>
</head>
	
	<?php

include('connection/db.php');



$order_id = $_GET["id"];
$email = $_SESSION['email'];
$date = time();

//this is for getting record from temp table to permanent table
$res=mysqli_query($con,"select * from billing_address where id = '$order_id'");
while($row=mysqli_fetch_array($res))
{
    $fname=$row["first_name"];
    $lname=$row["last_name"];
	$email=$row["email"];
    $state=$row["state"];
    $town=$row["town"];
    $mobile=$row["mobile"];
    $address1=$row["address1"];
	$address2=$row["address2"];
}
  $query_success = mysqli_query($con,"insert into confirm_order_address values('','$fname','$lname','$email','$state','$town','$mobile','$address1','$address2')");
  
  if(!$query_success)
  {
	  echo"$con->error";
	  exit();
  }

//now need to get permanent table order id

$res=mysqli_query($con,"select id from confirm_order_address where email = '$email'  order by id desc limit 1");
while($confirm_order_address_row=mysqli_fetch_array($res))
{
    $id = $confirm_order_address_row["id"];
}

foreach ($_COOKIE['item'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
{
    $values11 = explode("__", $value);

    mysqli_query($con,"insert into confirm_order_product values('','$email','$id','$values11[1]','$values11[2]','$values11[3]','$values11[0]','$values11[4]','$date','0')");
}



?>

 <center><img src='images/successfultx.jpg' class='img-responsive'></center>
 <br>
<center><div style='font-size:2.5em; font-family:Rod'>ORDER SUCCESSFUL WE WILL GET YOUR PRODUCT DELIVERED SOON</div></center>

<center><a href='index.php' type='button' class='btn btn-lg btn-success'>click to go home page</a></center>
<script type="text/javascript">

    //setTimeout(function(){
        //window.location="index.php";

    //},3000);

</script>
