<?php
session_start();
$id=$_GET["id"];

$productdescription = "not product details";

$productid = $id;
$similar_cat = $_GET["cat"];

include('connection/db.php');

if(isset($_POST['submit1'])){
	$d = 0;	
	$qty = $_POST['qty'];
	
	if(!empty($_COOKIE['item'])){
		 if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
			{	
			
			foreach($_COOKIE['item'] as $name => $value)
				{
					$d = $d + 1;
				}
				$d = $d + 1;
			}

}
	else
	{
		$d = $d + 1;
	}
		$res3 = $con->query("SELECT * FROM product WHERE id =  '$id'");
		while($row3 = mysqli_fetch_array($res3))
		{
			$img1 = $row3["product_image"];
			$nm = $row3["product_name"];
			$prize = $row3["product_price"];
			$productowner = $row3['username'];
			$total = $prize * $qty;
		}
		
		if(!empty($_COOKIE['item'])){
				if(is_array($_COOKIE['item'])) // this is for checking if cookies is available or not
	 {
			foreach($_COOKIE['item'] as $name => $values)
			{
				$values11 = explode("__",$values);
				$found = 0;
				if($img1 == $values11[0])
				{
					$found = $found + 1;
					$qty = $values11[3] + 1;
					
					
					$res = $con->query("SELECT * FROM product WHERE product_image = '$img1'");
					while($row = mysqli_fetch_array($res)){
						
						
					}
					
					
					$total = $values11[2] * $qty;
					setcookie("item[$name]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$id."__".$productowner,time()+1800);
				
				}
			}
			if($found == 0)
			{
				
					$res = $con->query("SELECT * FROM product WHERE product_image = '$img1'");
					while($row = mysqli_fetch_array($res)){
						
						
					}
					
				
				setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$d."__".$productowner,time()+1800);
			
			}
		}
	
}
		else{
			
					
				setcookie("item[$d]",$img1."__".$nm."__".$prize."__".$qty."__".$total."__".$d."__".$productowner,time()+1800);
		
		}
			
	}
//include("header.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Fashionpress an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Single :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashionpress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/hover_pack.js"></script>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
            </script>	

</head>
<body>
<?php

include("include/menu.php");


?>
<div class="column_center">
  <div class="container">
	<div class="search">
	  <div class="stay">Search Product</div>
	  <div class="stay_right">
		  <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
		  <input type="submit" value="">
	  </div>
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
	   <?php
					$res=$con->query("select * from product where id='$id'");
					if(!$res->num_rows > 0)
					{
						
					?>
						<script type='text/javascript'>
								alert("Product does not exist");
								window.href("index.php");
						</script>

					<?php
					}	
					
						$row = mysqli_fetch_array($res);
						$productdescription = $row['product_desc'];
						$productimage = $row['product_image'];
						$product_price = $row['product_price'];
		?>
	   <div class="col-md-9 single_right">
	   <form method='POST' name='form1' method='POST'>
	   	<div class="single_top">
	       <div class="single_grid">
				<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_source_image" src="client2/clientoperation/<?php echo$row['product_image'] ?>" class="img-responsive" title="" />
								</a>
							</li>
							
						</ul>
						 <div class="clearfix"></div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				  	<h1> These perfectly</h1>
				<p class="availability">Availability: <span class="color">In stock</span></p>
			    <div class="price_single">
				  <!--<span class="reducedfrom">$140.00</span>-->
				  <span class="actual">Price N<?php echo"$product_price" ?></span>
				</div>
				<h2 class="quick">Product Name:</h2>
				<p class="quick_desc"><? echo"$productdescription" ?></p>
			    <div class="wish-list">
				 	<ul>
				 		<li class="wish"><a href="#">Add to Wishlist</a></li>
				 	    <li class="compare"><a href="#">Add to Compare</a></li>
				 	</ul>
				 </div>
				
				<div class="quantity_box">
				<span>Quantity:</span>
					<input type='number' name='qty' placeholder='0' min="0"> <!------this section is for name------>
					<input type='hidden' name='id' value='<?php echo"$id"  ?>'>
				    <ul class="single_social">
						<li><a href="#"><i class="fb1"> </i> </a></li>
						<li><a href="#"><i class="tw1"> </i> </a></li>
						<li><a href="#"><i class="g1"> </i> </a></li>
						<li><a href="#"><i class="linked"> </i> </a></li>
		   		    </ul>
		   		    <div class="clearfix"></div>
	   		    </div>
			    <button  title="Online Reservation" type='submit' name='submit1' class="btn bt1 btn-primary btn-normal btn-inline " >Buy</button>
			</div>
		    <div class="clearfix"> </div>
				</div>
          	    <div class="clearfix"></div>
          </div>
		  </form>
          <div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
							  
							  <div class="clear"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
									  <ul class="tab_list">
									  	  <!-----the product description should come here---->
										  <?php echo"$productdescription" ?>
									  </ul>           
							        </div>
							     </div>	
							      
							 </div>
					      </div>
			  </div>
		<h3 class="single_head">Related Products</h3>	
	    <div class="related_products">
	     <div class="col-md-4 top_grid1-box1 top_grid2-box2"><a href="single.html">
	     	<div class="grid_1">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="images/p12.jpg" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>$99<small>.33</small></p></li>
	     	  		<li class="grid_2-right"><a href="single.html" title="Get It" class="btn btn-primary btn-normal btn-inline " target="_self">Get It</a></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
	     </a></div>
	    <div class="col-md-4 top_grid1-box1"><a href="single.html">
	     	<div class="grid_1">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="images/p13.jpg" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>$99<small>.33</small></p></li>
	     	  		<li class="grid_2-right"><a href="single.html" title="Get It" class="btn btn-primary btn-normal btn-inline " target="_self">Get It</a></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
	     </a></div>
	     <div class="col-md-4 top_grid1-box1"><a href="single.html">
	     	<div class="grid_1">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="images/p14.jpg" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>$99<small>.33</small></p></li>
	     	  		<li class="grid_2-right"><a href="single.html" title="Get It" class="btn btn-primary btn-normal btn-inline " target="_self">Get It</a></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
	     </a></div>
	     <div class="clearfix"> </div>
	    </div> 
	    <div class="top_grid2">
	     <div class="col-md-4 top_grid1-box1 top_grid2-box2"><a href="single.html">
	     	<div class="grid_1">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="images/p9.jpg" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>$99<small>.33</small></p></li>
	     	  		<li class="grid_2-right"><a href="single.html" title="Get It" class="btn btn-primary btn-normal btn-inline " target="_self">Get It</a></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
	    </a> </div>
	    <div class="col-md-4 top_grid1-box1"><a href="single.html">
	     	<div class="grid_1">
	     	 <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="images/p10.jpg" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>$99<small>.33</small></p></li>
	     	  		<li class="grid_2-right"><a href="single.html" title="Get It" class="btn btn-primary btn-normal btn-inline " target="_self">Get It</a></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
	     </a></div>
	     <div class="col-md-4 top_grid1-box1"><a href="single.html">
	     	<div class="grid_1">
	     	  <div class="b-link-stroke b-animate-go  thickbox">
		        <img src="images/p11.jpg" class="img-responsive" alt=""/> </div>
	     	  <div class="grid_2">
	     	  	<p>There are many variations of passages</p>
	     	  	<ul class="grid_2-bottom">
	     	  		<li class="grid_2-left"><p>$99<small>.33</small></p></li>
	     	  		<li class="grid_2-right"><a href="single.html" title="Get It" class="btn btn-primary btn-normal btn-inline " target="_self">Get It</a></li>
	     	  		<div class="clearfix"> </div>
	     	  	</ul>
	     	  </div>
	     	</div>
	     </a></div>
	     <div class="clearfix"> </div>
	    </div> 
        </div>
      </div> 
	</div>
</div>
<?
include("include/footer.php");
?>
</body>
</html>		