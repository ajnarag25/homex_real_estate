<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
error_reporting(0);
include("config.php");
								
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags --><!-- FOR MORE PROJECTS visit: codeastro.com -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Real Estate PHP">
<meta name="keywords" content="">
<meta name="author" content="Unicoder">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!--	Title
	=========================================================-->
<title>Home Dreamers Realty and Development Corporation</title>
</head>
<body>

<!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
--> 


<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property Detail</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Property Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->

		
        <div class="full-row">
            <div class="container">
                <div class="row">
				
					<?php
                        $id = $_REQUEST['pid']; 
                        $query = "SELECT * FROM property WHERE pid = $id";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) 
						{
					  ?>
				  
                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-md-12">
                                <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;"> 
                                    <!-- Slide 1-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['19'];?>" class="ls-bg" alt="" /> </div>
                                    
                                    <!-- Slide 2-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['20'];?>" class="ls-bg" alt="" /> </div>
                                    
                                    <!-- Slide 3-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['21'];?>" class="ls-bg" alt="" /> </div>
									
									<!-- Slide 4-->
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['22'];?>" class="ls-bg" alt="" /> </div>
									
									<!-- Slide 5-->
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['23'];?>" class="ls-bg" alt="" /> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <?php 
                                    if($row['5'] == 'Pending'){
                                        ?>
                                        <div class="bg-warning d-table px-3 py-2 rounded text-white text-capitalize">
                                            <?php echo 'Pending' ?>
                                        </div>
                                        <?php
                                    }elseif($row['5'] == 'Sold Out'){
                                        ?>
                                        <div class="bg-secondary d-table px-3 py-2 rounded text-white text-capitalize">
                                            <?php echo 'Sold Out' ?>
                                        </div>
                                        <?php
                                    }elseif($row['5'] == 'Reserved'){
                                        ?>
                                        <div class="bg-danger d-table px-3 py-2 rounded text-white text-capitalize">
                                            <?php echo 'Reserved' ?>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="bg-success d-table px-3 py-2 rounded text-white text-capitalize">
                                            <?php echo 'For '.$row['5']; ?>
                                        </div>
                                        <?php
                                    }
                                ?>
                 
                                <h4 class="mt-4 text-secondary text-capitalize"><?php echo $row['1'];?></h4>
                                <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i> &nbsp;<?php echo $row['16'];?>, <?php echo $row['17'];?>, <?php echo $row['15'];?></span>
							</div>
                            <div class="col-md-4">
                                <!-- Inquire Modal -->
                                <?php
                                    $uid = $_SESSION['get_data']['uid'];
                                    $property_id = $_GET['pid'];

                                    $check_status = mysqli_query($conn, "SELECT * FROM property WHERE pid = '$property_id';");
                                    $property_data = mysqli_fetch_assoc($check_status);       

                                    if($property_data['stype'] == 'Reserved' OR $property_data['stype'] == 'Sold Out'){
                                        // display nothing
                                    }else{
                                        $check_if_inquired = mysqli_query($conn,"SELECT * FROM inquire WHERE uid='$uid' AND property_id = '$property_id';");
                                        $cnt = mysqli_num_rows($check_if_inquired);
                                        if ($cnt > 0){
                                            // DISPLAY NOTHING
                                        }else{
                                            ?>
                                            <?php 
                                            
                                            if ($_SESSION['get_data']['utype'] == 'agent') {
                                                    // DISPLAY NOTHING
                                            }else{
                                            ?>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Inquire</button>
                                            <?php 
                                            }
                                        }
                                    }
                                    ?>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Inquire Property</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="functions.php" method="post">
                                        <?php 
                                        if ($uid >0) {
                                        ?>
                                        <div class="form-group">
                                            <input type="text" name="property_id" value="<?php echo $_GET['pid']?>" hidden>
                                            <input type="text" name =  'admin_agent_id' value = "<?php echo $row['34'];?>" hidden>
                                            <input type="text" name =  'uid' value = "<?php echo $_SESSION['get_data']['uid'];?>" hidden>
                                            <input type="text" name =  'utype' value = "<?php echo $row['33'];?>" hidden>

                                            <label for="" class="form-label">First Name:</label>
                                            <input type="text" name="fname" class="form-control" value="<?php echo $_SESSION['get_data']['fname'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Last Name:</label>
                                            <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['get_data']['lname'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Email:</label>
                                            <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['get_data']['uemail'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Contact Number:</label>
                                            <input type="text" name="cnum" class="form-control" value="<?php echo $_SESSION['get_data']['uphone'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Message(Optional):</label>
                                            <textarea class="tinymce form-control" name="message" rows="3" cols="10"></textarea>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit_inquire" class="btn btn-primary">Send Inquiry</button>
                                        </div>
                                        <?php
                                        }else{
                                        ?>
                                        <div class="form-group">
                                            <input type="text" name="property_id" value="<?php echo $_GET['pid']?>" hidden>
                                            <input type="text" name =  'admin_agent_id' value = "<?php echo $row['34'];?>" hidden>
                                            <input type="text" name =  'uid' value = "<?php echo $_SESSION['get_data']['uid'];?>" hidden>

                                            <label for="" class="form-label">First Name:</label>
                                            <input type="text" name="fname" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Last Name:</label>
                                            <input type="text" name="lname" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Email:</label>
                                            <input type="text" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Contact Number:</label>
                                            <input type="text" name="cnum" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-form-label">Message(Optional):</label>
                                            <textarea class="tinymce form-control" name="message" rows="10" cols="30"></textarea>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit_inquire_no_acc" class="btn btn-primary">Send Inquiry</button>
                                        </div>

                                        <?php }?>
                                    </form>
                                </div>
                            </div>
                            
                            </div>
                            <?php
                                $uid = isset($_SESSION['get_data']['uid']) ? $_SESSION['get_data']['uid'] : '';
                                $property_id = isset($_GET['pid']) ? $_GET['pid'] : '';
                                
                                $check_status = mysqli_query($conn, "SELECT * FROM property WHERE pid = '$property_id';");
                                $property_data = mysqli_fetch_assoc($check_status);           

                                if($property_data['stype'] == 'Reservation' OR $property_data['stype'] == 'Reserved' OR $property_data['stype'] == 'Sold Out'){
                                   // display nothing
                                }else{
                                     // Check if the property is reserved by the current user
                                     $check_if_reserved = mysqli_query($conn, "SELECT * FROM reservation WHERE uid='$uid' AND property_id = '$property_id';");
                                     $cnt_reserved = mysqli_num_rows($check_if_reserved);
 
                                     // Check if the property is booked
                                     date_default_timezone_set('Asia/Manila');
                                     $date_today = date('Y-m-d');
                                     $time_today = date('H:i:s');
                                     $check_if_booked = mysqli_query($conn, "SELECT * FROM sched_book WHERE property_id = '$property_id' AND user_id='$uid' ");
                                     $cnt_booked = mysqli_num_rows($check_if_booked);
 
                                     if ($cnt_reserved > 0 || empty($uid)) {
                                         // Property is reserved or user is not logged in
                                         // Display none or perform other actions
                                         // You can use this space for additional logic or leave it blank
                                     } else {
                                         if ($_SESSION['get_data']['utype'] != 'agent') {
                                             // User is not an agent
                                             if ($cnt_booked > 0) {
                                                 // Property is booked
                                                 ?>
                                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reserve">Reserve</button>
                                                 <?php
                                             } else {
                                                 // Property is not booked
                                                 ?>
                                                 <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#book">Book</button>
                                                 <?php
                                             }
                                         }
                                     }
                                }

                            ?>
							</div>
                            <!-- Modal Book Sched-->
                            <div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Book for Tripping</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <div class="modal-body">
                                        <form action="functions.php" method="post" >
                                            <input type="text" name="property_id" value="<?php echo $_GET['pid']?>" hidden>
                                            <input type="text" name='admin_agent_id' value = "<?php echo $row['34'];?>" hidden>
                                            <input type="text" name='uid' value = "<?php echo $_SESSION['get_data']['uid'];?>" hidden>
                                            <input type="text" name='utype' value = "<?php echo $row['33'];?>" hidden>
                                            <input type="text" name="name" value="<?php echo $_SESSION['get_data']['fname'];?> <?php echo $_SESSION['get_data']['lname'];?>" hidden>
                                            <input type="text" name="email" value="<?php echo $_SESSION['get_data']['uemail'];?>" hidden>
                                            <input type="text" name="phone" value="<?php echo $_SESSION['get_data']['uphone'];?>" hidden>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="">Date:</label>
                                                    <input type="date" name="date_sched" class="form-control" required>
                                                    <hr>
                                                    <label for="">Time:</label>
                                                    <input type="time" name="time_sched" class="form-control" required>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="submit_book" class="btn btn-warning text-white">Book</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Reserve-->
                            <div class="modal fade" id="reserve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reserve Property</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <div class="modal-body">
                                        <form action="functions.php" method="post"  enctype="multipart/form-data">
                                            <input type="text" name="property_id" value="<?php echo $_GET['pid']?>" hidden>
                                            <input type="text" name =  'admin_agent_id' value = "<?php echo $row['34'];?>" hidden>
                                            <input type="text" name =  'uid' value = "<?php echo $_SESSION['get_data']['uid'];?>" hidden>
                                            <input type="text" name =  'utype' value = "<?php echo $row['33'];?>" hidden>
                                            <input type="hidden" name="name" value="<?php echo $_SESSION['get_data']['fname'];?> <?php echo $_SESSION['get_data']['lname'];?>">
                                            <input type="hidden" name="email" value="<?php echo $_SESSION['get_data']['uemail'];?>">
                                            <input type="hidden" name="phone" value="<?php echo $_SESSION['get_data']['uphone'];?>">
                                            <div class="row">
                                                <div class="col">
                                                    <ul>
                                                    <label for="">User Information:</label>
                                                        <li>Name: <?php echo $_SESSION['get_data']['fname'];?> <?php echo $_SESSION['get_data']['lname'];?></li>
                                                        <li>Email: <?php echo $_SESSION['get_data']['uemail'];?></li>
                                                        <li>Contact No: <?php echo $_SESSION['get_data']['uphone'];?></li>
                                                    </ul>
                                                    <hr>
                                                    <ul>
                                                    <label for="">Upload Inital Requirements:</label>
                                                    <li><b>Photocopy of Company ID (Front & Back)</b> </li>
                                                    <li><input type="file" name="company_id" required></li>
                                                    <li><b>Payslip ( a must for reservation) </b></li>
                                                    <li><input type="file" name="payslip" required></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul>
                                                        <label for="">Bank Inital Requirements:</label>
                                                        <li><b>2 Government Valid IDs</b></li>  
                                                        <li><b>ID Pics 1x1</b></li>
                                                        <li><b>Proof of Billing/Remittance</b></li>
                                                        <li><b>Birth/Marriage Certificate</b></li>
                                                        <li><b>Certificate of Employment/Job Contract</b></li> 
                                                        <li><b>TIN/Passport</b> </li>
                                                        <li><b>SPA (IF NEEDED, especially for OFW)</b></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- <hr> -->
                                            <!-- <label for="">Select Payment Method:</label>
                                            <select class="form-control" name="paymethod" id="">
                                                <option value="cash">Cash</option>
                                                <option value="bank">Bank</option>
                                                <option value="loan">Loan</option>
                                            </select> -->
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="submit_reserve" class="btn btn-danger">Reserve Property</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-success text-left h5 my-2 text-md-right">
                                    P <?php 
                                    $formattedNumber = number_format($row['13'], 2, '.', ',');
                                    echo $formattedNumber;
                                    ?>
                                </div>
                                <?php
                                    $uid = isset($_SESSION['get_data']['uid']) ? $_SESSION['get_data']['uid'] : '';
                                    if ($uid == ''){
                                        ?>
                                        <div class="text-left text-md-right">
                                            <span><a href="" class="text-warning" data-toggle="modal" data-target="#computation<?php echo $_GET['pid']; ?>">Show computation</a></span>
                                            <br>
                                            <label for="">Price</label>
                                        </div>
                                        
                                        <!-- Modal Default Computation -->
                                        <div class="modal fade" id="computation<?php echo $_GET['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Computation for <?php echo $row['1'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php 
                                                            $compute = $row['13'] * 0.10;
                                                            $disc1 = $row['13'] * 0.05;
                                                            $disc2 = $row['13'] * 0.10;
                                                            $disc3 = $row['13'] * 0.15;
                                                            $disc4 = $row['13'] * 0.20;
                                                            $net = $row['13'] - 20000;
                                                            $price = number_format($row['13'], 2, '.', ',');
                                                            $dp = number_format($compute, 2, '.', ',');
                                                            $net_equity = number_format($net, 2, '.', ',')
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <h5>Reservation Fee :</h5>
                                                                <ul>
                                                                    <li>Equity Down payment 10% of <b>P <?php echo $price ?></b></li>
                                                                    <li>Less Reservation fee: <b>P 20,000</b> </li>
                                                                    <li>Net Equity Payment: <b>P <?php echo $net_equity ?></b> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h5>Discounts:</h5>
                                                                <p><span class="text-danger">*</span> Note: 5% - 20% are default in the system it may change if the agent provide a new discount.</p>
                                                                <b>Computed downpayments are based on discounts.</b>
                                                                <ul>
                                                                    <li>- 5% Less = <b>P <?php echo number_format($disc1, 2, '.', ',') ?></b></li>
                                                                    <li>- 10% Less = <b>P <?php echo number_format($disc2, 2, '.', ',') ?></b></li>
                                                                    <li>- 15% Less = <b>P <?php echo number_format($disc3, 2, '.', ',') ?></b></li>
                                                                    <li>- 20% Less = <b>P <?php echo number_format($disc4, 2, '.', ',') ?></b></li>
                                                                </ul>
                                                        
                                                            </div>
                                                        </div>
                                                        <h5>Estimated Monthly Amortization:</h5>
                                                        <p>(Based only on Net Equity)</p>
                                                        <?php 
                                                            $selling_price = $net;
                                                            // $monthly_rate = 0.07 / 12 / 100;
                                                            // $month1 = 60 * 12;
                                                            // $month2 = 120 * 12;
                                                            // $month3 = 180 * 12;
                                                            // $month4 = 240 * 12;
                                                            
                                                            // $monthly_payment_1 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month1))) / ((pow(1 + $monthly_rate, $month1)) - 1);
                                                            // $monthly_payment_2 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month2))) / ((pow(1 + $monthly_rate, $month2)) - 1);
                                                            // $monthly_payment_3 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month3))) / ((pow(1 + $monthly_rate, $month3)) - 1);
                                                            // $monthly_payment_4 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month4))) / ((pow(1 + $monthly_rate, $month4)) - 1);

                                                            $factor_rate_5_years = 0.0198012;
                                                            $factor_rate_10_years = 0.01161085;
                                                            $factor_rate_15_years = 0.00898828;
                                                            $factor_rate_20_years = 0.00775299;

                                                            // Calculate Amount and Income Requirement for each term
                                                            $amount_5_years = $factor_rate_5_years * $selling_price;
                                                            $income_requirement_5_years = $factor_rate_5_years * $selling_price * 3;

                                                            $amount_10_years = $factor_rate_10_years * $selling_price;
                                                            $income_requirement_10_years = $factor_rate_10_years * $selling_price * 3;

                                                            $amount_15_years = $factor_rate_15_years * $selling_price;
                                                            $income_requirement_15_years = $factor_rate_15_years * $selling_price * 3;

                                                            $amount_20_years = $factor_rate_20_years * $selling_price;
                                                            $income_requirement_20_years = $factor_rate_20_years * $selling_price * 3;
                                                            
                                                        ?>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Term</th>
                                                                    <th scope="col">Interst Rate</th>
                                                                    <th scope="col">Factor Rate</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Income Requirement</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th>5</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.01980120</td>
                                                                    <td>P <?php echo number_format($amount_5_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_5_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>10</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.01161085</td>
                                                                    <td>P <?php echo number_format($amount_10_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_10_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>15</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.00898828</td>
                                                                    <td>P <?php echo number_format($amount_15_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_15_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>20</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.00775299</td>
                                                                    <td>P <?php echo number_format($amount_20_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_20_years, 2, '.',',') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    
                                                        <!-- <p>Fixed for five (3) years. Computation for Interest rate is at 7% fixed for five (3) years only</p>
                                                        <p>A. Prices are subject to change without prior notice.</p>
                                                        <p>B. Bank Fees rates may vary per bank.</p> -->
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }else{
                                        $id = $_GET['pid']; 
                                        $query = "SELECT * FROM property as p INNER JOIN reservation as r ON p.pid = r.property_id WHERE p.pid = $id AND p.stype = 'Reserved'";
                                        $reservation = mysqli_query($conn, $query);
                                        $chk_reserved = mysqli_num_rows($reservation);
                                        $reserve = mysqli_fetch_array($reservation);
                                        
                                        if($chk_reserved){
                                    ?>

                                        <div class="text-left text-md-right">
                                            <span><a href="" class="text-warning" data-toggle="modal" data-target="#computation<?php echo $_GET['pid']; ?>">Show computation</a></span>
                                            <br>
                                            <label for="">Price</label>
                                        </div>
                                        
                                        <!-- Modal With Computation -->
                                        <div class="modal fade" id="computation<?php echo $_GET['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Computation for <?php echo $row['1'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php 
                                                            $compute = $row['13'] * 0.10;
                                                            $disc = $row['13'] * ($reserve['discount'] / 100);
                                                            $net = $row['13'] - $reserve['reservation_fee'];
                                                            $price = number_format($row['13'], 2, '.', ',');
                                                            $dp = number_format($compute, 2, '.', ',');
                                                            $net_equity = number_format($net, 2, '.', ',');

                                                            $total = $net - $disc;
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <h5>Reservation Fee :</h5>
                                                                <ul>
                                                                    <li>Equity Down payment 10% of <b>P <?php echo $price ?></b></li>
                                                                    <li>Less Reservation fee: <b>P <?php echo   number_format($reserve['reservation_fee'], 2, '.', ',') ?></b> - Your Reservation Fee.</li>
                                                                    <li>Net Equity Payment: <b>P <?php echo $net_equity ?></b> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h5>Your Discount:</h5>
                                                                <ul>
                                                                    <li>- <?php echo $reserve['discount'] ?>% Less = <b>P <?php echo number_format($disc, 2, '.', ',') ?></b></li>
                                                                    <li>- Your Total less Discount = <b>P <?php echo number_format($total, 2, '.', ',') ?></b></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h5>Estimated Monthly Amortization:</h5>
                                                        <p>(Based on Total less Discount)</p>
                                                        <?php 
                                                            $selling_price = $total;
                                                            // $monthly_rate = 0.07 / 12 / 100;
                                                            // $month1 = 60 * 12;
                                                            // $month2 = 120 * 12;
                                                            // $month3 = 180 * 12;
                                                            // $month4 = 240 * 12;
                                                            
                                                            // $monthly_payment_1 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month1))) / ((pow(1 + $monthly_rate, $month1)) - 1);
                                                            // $monthly_payment_2 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month2))) / ((pow(1 + $monthly_rate, $month2)) - 1);
                                                            // $monthly_payment_3 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month3))) / ((pow(1 + $monthly_rate, $month3)) - 1);
                                                            // $monthly_payment_4 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month4))) / ((pow(1 + $monthly_rate, $month4)) - 1);

                                                            $factor_rate_5_years = 0.0198012;
                                                            $factor_rate_10_years = 0.01161085;
                                                            $factor_rate_15_years = 0.00898828;
                                                            $factor_rate_20_years = 0.00775299;

                                                            // Calculate Amount and Income Requirement for each term
                                                            $amount_5_years = $factor_rate_5_years * $selling_price;
                                                            $income_requirement_5_years = $factor_rate_5_years * $selling_price * 3;

                                                            $amount_10_years = $factor_rate_10_years * $selling_price;
                                                            $income_requirement_10_years = $factor_rate_10_years * $selling_price * 3;

                                                            $amount_15_years = $factor_rate_15_years * $selling_price;
                                                            $income_requirement_15_years = $factor_rate_15_years * $selling_price * 3;

                                                            $amount_20_years = $factor_rate_20_years * $selling_price;
                                                            $income_requirement_20_years = $factor_rate_20_years * $selling_price * 3;
                                                            
                                                        ?>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Term</th>
                                                                    <th scope="col">Interst Rate</th>
                                                                    <th scope="col">Factor Rate</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Income Requirement</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th>5</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.01980120</td>
                                                                    <td>P <?php echo number_format($amount_5_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_5_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>10</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.01161085</td>
                                                                    <td>P <?php echo number_format($amount_10_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_10_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>15</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.00898828</td>
                                                                    <td>P <?php echo number_format($amount_15_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_15_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>20</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.00775299</td>
                                                                    <td>P <?php echo number_format($amount_20_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_20_years, 2, '.',',') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    
                                                        <!-- <p>Fixed for five (3) years. Computation for Interest rate is at 7% fixed for five (3) years only</p>
                                                        <p>A. Prices are subject to change without prior notice.</p>
                                                        <p>B. Bank Fees rates may vary per bank.</p> -->
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                        ?>
                                              <div class="text-left text-md-right">
                                            <span><a href="" class="text-warning" data-toggle="modal" data-target="#computation<?php echo $_GET['pid']; ?>">Show computation</a></span>
                                            <br>
                                            <label for="">Price</label>
                                        </div>
                                        
                                        <!-- Modal Default Computation -->
                                        <div class="modal fade" id="computation<?php echo $_GET['pid']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Computation for <?php echo $row['1'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php 
                                                            $compute = $row['13'] * 0.10;
                                                            $disc1 = $row['13'] * 0.05;
                                                            $disc2 = $row['13'] * 0.10;
                                                            $disc3 = $row['13'] * 0.15;
                                                            $disc4 = $row['13'] * 0.20;
                                                            $net = $row['13'] - 20000;
                                                            $price = number_format($row['13'], 2, '.', ',');
                                                            $dp = number_format($compute, 2, '.', ',');
                                                            $net_equity = number_format($net, 2, '.', ',')
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <h5>Reservation Fee :</h5>
                                                                <ul>
                                                                    <li>Equity Down payment 10% of <b>P <?php echo $price ?></b></li>
                                                                    <li>Less Reservation fee: <b>P 20,000</b> </li>
                                                                    <li>Net Equity Payment: <b>P <?php echo $net_equity ?></b> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <h5>Discounts:</h5>
                                                                <p><span class="text-danger">*</span> Note: 5% - 20% are default in the system it may change if the agent provide a new discount.</p>
                                                                <b>Computed downpayments are based on discounts.</b>
                                                                <ul>
                                                                    <li>- 5% Less = <b>P <?php echo number_format($disc1, 2, '.', ',') ?></b></li>
                                                                    <li>- 10% Less = <b>P <?php echo number_format($disc2, 2, '.', ',') ?></b></li>
                                                                    <li>- 15% Less = <b>P <?php echo number_format($disc3, 2, '.', ',') ?></b></li>
                                                                    <li>- 20% Less = <b>P <?php echo number_format($disc4, 2, '.', ',') ?></b></li>
                                                                </ul>
                                                        
                                                            </div>
                                                        </div>
                                                        <h5>Estimated Monthly Amortization:</h5>
                                                        <p>(Based only on Net Equity)</p>
                                                        <?php 
                                                            $selling_price = $net;
                                                            // $monthly_rate = 0.07 / 12 / 100;
                                                            // $month1 = 60 * 12;
                                                            // $month2 = 120 * 12;
                                                            // $month3 = 180 * 12;
                                                            // $month4 = 240 * 12;
                                                            
                                                            // $monthly_payment_1 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month1))) / ((pow(1 + $monthly_rate, $month1)) - 1);
                                                            // $monthly_payment_2 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month2))) / ((pow(1 + $monthly_rate, $month2)) - 1);
                                                            // $monthly_payment_3 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month3))) / ((pow(1 + $monthly_rate, $month3)) - 1);
                                                            // $monthly_payment_4 = $selling_price * ($monthly_rate * (pow(1 + $monthly_rate, $month4))) / ((pow(1 + $monthly_rate, $month4)) - 1);

                                                            $factor_rate_5_years = 0.0198012;
                                                            $factor_rate_10_years = 0.01161085;
                                                            $factor_rate_15_years = 0.00898828;
                                                            $factor_rate_20_years = 0.00775299;

                                                            // Calculate Amount and Income Requirement for each term
                                                            $amount_5_years = $factor_rate_5_years * $selling_price;
                                                            $income_requirement_5_years = $factor_rate_5_years * $selling_price * 3;

                                                            $amount_10_years = $factor_rate_10_years * $selling_price;
                                                            $income_requirement_10_years = $factor_rate_10_years * $selling_price * 3;

                                                            $amount_15_years = $factor_rate_15_years * $selling_price;
                                                            $income_requirement_15_years = $factor_rate_15_years * $selling_price * 3;

                                                            $amount_20_years = $factor_rate_20_years * $selling_price;
                                                            $income_requirement_20_years = $factor_rate_20_years * $selling_price * 3;
                                                            
                                                        ?>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Term</th>
                                                                    <th scope="col">Interst Rate</th>
                                                                    <th scope="col">Factor Rate</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Income Requirement</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th>5</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.01980120</td>
                                                                    <td>P <?php echo number_format($amount_5_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_5_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>10</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.01161085</td>
                                                                    <td>P <?php echo number_format($amount_10_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_10_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>15</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.00898828</td>
                                                                    <td>P <?php echo number_format($amount_15_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_15_years, 2, '.',',') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>20</th>
                                                                    <td>7.0%</td>
                                                                    <td>0.00775299</td>
                                                                    <td>P <?php echo number_format($amount_20_years, 2, '.', ',') ?></td>
                                                                    <td>P <?php echo number_format($income_requirement_20_years, 2, '.',',') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    
                                                        <!-- <p>Fixed for five (3) years. Computation for Interest rate is at 7% fixed for five (3) years only</p>
                                                        <p>A. Prices are subject to change without prior notice.</p>
                                                        <p>B. Bank Fees rates may vary per bank.</p> -->
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }} 
                                ?>

                       
                            </div>
                        </div>
                                
                        <div class="property-details">
                            <h4 class="text-secondary my-4">Description</h4>
                            <p><?php echo $row['2'];?></p>
                            
                            <h4 class="mt-5 mb-4 text-secondary">Property Summary</h4>
                            <div class="row">
                                <div class="col">
                                    <ul>
                                        <li>Region : <b><?php echo $row['14'];?></b> </li>
                                        <li>Province : <b><?php echo $row['15'];?></b> </li>
                                        <li>City : <b><?php echo $row['16'];?></b> </li>
                                        <li>Barangay : <b><?php echo $row['17'];?></b> </li>
                                    </ul>
                                    <hr>
                                    <ul>
                                        <li>Type : <b><?php echo $row['3'];?></b> </li>
                                        <li>Status : <b><?php echo $row['4'];?></b> </li>
                                      
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul>
                            
                                        <li><i class="fas fa-stream text-success"></i> Floors : <b><?php echo $row['11'];?></b> </li>
                                        <li><i class="fas fa-ruler-combined text-success"></i> Sqm: <b><?php echo $row['12'];?></b></li>
                                        <li><i class="fas fa-warehouse text-success"></i> Hall: <b><?php echo $row['10'];?></b></li>
                                        <li><i class="fas fa-bed text-success"></i> Bedroom: <b><?php echo $row['6'];?></b></li>
                                        <li><i class="fas fa-bath text-success"></i> Bathroom: <b><?php echo $row['7'];?></b></li>
                                        <li><i class="fas fa-door-open text-success"></i> Balcony: <b><?php echo $row['8'];?></b></li>
                                        <li><i class="fas fa-utensils text-success"></i> Kitchen: <b><?php echo $row['9'];?></b></li>
                                    </ul>
                                </div>
                            </div>
                         
                            <!-- <h5 class="mt-5 mb-4 text-secondary">Features</h5>
                            <div class="row">
								
                            </div>    -->
	
                            <h4 class="mt-5 mb-4 text-secondary">Images</h4>
                            <div class="accordion" id="accordionExample">
                                <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Floor Plans </button>
                                <div id="collapseOne" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <img src="admin/property/<?php echo $row['26'];?>" alt="Not Available"> </div>
                                <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Basement Floor</button>
                                <div id="collapseTwo" class="collapse p-4" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <img src="admin/property/<?php echo $row['27'];?>" alt="Not Available"> </div>
                                <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Ground Floor</button>
                                <div id="collapseThree" class="collapse p-4" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <img src="admin/property/<?php echo $row['28'];?>" alt="Not Available"> </div>
                            </div>

                            <!-- <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Agent</h5>
                            <div class="agent-contact pt-60">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-3"> <img src="admin/user/<?php echo $row['uimage']; ?>" alt="" height="200" width="170"> </div>
                                    <div class="col-sm-8 col-lg-9">
                                        <div class="agent-data text-ordinary mt-sm-20">
                                            <h6 class="text-success text-capitalize"><?php echo $row['uname'];?></h6>
                                            <ul class="mb-3">
                                                <li><?php echo $row['uphone'];?></li>
                                                <li><?php echo $row['uemail'];?></li>
                                            </ul>
                                            
                                            <div class="mt-3 text-secondary hover-text-success">
                                                <ul>
                                                    <li class="float-left mr-3"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li class="float-left mr-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li class="float-left mr-3"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    <li class="float-left mr-3"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                    <li class="float-left mr-3"><a href="#"><i class="fas fa-rss"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
       
                                </div>
                            </div> -->
                        </div>
                    </div>
					
					<?php } ?>
					
                    <div class="col-lg-4">
                        <!-- <h4 class="double-down-line-left text-secondary position-relative pb-4 my-4">Instalment Calculator</h4>
                        <form class="d-inline-block w-100" action="calc.php" method="post">
                            <label class="sr-only">Property Amount</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Php</div>
                                </div>
                                <input type="text" class="form-control" name="amount" placeholder="Property Price">
                            </div>
                            <label class="sr-only">Month</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                                <input type="text" class="form-control" name="month" placeholder="Duration Month">
                            </div>
                            <label class="sr-only">Interest Rate</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                </div>
                                <input type="text" class="form-control" name="interest" placeholder="Interest Rate">
                            </div>
                            <button type="submit" value="submit" name="calc" class="btn btn-danger mt-4">Calclute Instalment</button>
                        </form> -->
                        <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Featured Property</h4>
                        <ul class="property_list_widget">
							
        
                            <?php 
								$query=mysqli_query($conn,"SELECT * FROM `property` WHERE feature='yes' ORDER BY date DESC LIMIT 7");
										while($row=mysqli_fetch_array($query))
										{
								?>
                                <li> <img src="admin/property/<?php echo $row['19'];?>" alt="pimage">
                                    <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['14'];?></span>
                                    
                                </li>
                            <?php } ?>
            

                        </ul>

                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                            <ul class="property_list_widget">
							
                                <?php 
								$query=mysqli_query($conn,"SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
										while($row=mysqli_fetch_array($query))
										{
								?>
                                <li> <img src="admin/property/<?php echo $row['19'];?>" alt="pimage">
                                    <h6 class="text-secondary hover-text-primary text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-primary icon-small"></i> <?php echo $row['14'];?></span>
                                    
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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