<header id="header" class="header">
<?php
$username = $_SESSION['username'];
?>
            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        
   <!----for envelop-->    <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
							
						<?php
						
							$query_replysupport = $con->query("SELECT * FROM replysupport WHERE username = '$username' AND viewed='0'");
							
							if($query_replysupport->num_rows >0){
								$number_mails = $query_replysupport->num_rows;
								echo"<span class='count bg-primary'> $number_mails </span>
                          </button>
							<div class='dropdown-menu' aria-labelledby='message'>
                            <p class='red'>You have $number_mails Mails</p>
						  ";
								while($row_mails = mysqli_fetch_array($query_replysupport))
								{
									$email_title = $row_mails['title'];
									$msgid = $row_mails['msgid'];
						?>

                            <a class="dropdown-item media bg-flat-color-1" href='viewsupport.php?username=<?php echo"$username" ?>&msgid=<?php echo"$msgid" ?>'>
                               
                                <span class="message media-body">                                   
                                        <p Style='color:black'><?php echo"$email_title";  ?></p>
                                </span>
                            </a>
							</div>
							<?php
								}
							}else{
								
								echo"'<span class='count bg-primary'> 0 </span>
                          </button>";
							}       
								?>
                          
						
						  
						  
                        </div>  <!----end for envelop-->
                  </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="viewprofile.php"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="../logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->