<header id="" class="transparent-header-modern fixed-header-bg-white w-100">
            <div class="top-header bg-secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-4">
                            <div class="top-contact float-right">
                                <ul class="list-text-white d-table">
								<li><i class="fas fa-user text-primary mr-1"></i>
								<?php  if(isset($_SESSION['uemail']))
								{ ?>
								<a href="logout.php">Logout</a>&nbsp;&nbsp;<?php } else { ?>
                
								<a href="login.php">Login</a>&nbsp;&nbsp;
                                | </li>

                                <li><i class="fas fa-user text-primary mr-1"></i><a href="register.php"> Register</li>
								<?php } ?>
								
								
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-nav secondary-nav hover-primary-nav py-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light p-0"> <a class="navbar-brand position-relative" href="#"><img class="nav-logo" src="images/logo/logo.png" alt=""></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                    <?php  if(isset($_SESSION['uemail']))
										{ ?>

                                       <?php if($_SESSION['get_data']['utype'] == 'agent')
                                       {
                                       ?>
                                        <li class="nav-item dropdown"> <a class="nav-link" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
										
										<li class="nav-item"> <a class="nav-link" href="about.php">About</a> </li>
										<!-- <li class="nav-item"> <a class="nav-link" href="history.php">Inquire History</a> </li> -->
										<li class="nav-item"> <a class="nav-link" href="custinquiries.php">Customer Inquiries</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="custbooking.php">Customer Book Schedule</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="custreservervation.php">Customer Reservations</a> </li>
										<!-- <li class="nav-item"> <a class="nav-link" href="agent.php">Agent</a> </li> -->
										
										<!-- <li class="nav-item"> <a class="nav-link" href="property.php">Properties</a> </li> -->
                                        <!-- <li class="nav-item"> <a class="nav-link" href="contact.php">Contact</a> </li> -->

                                        <?php }else{?>
                                            <li class="nav-item dropdown"> <a class="nav-link" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
										
										<li class="nav-item"> <a class="nav-link" href="about.php">About</a> </li>
										<li class="nav-item"> <a class="nav-link" href="history.php">Inquire</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="schedule.php">Schedule</a> </li>
										<li class="nav-item"> <a class="nav-link" href="reservation.php">Reservation</a> </li>
										
										<li class="nav-item"> <a class="nav-link" href="property.php">Properties</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="contact.php">Contact</a> </li>
                                            <?php }?>
                                        <?php }else {   
                                        ?>
                                        <li class="nav-item dropdown"> <a class="nav-link" href="index.php" role="button" aria-haspopup="true" aria-expanded="false">Home</a></li>
										
										<li class="nav-item"> <a class="nav-link" href="about.php">About</a> </li>
										
										<li class="nav-item"> <a class="nav-link" href="agent.php">Agent</a> </li>
										
										<li class="nav-item"> <a class="nav-link" href="property.php">Properties</a> </li>
                                        <li class="nav-item"> <a class="nav-link" href="contact.php">Contact</a> </li>
                                        <?php }?>
										<?php  if(isset($_SESSION['uemail']))
										{ ?>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
											<ul class="dropdown-menu">
                                            <?php if($_SESSION['get_data']['utype'] == 'agent'){
                                            ?>
												<li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li>
												<li class="nav-item"> <a class="nav-link" href="feature.php">Add Property</a> </li>
                                                <li class="nav-item"> <a class="nav-link" href="featureadmin.php">Admin Assigned Property</a> </li>
												<li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a> </li>	
											<?php 
                                             }else{
                                            ?>
                                                <li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li>
												<li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a> </li>	

                                            <?php }?>
                                            </ul>
                                        </li>
										<?php } else { ?>
										<li class="nav-item"> <a class="nav-link" href="login.php">Login/Register</a> </li>
										<?php } ?>  
                                    </ul>
                                    
									
									
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>