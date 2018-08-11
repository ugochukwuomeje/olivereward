<?php
       
		require_once("../../connection/db.php");
		
	?>

<?php
/////////////////////////////////////////////////this sction is for uploading category to the database
if($_POST["categoryvalue"]== "1")
{
	    $pclass = $_POST['pclass'];
		if(empty($_POST['category']))
		{
			echo"please enter the category title";
			exit();
		}
	
		$category = $_POST['category'];
		$sql_chcek_category = $con->query("select * from categories where cat_title =  '$category' AND class='$pclass'");
		
		if($sql_chcek_category->num_rows > 0)
		{
			echo"category is already registered change title";
			exit();
		}
		
		else{
		
			$submit_status = $con->query("insert into categories values('','$pclass','$category','1' )");

			if($submit_status){
				
				echo"1";
			}
			else{
				echo"error $con->error";
				exit();
			}
		}
	}

//////////////////////////////////////////////////this section is for adding class	
	if($_POST["categoryvalue"]== "13")
{
	    $class = $_POST['class'];
		if(empty($_POST['class']))
		{
			echo"please enter the class title";
			exit();
		}
	
		$sql_check_class = $con->query("select * from class where name =  '$class'");
		
		if($sql_check_class->num_rows > 0)
		{
			echo"class title is already registered change title";
			exit();
		}
		
		else{
		
			$submit_status = $con->query("insert into class values('','$class','1' )");

			if($submit_status){
				
				echo"1";
			}
			else{
				echo"error $con->error";
				exit();
			}
		}
	}
	
	
	
	//////////////////////////////////this is for edit category
	if($_POST["categoryvalue"]== "2")
{
	
	if(empty($_POST['newcategory']))
	{
		echo"please enter the category title";
		exit();
	}
	
		
	$category = $_POST['newcategory'];
	$categoryid = $_POST['pcategory'];
	
	$sql_chcek_category_title = $con->query("select * from categories where cat_title =  '$category'");
	
	if($sql_chcek_category_title->num_rows > 0)
	{
		echo"category title is already choosen";
		exit();
	}
		
	$sql_chcek_category = $con->query("update categories set cat_title = '$category' where cat_id = '$categoryid'");
	
	
	if($sql_chcek_category)
	{
		echo"1";
		exit();
	}
	else{
		echo"error $con->error";
		exit();
	}
	
	
	}
	
	//////////////////////////////////////////////////////////this is for editting class
	if($_POST["categoryvalue"]== "14")
{
	
	if(empty($_POST['newclass']))
	{
		echo"please enter the new class title";
		exit();
	}
	
		
	$newclass = $_POST['newclass'];
	$sn = $_POST['class'];
	
	$sql_chcek_class_title = $con->query("select * from class where name =  '$newclass'");
	
	if($sql_chcek_class_title->num_rows > 0)
	{
		echo"class title is already choosen";
		exit();
	}
		
	$sql_chcek_class = $con->query("update class set name = '$newclass' where sn = '$sn'");
	
	
	if($sql_chcek_class)
	{
		echo"1";
		exit();
	}
	else{
		echo"error $con->error";
		exit();
	}
	
	
	}

	
//////////////////////////////////////////this section is for disabling category
if($_POST["categoryvalue"]== "4")
{
	
	$categoryid = $_POST['pcategory'];
		
		if($categoryid == "0"){
			
			echo"NO CATEGORY DISABLED";
			exit();
		}
	/////////////////////////////////////////////////////////////////////////////////this section disables all the product under the category	
	$sql_chcek_category = $con->query("select * from product where product_cat = '$categoryid'");
		
	if($sql_chcek_category->num_rows > 0)
	{
		while($row_category = mysqli_fetch_array($sql_chcek_category))
		{
			$product_id = $row_category['id'];
			
			disableproduct($product_id);
		}
		
		$chcek_deletecategory = $con->query("delete from categories where cat_id = '$categoryid'");
		
		if($chcek_deletecategory){
			echo"1";
			exit();
		}elseif(!$chcek_deletecategory){
			echo"$con->error";
			exit();
		}
	}
	

	
}////////////////////////this curl bracket ends disable category function


//////////////////////////////////////////this section is for disabling class
if($_POST["categoryvalue"]== "15")
{
	
	$sn = $_POST['class'];
		
		if($sn== "0"){
			
			echo"NO class selected";
			exit();
		}
	/////////////////////////////////////////////////////////////////////////////////this section disables all the product under the category	
	$sql_chcek_class = $con->query("select * from product where class = '$sn'");
		
	if($sql_chcek_class->num_rows > 0)
	{
		while($row_class = mysqli_fetch_array($sql_chcek_class))
		{
			$product_id = $row_class['id'];
			
			disableproduct($product_id);
		}
	}
	
	//////////////////////////////////this section calls the function that disables all the brand under this class
	/**$sql_check_brand_class = $con->query("select * from brands where class = '$sn'");
		
	if($sql_check_brand_class->num_rows > 0)
	{
		while($row_brand_class = mysqli_fetch_array($sql_check_brand_class))
		{
			$brand_id = $row_brand_class['brand_id'];
			
			disablebrand($brand_id);
		}
	}**/
	
	//////////////////////////////////this section calls the function that disables all the category under this class
	$sql_check_category_class = $con->query("select * from categories where class = '$sn'");
		
	if($sql_check_category_class->num_rows > 0)
	{
		while($row_category_class = mysqli_fetch_array($sql_check_category_class))
		{
			$cat_id = $row_category_class['cat_id'];
			
			disablecatgory($cat_id);
		}
	}
	
	disableclass($sn);
	echo"1";
	exit();
	
}////////////////////////this curl bracket ends disable class function

//////////////////////////////////////////this section is for enabling class
if($_POST["categoryvalue"]== "16")
{
	
	$sn = $_POST['class'];
		
		if($sn== "0"){
			
			echo"NO class selected";
			exit();
		}
	/////////////////////////////////////////////////////////////////////////////////this section enables all the product under the category	
	$sql_chcek_class = $con->query("select * from product where class = '$sn' AND status = '0'");
		
	if($sql_chcek_class->num_rows > 0)
	{
		while($row_class = mysqli_fetch_array($sql_chcek_class))
		{
			$product_id = $row_class['id'];
			
			enableproduct($product_id);
		}
	}
	
	//////////////////////////////////this section calls the function that disables all the brand under this class
	$sql_check_brand_class = $con->query("select * from brands where class = '$sn' ");
		
	if($sql_check_brand_class->num_rows > 0)
	{
		while($row_brand_class = mysqli_fetch_array($sql_check_brand_class))
		{
			$brand_id = $row_brand_class['brand_id'];
			
			enablebrand($brand_id);
		}
	}
	
	//////////////////////////////////this section calls the function that disables all the category under this class
	$sql_check_category_class = $con->query("select * from categories where class = '$sn'");
		
	if($sql_check_category_class->num_rows > 0)
	{
		while($row_category_class = mysqli_fetch_array($sql_check_category_class))
		{
			$cat_id = $row_category_class['cat_id'];
			
			enablecatgory($cat_id);
		}
	}
	
	enableclass($sn);
	echo"1";
	exit();
	
}////////////////////////this curl bracket ends enabling class function


//////////////////////////////////////////////////////////////////this function is for adding brand

if($_POST["categoryvalue"]== "8")
{
	$addbrandcategory = $_POST['pcategory'];
	$addbrandname  = $_POST['brand'];
		
		if($addbrandcategory == "0"){
			
			echo"NO category selected";
			
			exit();
		}
		
		if(empty($addbrandname)){
			
			echo"enter brand";
			
			exit();
		}
	
	$sql_add_brand = $con->query("select * from brands where category = '$addbrandcategory' AND brand_title = '$addbrandname' ");
		
	if($sql_add_brand->num_rows > 0)
		{
		
			while($row_subcategory = mysqli_fetch_array($sql_add_brand)){
		
			$brandtitle = $row_subcategory['brand_title'];
		
				if($brandtitle == $addbrandname)
				{
					echo"the brand is already taken";
					exit();
				}
		
			}
		}
		
		$sql_addbrand = "INSERT INTO brands(brand_title, category, status)VALUES('$addbrandname','$addbrandcategory',
		 '1')";
		$sql_query_addbrand = $con->query($sql_addbrand);
		if(!$sql_query_addbrand)
		{
			echo"could not add brand";
			exit();
		}else{
			echo"1";
			exit();
		}
	
} 	
//////////////////////////////////////////////////////////////////this function is for disabling brand

if($_POST["categoryvalue"]== "9")
{
	
	$brandname  = $_POST['brandlist'];
		
		if($brandname == "0"){
			
			echo"NO brand selected";
			
			exit();
		}
		
	
	$sql_disable_brand = $con->query("select * from product where product_brand = '$brandname'");
		
	if($sql_disable_brand->num_rows > 0)
	{
		
		while($row_disablebrand = mysqli_fetch_array($sql_disable_brand))
			{
		        
			    $productid = $row_disablebrand['id'];
		        
				disableproduct($productid);
			}
		
		disablebrand($brandname);
	}
	else{
		disablebrand($brandname);
	}
	echo"1";
//////////////////////////////////////////////////////////////this is the end of disable brand section	
}

//////////////////////////////////////////////////////////this section is for enabling brand

if($_POST["categoryvalue"]== "10")
{
	
	$brandname  = $_POST['brandlist'];
		
		if($brandname == "0"){
			
			echo"NO brand selected";
			
			exit();
		}
		
	
	$sql_enable_brand = $con->query("select * from product where product_brand = '$brandname'");
		
	if($sql_enable_brand->num_rows > 0)
	{
		
		while($row_enablebrand = mysqli_fetch_array($sql_enable_brand))
			{
		        
			    $productid = $row_enablebrand['id'];
		        
				enableproduct($productid);
			}
		
		enablebrand($brandname);
	}
	echo"1";
////////////////////////////////////////////////////////////this section is the end of enable brand section	
}
//////////////////////////////////////////////////////////this section is for editing brand

if($_POST["categoryvalue"]== "11")
{
	
	$brandname  = $_POST['brandlist'];
	$newbrandname  = $_POST['newbrandname'];
		
		if($brandname == "0"){
			
			echo"NO brand selected";
			
			exit();
		}
		
	
	$sql_editbrand = $con->query("update brands set brand_title = '$newbrandname' where brand_id = '$brandname'");
	if(!$sql_editbrand)
	{
		echo"could not edit brand";
		exit();
	}
	echo"1";
////////////////////////////////////////////////////////////this section is the end of enable brand section	
}


/////////////////////////////////////////////////////////this function disable product
function disableproduct($id)
{
		global $con;
		
		$disable_product = $con->query("delete from product  where id = '$id'");
		if(!$disable_product)
		{
			echo"could not disable product";
			
		}
}	
	
///////////////////////////////////////////this function disables brand	
function disablebrand($id)
{
		global $con;
		
		$disable_brand = $con->query("update brands set status = '0' where brand_id = '$id'");
		if(!$disable_brand)
		{
			echo"could not disable brand";
			
		}
	}

	////////////////////////////////////////////////////////this function disables the class
function disableclass($id)
{
		global $con;
		
		$disable_class = $con->query("delete from class where sn = '$id'");
		if(!$disable_class)
		{
			echo"could not disable class";
			
		}
	}
	
	////////////////////////////////////////////////////////this function disables the class
function enableclass($id)
{
		global $con;
		
		$disable_class = $con->query("update class set status = '1' where sn = '$id'");
		if(!$disable_class)
		{
			echo"could not disable class";
			
		}
	}

////////////////////////////////////////////////////////this function disables the category
function disablecatgory($id)
{
		global $con;
		
		$disable_category = $con->query("delete from categories where cat_id = '$id'");
		if(!$disable_category)
		{
			echo"could not disable category";
			
		}
	}

//////////////////////////////////////////this function enables category	
function enablecatgory($id)
{
		global $con;
		
		$disable_category = $con->query("update categories set status = '1' where cat_id = '$id'");
		if(!$disable_category)
		{
			echo"could not enable category";
			
		}
	}
////////////////////////////

///////////////////you stoped here where you want to create disable product function

/////////////////////////////////////////////////////////this function enable product
function enableproduct($id)
{
		
		global $con;
		
		$enable_product = $con->query("update product set status = '1' where id = '$id'");
		if(!$enable_product)
		{
			echo"could not enable product";
			
		}
}	
	
///////////////////////////////////////////this function enables brand	
function enablebrand($id)
    {
		global $con;
		
		$enable_brand = $con->query("update brands set status = '1' where brand_id = '$id'");
		if(!$enable_brand)
		{
			echo"could not enable brand";
			
		}
	}


?>