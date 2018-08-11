
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="home.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                   <p><br><br></p>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user fa-1.8x"></i>Profile</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="viewprofile.php">View Profile</a></li>
                            <li><a href="updateprofile.php">Update Profile</a></li>
							<li><a href="changepassword.php">Change Password</a></li>
							<li><a href="updatebankdetails.php">Update Bank Details</a></li>
                            <li><a href="updatetransactionpassword.php">Update Transaction Password</a></li>
                        </ul>
                    </li>
					<li class="active">
                        <a href="viewreferals.php"> <i class="menu-icon fa fa-dashboard"></i>View Referals </a>
                    </li>
					<li class="active">
                        <a href="viewdownlinersdeposite.php"> <i class="menu-icon fa fa-dashboard"></i>Deposite Record </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>withdrawals</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="makewithdrawal.php">make withdrawal</a></li>
                            <li><a href="withdrawalhistory.php">Withdrawal History</a></li>
                        </ul>
                    </li>
					
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>wallet</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="transfer.php">Wallet Transfer</a></li>
							
							<li><a href="transactionhistory.php">Transaction History</a></li>
                        </ul>
                    </li>
					
                    <!--<h3 class="menu-title">Icons</h3><!-- /.menu-title -->
					<p><br><br></p>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Product Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="uploadproduct.php">upload product</a></li>
                            <!--<li><a href="viewproduct.php">view orders</a></li>
							<li><a href="editproduct.php">Edit Product</a></li>-->
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Genealogy</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="downliners.php">Tree view</a></li>
                            <li><a href="startertreeview.php">Chick Tree </a></li>
							
							<?php
								$check_present_stage = $con->query("SELECT * FROM currentlevel WHERE id = '$id'");
								if($check_present_stage->num_rows >0)
								{
									$row_present_stage = mysqli_fetch_array($check_present_stage);
									$present_stage = $row_present_stage['mycurrentlevel'];
									
									if($present_stage >= 1){
										echo"<li><a href='stage1.php'>Dove Stage </a></li>";
									}
									if($present_stage >= 2){
										echo"<li><a href='stage2.php'>Indigo Stage </a></li>";
									}
									if($present_stage >= 3){
										echo"<li><a href='stage3.php'>Patridge Stage </a></li>";
									}
									if($present_stage >= 4){
										echo"<li><a href='stage4.php'>Flamingo Stage </a></li>";
									}
									if($present_stage >= 5){
										echo"<li><a href='stage5.php'>Peacock Stage </a></li>";
									}
									if($present_stage >= 6){
										echo"<li><a href='stage6.php'>Eagle Stage </a></li>";
									}
									
								}
							
							?>
							
                        </ul>
                    </li>
					<li>
                        <a href="../index.php"> <i class="menu-icon ti-email"></i>shop </a>
                    </li>
					
					<li>
                        <a href="support.php"> <i class="menu-icon ti-email"></i>support </a>
                    </li>
					<li>
                        <a href="../logout.php"> <i class="menu-icon ti-email"></i>logout</a>
                    </li>
                    
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->