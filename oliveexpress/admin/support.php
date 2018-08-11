<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<?php
session_start();
if(!isset($_SESSION['adminloggedin']))
{
	echo"<script>alert('access denied'); window.location.assign('../index.php');</script>";
	exit;
	
	
}
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
		$reply = 0;
			include("include/topmenu.php");
			
			if(isset($_GET['messageid'])){
				 
				 $reply = 1;
			}
		?>
        
        
        <div class="content mt-3" >

              <div class="row" >
			  <div class="col-lg-12" style='background-Color:white;'>
				<center><h3>Support</h3></center>
                 <?php
				   if($reply =='1'){
					
					
					$messageid = $_GET['messageid'];
					$username = $_GET['username'];
					
					$query_message = $con->query("SELECT * FROM support WHERE username = '$username' AND msgid = '$messageid' AND answered='0'");
					$row_message = mysqli_fetch_array($query_message);
					
					$show_title = $row_message['title'];
					$show_message = $row_message['body'];
					
				   
					echo"<div class='col-lg-12' style='background-Color:white;'>
                       
						<form style='margin-bottom:1.5em'>
							<label><b>Title </b></label>
							<input type='text' name='title' value='$show_title' id='title'  readonly class='form-control'><br>
							<label><b>Message Body</b></label>
							<textarea name='body' rows='5' cols='10' readonly class='form-control'>$show_message</textarea><br>
							<label><b>Reply</b></label>
							<textarea name='reply' rows='5' cols='10' class='form-control'>$show_message</textarea>
							<input style='margin-top:1em' type'button'  name='submit' class='btn btn-small btn-success' id='replybutton' value='submit'>
							<input type='hidden' name='username' value='$username'>
							<input type='hidden' name='msgid' value='$messageid'>
						</form>
						<center><img src='../images/ajax-loader.gif' id='img_approve_withdrawal_request'></center>
                    </div>";
					
					}elseif($reply =='0'){
						
						
						
						$query_reply = $con->query("SELECT * FROM support WHERE answered ='0' LIMIT 30");
						
						if(!$query_reply->num_rows >0)
						{
							echo"<div class='alert  alert-danger alert-dismissible fade show' role='alert'>NO SUPPORT SENT</div>";	
						}
						else{
						echo"<table class='table table-bordered'>
							<tr><th>supporrt Title</th><th>Date</th><th>Reply</th></tr>";
						while($row_reply =  mysqli_fetch_array($query_reply)){
							
							$title = $row_reply['title'];
							$data = $row_reply['date'];
							$messageid = $row_reply['msgid'];
							$username = $row_reply['username'];
							
							$formated_date = date('d/m/Y', $data);
							
							echo"<tr><td>$title</td><td>$formated_date</td><td><a href='support.php?reply=1&username=$username&messageid=$messageid' class='btn btn-success btn-small'>View & Reply</a></td></tr>";
							
						}
						echo"</table>";
						}
					}
					
					?>
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
