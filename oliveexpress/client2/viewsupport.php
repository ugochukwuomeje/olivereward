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
$username = $_SESSION['username'];
$msgid = $_GET['msgid'];

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
        
        <div class="content mt-3" >

              <div class="row" >
                    <div class="col-lg-12" style='background-Color:white;'>
                      <center> <h4 class="page-header">View Reply from Olivereward</h4></center>
						<p>
						<?php
						$query_reply = $con->query("SELECT * FROM replysupport WHERE username='$username' AND msgid='$msgid' ");
						
						$row_reply = mysqli_fetch_array($query_reply);
						$reply = $row_reply['replymessage'];
						$title = $row_reply['title'];
						
		$update_reply = $con->query("UPDATE replysupport SET viewed='1' WHERE username='$username' AND msgid='$msgid' ");
						?>
						
						<form class='form'>
							<label>Title</label>
							<input type='text' value='<?php echo"$reply";  ?>' class='form-control' readonly>
							<br>
							<label>Reply</label>
							<textarea cols='10' rows='5' class='form-control' readonly> <?php echo"$reply" ?></textarea>
						</form>
						</p>
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
