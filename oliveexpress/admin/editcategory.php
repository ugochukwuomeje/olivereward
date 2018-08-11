<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<?php
session_start();
/*if(!isset($_SESSION['loggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}*/
//$email = $_SESSION['email'];
//$id = $_SESSION['id'];

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
			$pagetitle = "REGISTERED MEMBERS";
		?>
        
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                  
						<div class="box round first">
                <center><h2>
                   Edit Category</h2></center>
                <hr>
					<?php
						include("productsettingsmenu/categorymenu.php");
					?>
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1" class='table'>
					<tr>
					<td>product class</td>
					<td>
						<select name="pclass" class='form-control class' >
							<option value='0'>choose class</option>
								<?php
									$sql_class = "SELECT * FROM class";
									$sql_query_class = $con->query($sql_class);
									while($row_squery_class = mysqli_fetch_array($sql_query_class))
									{
										
										$classid = $row_squery_class['sn']; 
										$classname = $row_squery_class['name']; 
										echo"<option value='$classid'>$classname</option>";
									}
								
								?>					
						</select>
					</td>
					</tr>
					<tr>
					
					<td>Categoty List</td>
					<td>
						<select name="pcategory" class='form-control category' >
							
											
						</select>
					</td>
					</tr>
					<tr>
					<td>New Name</td>
					<td>
					<input type='text' class='form-control' name='newcategory'>
					</td>
					</tr>
					
					<input type="hidden" name="categoryvalue" value="2">
					<tr>
					<td colspan="2" align="center"><input type="submit" id='submit3' class='btn-small btn-primary' name="submit3" value="update"></td>
				</tr>
					
					
					</table>
					
					
					</form>
	
					<center><img src='../images/ajax-loader.gif' id='editcategory_loader'> </center>                
			</div>
                    </div><br>
				
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
