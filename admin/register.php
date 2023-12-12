<?php 
	session_start();

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
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="page-wrappers login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								<!-- Form -->
								<form method="POST" action="functions.php">
								<div class="form-group">
										<input class="form-control" type="text" placeholder="Fullname" name="fname" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Username" name="name" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="email" placeholder="Email" name="email" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="password" placeholder="Password" name="pass1" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="password" placeholder="Retype Password" name="pass2" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="date" placeholder="Date of Birth" name="dob" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Phone" name="phone" maxlength="11" required>
									</div>
									<div class="form-group mb-0">
										<input class="btn btn-primary btn-block" type="submit" name="register" Value="Register">
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<!-- <div class="social-login">
									<span>Register with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
									<a href="#" class="google"><i class="fa fa-google"></i></a>
									<a href="#" class="facebook"><i class="fa fa-twitter"></i></a>
									<a href="#" class="google"><i class="fa fa-instagram"></i></a>
								</div> -->
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Already have an account? <a href="index.php">Login</a></div>
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
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
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