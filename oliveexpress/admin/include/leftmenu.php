<?php

	$roles = $_SESSION['role'];
	
?>
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home2.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
					<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Account Settings</a>
                        <ul class="sub-menu children dropdown-menu">
							<?php
							if($roles == '1' )
							{
								echo"<li><a href='createaccount.php'>Create Account</a></li>";
							}
							?>	
                            <li><a href="updatepassword.php">Update Password</a></li>
                        </ul>
                    </li>
                   <p><br><br></p>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user fa-1.8x"></i>View Members</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="members.php">AllMembers</a></li>
							<!--<li><a href="qualifiedmembers.php?stage=starter"> Chick Stage</a></li>-->
                            <li><a href="qualifiedmembers.php?stage=1">Dove Stage</a></li>
							<li><a href="qualifiedmembers.php?stage=2"> Indigo stage</a></li>
							<li><a href="qualifiedmembers.php?stage=3"> Patridge Stage</a></li>
							<li><a href="qualifiedmembers.php?stage=4">Flamingo Stage</a></li>
							<li><a href="qualifiedmembers.php?stage=5">Peacock Stage</a></li>
							<li><a href="qualifiedmembers.php?stage=6">Eagle Stage</a></li>
                        </ul>
                    </li>
					 <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user fa-1.8x"></i>Paid Stage Reward</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="members.php">AllMembers</a></li>
							<!--<li><a href="qualifiedmembers.php?stage=starter"> Chick Stage</a></li>-->
                            <li><a href="paidmembers.php?stage=1">Dove Stage</a></li>
							<li><a href="paidmembers.php?stage=2">Indigo stage</a></li>
							<li><a href="paidmembers.php?stage=3"> Patridge Stage</a></li>
							<li><a href="paidmembers.php?stage=4">Flamingo Stage</a></li>
							<li><a href="paidmembers.php?stage=5">Peacock Stage</a></li>
							<li><a href="paidmembers.php?stage=6">Eagle Stage</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>withdrawals</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="viewwithdrawalrequest.php">withdrawal Request</a></li>
                            <li><a href="withdrawalhistory.php">Withdrawal History</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="viewmonitor.php"> <i class="menu-icon fa fa-dashboard"></i>View Monitor </a>
                    </li>
                    <!--<h3 class="menu-title">Icons</h3><!-- /.menu-title -->
					<p><br><br></p>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Product Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="uploadcategory.php">Upload Category</a></li>
                            <li><a href="uploadclass.php">Upload product Class</a></li>
							<li><a href="editcategory.php">Edit category</a></li>
							<li><a href="editclass.php">Edit Class</a></li>
							<li><a href="deletecategory.php">Delete category</a></li>
							<li><a href="deleteclass.php">Delete Class</a></li>
                        </ul>
                    </li>
                    <li>
						<?php
							if($roles == '1' )
							{
								echo"<a href='creditclient.php'><i class='menu-icon ti-email'></i>Credit Client Account </a>";
							}
						?>
					</li>
					
					<li>
                        <a href="support.php"> <i class="menu-icon ti-email"></i>view support </a>
                    </li>
					<li>
                        <a href="../logout.php"> <i class="menu-icon ti-email"></i>logout</a>
                    </li>
                    
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->