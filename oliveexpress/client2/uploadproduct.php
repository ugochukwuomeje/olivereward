<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
$email = $_SESSION['email'];

if(!isset($_GET['search'])){
	$id = $_SESSION['id'];
}else{
	$id = $_GET['search'];
}


$myid = $_SESSION['id'];
$username_user = $_SESSION['username'];

include("../connection/db.php");
?>


<?php
include("include/header.php");
?>
<body>


        <!-- Left Panel -->
<?php
include("include/leftmenu.php");
?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php
			include("include/topmenu.php");
		?>
        <!-- Header-->
		<?php
			include("include/breadcrumb.php");
		?>
        
        <div class="content mt-3" >

            <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                       <h3 class="page-header"><center>Upload Product</center></h3>
							<div class="container" >
										<div class="row">
									
					<div class="col-sm-12 padding-right" id=''>
						<form name="formcustomerupload" action="" method="post" id='customeruploadproduct' enctype="multipart/form-data">
										<table border="1" style='border-style:solid; border-color:#dddddd' class='table'>
										<tr>
										<td>Product Name</td>
										<td><input type="text" class='form-control' name="pnm" required></td>
										</tr>
										<tr>
										<td>Product Price</td>
										<td><input type="number" class='form-control' name="pprice" required></td>
										</tr>
										<input type='hidden' name='pqty' value='20' required>
										
										<tr>
										<td>Product Image</td>
										<td><input type="file" id='pick_product' class='form-control' name="pimage" required></td>
										<tr id='cellerrormessage'><td style='color:red'>error message</td><td><span id='error_message' style='color:red'></span></td></tr>
										</tr>
										<tr id='cellimgpreview'><td>Preview Product Image</td><td><img id='preview_product' src=''></td></tr>
										</tr>
										<tr>
										<td>Product Class</td>
										<td>
											<select name="class" class='form-control productclass' >
												echo"<option value='0'>----choose class-----</option>";
													<?php
														$sql_class = "SELECT * FROM class";
														$sql_query_class = $con->query($sql_class);
														while($row_squery_class = mysqli_fetch_array($sql_query_class))
														{
															
															$class_sn = $row_squery_class['sn']; 
															$classname = $row_squery_class['name']; 
															echo"<option value='$class_sn'>$classname</option>";
														}
													
													?>					
											</select></td>
										</tr>
										<tr>
										<td>Product Category</td>
										<td>
											<select name="pcategory" class='form-control productcat' >
												echo"<option value='0'>----Choose Category-----</option>";
																		
											</select>
											<center><img src='../images/ajax-loader.gif' id='imgcategory'>
																	</center>                
										</td>
										</tr>
										<input type='hidden' name='ritem' value='2'>
										
										<tr>
										<td>Product Type</td>
										<td>
											<select name="ptype" class='form-control' >
												<option value='1'>Used</option>
												<option value='2'>New</option>							
											</select>
										</td>
										</tr>
										<input type='hidden' name='newarrival' value='2'>
										<input type='hidden' name='section' value='customer'>
										
										<tr>
										<td>Product Description</td>
										<td>
										<textarea cols="15" rows="10" class='form-control' name="pdesc" required></textarea>
										</td>
										</tr>
										<input type="hidden" name='submit1' value="upload">
										<tr>
										<td colspan="2" align="center"><input type="submit" class='btn-large btn-primary' name="submit1" value="upload"></td>
									</tr>
										
										
										</table>
										
					
						</form>
												<center><img src='../images/ajax-loader.gif' id='uploadproduct_loader'>
																	</center>
											</div>
										</div>
							</div>
                    </div>
                    <!-- /.col-lg-12 -->
            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php
include("include/footer.php");
?>
</body>
</html>
