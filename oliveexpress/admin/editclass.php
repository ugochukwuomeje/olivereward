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
                   Edit Class</h2></center>
                <hr>
					<?php
						include("productsettingsmenu/classmenu.php");
					?>
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1" class='table'>
					<tr>
					<td>product class</td>
					<td>
						<select name="class" class='form-control class' >
							<option value='0'>choose class</option>
								<?php
									$sql_class = "SELECT * FROM class";
									$sql_query_class = $con->query($sql_class);
									while($row_squery_class = mysqli_fetch_array($sql_query_class))
									{
										
										$sn = $row_squery_class['sn']; 
										$classname = $row_squery_class['name']; 
										echo"<option value='$sn'>$classname</option>";
									}
								
								?>					
						</select>
					</td>
					</tr>
					
					<tr>
					<td>New Class</td>
					<td>
					<input type='text' class='form-control' name='newclass'>
					</td>
					</tr>
					
					<input type="hidden" name="categoryvalue" value="14">
					<tr>
					<td colspan="2" align="center"><input type="submit" id='submit14' class='btn-small btn-primary' name="submit3" value="update"></td>
				</tr>
					
					
					</table>
					
					
					</form>
	
					<center><img src='../images/ajax-loader.gif' id='class_loader'> </center> 
	
					             
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
