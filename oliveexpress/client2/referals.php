<!doctype html>
<?php
session_start();

include("include/header.php");
$id = $_SESSION['id'];
?>
<style>
	.mydetailstable th, .mybonustable th{
		background:url('images/tablebackground.jpg');
		color:white;
		font-size:0.7em;
		padding:0.5em;
		height:1.5em;
	}
	.mydetailstable td, .mybonustable td{
		background:#fff;
		color:black;
		font-size:0.7em;
		padding:0.5em;
		height:1.5em;
	}
	
	.rewards{
		background-color:#1E90FF;
		border-radius:9px;
		padding:0.8em;
	}
</style>
<body>


        <!-- Left Panel -->
<?php
include("include/leftmenu.php");
include("../connection/db.php");
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
        
        <div class="content">

            <div class="col-sm-12">
               <?php
				   $sql_referal = "SELECT * FROM users WHERE sponsor = '$id'";
				   $query_referal = $con->query($sql_referal);
					
			   ?>
            </div>
			
			
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php
include("include/footer.php");
?>

</body>
</html>
