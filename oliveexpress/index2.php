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
				<!----<h1>We Provide Worlds top fashion for less fashionpress.</h1>
				<h2>FashionPress the name of the of hi class fashion Web FreePsd.</h2>---->
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
	      </ul>
	  </div>
</div>
<div class="column_center">
  <div class="container">
	<!--<div class="search">
	  <div class="stay">Search Product</div>
	  <div class="stay_right">
		  <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
		  <input type="submit" value="">
	  </div>
	  <div class="clearfix"> </div>
	</div>-->
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