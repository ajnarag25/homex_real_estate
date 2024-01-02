<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Home Dreamers Realty and Development Corporation</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
		
		
			<!-- Header -->
				<?php include("header.php"); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Agent</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Agent</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Agent List</h4>
									<?php 
										if(isset($_GET['msg']))	
										echo $_GET['msg'];	
									?>
								</div>
								<div class="card-body">

								<table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
													<th>Image</th>
                                                    <th>First Name</th>
													<th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Utype</th>
													<th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>

											<?php
												$query = "SELECT * FROM user WHERE utype = 'agent'";
												$result = mysqli_query($conn, $query);
												while ($row = mysqli_fetch_array($result)) {
				
											?>
                                                <tr>
													<td><?php echo $row['uid'] ?></td>
													<td><img src="user/<?php echo $row['uimage']; ?>" height="50px" width="50px"></td>
                                                    <td><?php echo $row['fname']; ?></td>
													<td><?php echo $row['lname']; ?></td>
                                                    <td><?php echo $row['uemail']; ?></td>
                                                    <td><?php echo $row['uphone']; ?></td>
                                                    <td><?php echo $row['utype']; ?></td>
													<td>
													<?php 
													if ($row['ustatus'] == 'Unverified'){
														?>
														<label for="" class="text-warning">Unverified</label>
														<?php
													}else{
														?>
														<label for="" class="text-success">Verified</label>
														<?php
													}
													?>
													</td>
                                                    <td>
													<?php 
													if ($row['ustatus'] == 'Unverified'){
														?>
														<button class="btn btn-success"  data-toggle="modal" data-target="#verifyModal<?php echo $row['uid'] ?>">Verify</button>
														<?php
													}else{
														?>
														<button class="btn btn-warning text-white" data-toggle="modal" data-target="#unverifyModal<?php echo $row['uid'] ?>">Unverify</button>
														<?php
													}
													?>
														<button class="btn btn-danger" data-toggle="modal" data-target="#deleteUser<?php echo $row['uid'] ?>">Delete</button>
													</td>
                                                </tr>
												
												<!-- Modal Delete User -->
												<div class="modal fade" id="deleteUser<?php echo $row['uid'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<form action="functions.php" method="POST">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body text-center">
																	<h4>Are you sure to delete this current User Account? <b><?php echo $row['uname'] ?></b></h4>
																	<p>This action is irreversible!</p>
																</div>
																<div class="modal-footer">
																	<input type="hidden" name="del_agent_id" value="<?php echo $row['uid'] ?>">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<button type="submit" name="deleteAgent" class="btn btn-danger">Delete</button>
																</div>
															</div>
														</form>
													</div>
												</div>
												
												<!-- Modal Unverify -->
												<div class="modal fade" id="unverifyModal<?php echo $row['uid'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Unverify Account</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form method="POST" action="functions.php">
																<div class="modal-body">
																	<div class="row">
																		<div class="col-md-6">
																			<label for="">Account Information:</label>
																			<ul>
																				<li><?php echo $row['uname']; ?></li>
																				<li><?php echo $row['uemail']; ?></li>
																				<li><?php echo $row['uphone']; ?></li>
																			</ul>
																		</div>
																		<div class="col-md-4">
																			<div class="text-center">
																				<label for="">Image:</label>
																				<img src="user/<?php echo $row['uimage']; ?> " width="150" alt="">
																			</div>   
																		</div>
																	</div>
																	<br>
																	<label for="">Compose Message:</label>
																	<textarea class="form-control" name="msg" id="" cols="30" rows="5" required></textarea>
																</div>

																<div class="modal-footer">
																	<input type="hidden" value="<?php echo $row['uid'] ?>" name="id">
																	<input type="hidden" value="<?php echo $row['uemail'] ?>" name="email">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-warning text-white" name="unverify_agent">Unverify Account</button>
																</div>
															</form>
														</div>
													</div>
												</div>

												<!-- Modal Verify -->
												<div class="modal fade" id="verifyModal<?php echo $row['uid'] ?>" tabindex="-1" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Verify Account</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<form method="POST" action="functions.php">
																<div class="modal-body">
																	<div class="row">
																		<div class="col-md-6">
																			<label for="">Account Information:</label>
																			<ul>
																				<li><?php echo $row['uname']; ?></li>
																				<li><?php echo $row['uemail']; ?></li>
																				<li><?php echo $row['uphone']; ?></li>
																			</ul>
																		</div>
																		<div class="col-md-4">
																			<div class="text-center">
																				<label for="">Image:</label>
																				<img src="user/<?php echo $row['uimage']; ?> " width="150" alt="">
																			</div>   
																		</div>
																	</div>
																	<br>
																	<label for="">Compose Message:</label>
																	<textarea class="form-control" name="msg" id="" cols="30" rows="5" required></textarea>
																</div>

																<div class="modal-footer">
																	<input type="hidden" value="<?php echo $row['uid'] ?>" name="id">
																	<input type="hidden" value="<?php echo $row['uemail'] ?>" name="email">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-success" name="verify_agent">Verify Account</button>
																</div>
															</form>
														</div>
													</div>
												</div>

									

						

                                                <?php
											
												} 
												?>
                                               
                                            </tbody>
                                        </table>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.select.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatables/buttons.flash.min.js"></script>
		<script src="assets/plugins/datatables/buttons.print.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<!-- Validation Messages -->
		<?php 
			if (isset($_SESSION['status']) && $_SESSION['status'] !='')
			{
		?>
		<script>
			$(document).ready(function(){
				Swal.fire({
					icon: '<?php echo $_SESSION['status_icon'] ?>',
					title: '<?php echo $_SESSION['status'] ?>',
					confirmButtonColor: 'rgb(0, 0, 0)',
					confirmButtonText: 'Okay'
				});
				<?php  unset($_SESSION['status']); ?>
			})
		</script>
		
		<?php
		}else{
			unset($_SESSION['status']);
		}
		?>
    </body>
</html>
