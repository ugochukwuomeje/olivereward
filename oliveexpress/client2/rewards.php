<!doctype html>
<?php
session_start();
$id = $_SESSION['id'];
include("include/header.php");
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
               <div class="panel-group">
				  <div class="panel panel-primary">
					<div class="panel-heading rewards">
					  <h4 class="panel-title" >
						<a data-toggle="collapse" href="#collapse1" style='color:white'>Stage 1 Reward</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body">Panel Body</div>
					  <div class="panel-footer">Panel Footer</div>
					</div>
				  </div>
				</div>
            </div>
			<div class="col-sm-12">
               <div class="panel-group">
				  <div class="panel panel-primary">
					<div class="panel-heading rewards">
					  <h4 class="panel-title" >
						<a data-toggle="collapse" href="#collapse1" style='color:white'>Stage 2 Reward</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body">Panel Body</div>
					  <div class="panel-footer">Panel Footer</div>
					</div>
				  </div>
				</div>
            </div>
			<div class="col-sm-12">
               <div class="panel-group">
				  <div class="panel panel-primary">
					<div class="panel-heading rewards">
					  <h4 class="panel-title" >
						<a data-toggle="collapse" href="#collapse1" style='color:white'>Stage 3 Reward</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body">Panel Body</div>
					  <div class="panel-footer">Panel Footer</div>
					</div>
				  </div>
				</div>
            </div>
			<div class="col-sm-12">
               <div class="panel-group">
				  <div class="panel panel-primary">
					<div class="panel-heading rewards">
					  <h4 class="panel-title" >
						<a data-toggle="collapse" href="#collapse1" style='color:white'>Stage 4 Reward</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body">Panel Body</div>
					  <div class="panel-footer">Panel Footer</div>
					</div>
				  </div>
				</div>
            </div>
			<div class="col-sm-12">
               <div class="panel-group">
				  <div class="panel panel-primary">
					<div class="panel-heading rewards">
					  <h4 class="panel-title" >
						<a data-toggle="collapse" href="#collapse1" style='color:white'>Stage 5 Reward</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body">Panel Body</div>
					  <div class="panel-footer">Panel Footer</div>
					</div>
				  </div>
				</div>
            </div>
			<div class="col-sm-12">
               <div class="panel-group">
				  <div class="panel panel-primary">
					<div class="panel-heading rewards">
					  <h4 class="panel-title" >
						<a data-toggle="collapse" href="#collapse1" style='color:white'>Stage 6 Reward</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body">Panel Body</div>
					  <div class="panel-footer">Panel Footer</div>
					</div>
				  </div>
				</div>
            </div>
			<div class="col-sm-12">
               <div class="panel-group">
				  <div class="panel panel-primary">
					<div class="panel-heading rewards">
					  <h4 class="panel-title" >
						<a data-toggle="collapse" href="#collapse1" style='color:white'>Stage 1 Reward</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body">Panel Body</div>
					  <div class="panel-footer">Panel Footer</div>
					</div>
				  </div>
				</div>
            </div>
			
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php
include("include/footer.php");
?>

</body>
</html>
