<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<?
include("include/header.php");
?>
</head>
<body>
<?php


include("include/menu.php");
include("connection/db.php");

		$d = 0;
		$rowcounter = 0;
		$closerow = 0;
?>
<div class="slider">
	  <div class="callbacks_container">
	      <ul class="rslides" id="slider">
	        <li><img src="images/banner1.jpg" class="img-responsive" alt=""/>
	        <div class="banner_desc">
				<h1>Olive Reward</h1>
				<h2>Your quintessential Multi-level Marketing platform</h2>
			</div>
	        </li>
	        <li><img src="images/banner2.jpg" class="img-responsive" alt=""/>
	         <div class="banner_desc">
				<!--<h1>Duis autem vel eum iriure dolor in hendrerit.</h1>
				<h2>Claritas est etiam processus dynamicus, qui sequitur .</h2>---->
			 </div>
	        </li>
	        <li><img src="images/banner3.jpg" class="img-responsive" alt=""/>
	          <div class="banner_desc">
				<!----<h1>Ut wisi enim ad minim veniam, quis nostrud.</h1>
				<h2>Mirum est notare quam littera gothica, quam nunc putamus.</h2>---->
			  </div>
	        </li>
			<li><img src="images/banner4.jpg" class="img-responsive" alt=""/>
	          <div class="banner_desc">
				<!----<h1>Ut wisi enim ad minim veniam, quis nostrud.</h1>
				<h2>Mirum est notare quam littera gothica, quam nunc putamus.</h2>---->
			  </div>
	        </li>
			<li><img src="images/banner5.jpg" class="img-responsive" alt=""/>
	          <div class="banner_desc">
				<!----<h1>Ut wisi enim ad minim veniam, quis nostrud.</h1>
				<h2>Mirum est notare quam littera gothica, quam nunc putamus.</h2>---->
			  </div>
	        </li>
			<li><img src="images/banner6.jpg" class="img-responsive" alt=""/>
	          <div class="banner_desc">
				<!----<h1>Ut wisi enim ad minim veniam, quis nostrud.</h1>
				<h2>Mirum est notare quam littera gothica, quam nunc putamus.</h2>---->
			  </div>
	        </li>
			<li><img src="images/banner7.jpg" class="img-responsive" alt=""/>
	          <div class="banner_desc">
				<!----<h1>Ut wisi enim ad minim veniam, quis nostrud.</h1>
				<h2>Mirum est notare quam littera gothica, quam nunc putamus.</h2>---->
			  </div>
	        </li>
	      </ul>
	  </div>
</div>
<div class="column_center">
  <div class="container">
  
  
 <div class="footer_bg"></div>
<div class="col-sm-4">
<h2>About</h2>
<a href="#"><img alt="" src="images/logo.png" /></a>

<p>Olive Reward International is an international Multi Level Marketing Company impacting lives through Economic Empowerment Programme.</p>
</div>

<div class="col-sm-4">
<h2>Our Vision</h2>

<ul class="social">
	<p>To stand as a bridge between the rich and the poor, by empowering people, so as to rectify unjust social systems and alleviate poverty.</p>

</ul>
</div>

<div class="col-sm-4">
<h2>Our Mission</h2>

<ul class="social">
	<p>Providing a system to complement the needs of individuals in order to enhance the achievement of their goals in life.</p>

<p>Providing academic support and helping individuals acquire sellable skills for self-reliance.</p>
</ul>

 </div> 
 </div>
 <div class="clearfix"> </div>
	</div>
  
<style>
.city {
    background-color: #df1f26;
    color: white;
    padding: 10px;
} 
</style>
<div class='container' style='margin-top:2em;'>
	<center>
		<div class="col-sm-6">
			
					<p class="city">SPECIAL FEATURES INCLUDES</p><br>

					<p>✅ Unlimited 20% Referral bonus.</p><br>

					<p>✅ Simple 2 X 2 unmatched binary matrix.</p><br>

					<p>✅ No physical burdensome products to sell.</p><br>

					<p>✅ No monthly or regular authorship before earning.</p><br>

					<p>✅ Earnings are credited to your account within 48 hours of withdrawal.</p><br>

					<p>✅ You earn before completion of each stage.</p>
					
		</div>

	
		<div class="col-sm-6">
			<h3 class="city">WHY SHOULD YOU JOIN US?</h3>

			<p>✅ UNIQUE PLATFORM:</p>

			<p>Due to our un-matched matrix, you earn before you complete any stage. This will help you generate wealth.</p>

			<p></p>

			<p="bold">✅ EASY MATRIX:</p>

			<p>A simple and easy matrix to achieve within a short time.</p>

			<p></p>

			<p="bold">✅ CAPACITY BUILDING:</p>

			<p>We train our members to grow and sustain their businesses while providing coaching programmes.</p>

			<p></p>

			<p="bold">✅ RELIABILITY:</p>

			<p>We guarantee efficiency and sustainability.</p>

			<p></p>

			<p="bold">✅ TEAM WORK:</p>

			<p>We encourage team work
	  </div>
	</center>
</div>	
	  <div class="center">
		
		 
	  <div class="clearfix"> </div>
	</div>
	
	
    <div class="clearfix"> </div>
  </div>
</div>
<div class="main">
  <div class="content_top">
  	<div class="container">
	   <?php
	   include("leftmenu.php");
	   ?>
	   <div class="col-md-9 content_right">
	   	<div class="top_grid1">
	     <!--<div class="col-md-4 box_2">
	     	<div class="grid_1"><a href="single.html">
	     		<div class="b-link-stroke b-animate-go  thickbox">
		        <img src="images/p1.jpg" class="img-responsive" alt=""/></div>
	     	   <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>$99<small>.33</small></p></li>
	     	  		<li class="grid_2-right"><div class="btn btn-primary btn-normal btn-inline " target="_self" title="Get It">Get It</div></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	   </div>
	     	</div>
	     </a></div>----> 
	     <!---<div class="col-md-8 box_1"><a href="single.html">
	       <div class="grid_1">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="images/p2.jpg" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>$99<small>.33</small></p></li>
	     	  		<li class="grid_2-right"><div class="btn btn-primary btn-normal btn-inline " target="_self" title="Get It">Get It</div></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
	     </a></div>------>
	     <div class="clearfix"> </div>
	    </div> 
	    
	    <h4 class="head"><span class="m_2">Popular</span> Products Now</h4>
	<?php
		include("pagination/function.php");
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 40; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "product"; //you have to pass your query over here
		
		
		if(isset($_GET['cat'])){
		$catid = $_GET['cat'];
		$res=$con->query("select * from product WHERE  product_cat = '$catid' ORDER BY RAND() LIMIT {$startpoint} , {$limit}");
					  
						  while($row = mysqli_fetch_array($res)){
							  
							  if($rowcounter == 0 ){
								  $closerow = 1;
								  echo"<div class='top_grid2'>";
								  
							  }
							  $rowcounter++;
							  $product_id = $row['id'];
							  $product_category = $row['product_cat'];
	?>
	

	     <div class="col-md-4 top_grid1-box1"><a href='productdetails.php?id=<?php echo"$product_id" ?>&cat=$product_category'>
	     	<div class="grid_1">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="client2/clientoperation/<?php echo$row['product_image'] ?>" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>N<?php echo$row['product_price'] ?></p></li>
	     	  		<li class="grid_2-right"><div class="btn btn-primary btn-normal btn-inline " target="_self" title="Get It">Get It</div></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
			</a> 
		</div>
    
	<?php
							  
							  if($rowcounter == 3){
								  echo"</div><div class='clearfix'> </div>";
								  $rowcounter = 0;
								  $closerow = 0;
							  }
						  }
	                       if($closerow == 1){
							  echo"</div><div class='clearfix'> </div>";
						  }
}else{
$res=$con->query("select * from {$statement} ORDER BY RAND() LIMIT {$startpoint} , {$limit}");
					  
						  while($row = mysqli_fetch_array($res)){
							  if($rowcounter == 0 ){
								  $closerow = 1;
								  echo"<div class='top_grid2'>";
								  
							  }
							  $rowcounter++;
							   $product_id = $row['id'];
							   $product_category = $row['product_cat'];
							  ?>
	
	<div class="col-md-4 top_grid1-box1"><a href='productdetails.php?id=<?php echo"$product_id" ?>&cat=<?php echo"$product_category" ?>'>
	     	<div class="grid_1">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="client2/clientoperation/<?php echo$row['product_image'] ?>" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>N<?php echo$row['product_price'] ?></p></li>
	     	  		<li class="grid_2-right"><div class="btn btn-primary btn-normal btn-inline " target="_self" title="Get It">Get It</div></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
			</a> 
		</div>
    
	<?php
							  
							  if($rowcounter == 3){
								  echo"</div><div class='clearfix'> </div>";
								  $rowcounter = 0;
								  $closerow = 0;
							  }
						  }
	                       if($closerow == 1){
							  echo"</div><div class='clearfix'> </div>";
						  }
}
?>
	</div> 
	   </div>
      
	  
<?
include("include/footer.php");
?>

</body>
</html>		