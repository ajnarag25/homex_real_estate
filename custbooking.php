<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}								
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
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
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Schedule Details</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Schedule Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Schedule Details</h2>
							<?php 
								if(isset($_GET['msg']))	
								echo $_GET['msg'];	
							?>
                        </div>
					</div>
                    
					<table class="items-list table-responsive" style="border-collapse:inherit;" id="history">
                        <thead>
                             <tr  class="bg-primary">
                                <!-- <th class="text-white font-weight-bolder">Properties</th>
                                <th class="text-white font-weight-bolder">BHK</th>
                                <th class="text-white font-weight-bolder">Reason</th>
                                <th class="text-white font-weight-bolder">Added Date</th>
								<th class="text-white font-weight-bolder">Status</th>
                                <th class="text-white font-weight-bolder">Update</th>
								<th class="text-white font-weight-bolder">Delete</th> -->
                                <th class="text-white font-weight-bolder">Property Title</th>
                                <th class="text-white font-weight-bolder">Customer Name</th>
                                <th class="text-white font-weight-bolder">Property Type</th>
                                <!-- <th class="text-white font-weight-bolder">Property Status</th> -->
                                <th class="text-white font-weight-bolder">Sale Type</th>
                                <th class="text-white font-weight-bolder">Property Price</th>
                                <th class="text-white font-weight-bolder">Date Schedule</th>
                                <th class="text-white font-weight-bolder">Time Schedule</th>
                                <th class="text-white font-weight-bolder">Action</th>
                             </tr>
                        </thead>
                        <tbody>
						
							<?php 
							$uid=$_SESSION['get_data']['uid'];
                            $query = "SELECT p.*, s.* FROM property AS p
                            INNER JOIN sched_book AS s ON p.pid = s.property_id WHERE admin_agent_id = '$uid'
                            ";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
							?>
                            <tr>
                                <td class="text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['property_id'];?>"><?php echo $row['title'];?></a></td>	
                                <td class="text-capitalize"><?php echo $row['username'];?></td>				
                                <td class="text-capitalize"><?php echo $row['type'];?></td>
                                <!-- <td class="text-capitalize">For <?php echo $row['pstatus'];?></td> -->
                                <td class="text-capitalize">For <?php echo $row['stype'];?></td>
                                <td class="text-capitalize">
                                    P<?php
                                        $formattedNumber = number_format($row['price'], 2, '.', ',');
                                        echo $formattedNumber;
                                    ?>
                                </td>
                                <td class="text-capitalize"><?php echo $row['date_sched'];?></td>
								<td class="text-capitalize">
                                    <?php 
                                        $time_sched = $row['time_sched'];
                                        $time = DateTime::createFromFormat('H:i:s', $time_sched);
                                        $formatted_time = $time->format('h:i A');
                                        
                                        echo $formatted_time;
                                    ?>
                                </td>
                                <td class="text-capitalize">
                                    <!-- <button class="btn btn-secondary w-100" data-toggle="modal" data-target="#view<?php echo $row['id']; ?>">View</button> -->
                                    <button class="btn btn-primary w-100" data-toggle="modal" data-target="#compose<?php echo $row['id']; ?>">Compose</button>
                                    <!-- <button class="btn btn-success w-100" data-toggle="modal" data-target="#complete<?php echo $row['id']; ?>">Mark as Complete</button> -->
                                </td>
                            </tr>

                            <div class="modal fade" id="complete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Mark as Complete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="functions.php" method="post">
                                            <div class="modal-body text-center">
                                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                <h4>Are you sure to mark as complete this user booking?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="mark_complete" class="btn btn-success">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="compose<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Compose Message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <div class="modal-body">
                                        <form action="functions.php" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                                <?php
                                                    if($row['message'] == ''){
                                                        ?>
                                                        <textarea class="form-control" placeholder="Enter your message here..." name="msg" id="" cols="5" rows="3" required></textarea>
                                                    <?php
                                                    }else{
                                                        ?>
                                                        <label for="">Message of Buyer:</label>
                                                        <textarea class="form-control" name="msg" id="" cols="5" rows="3" readonly><?php echo $row['reply'] ?></textarea>
                                                        <hr>
                                                        <textarea class="form-control" placeholder="Enter your message here..." name="msg" id="" cols="5" rows="3" required></textarea>
                                                    <?php
                                                    }
                                                ?>
                                                
                                            </div>
                                      
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="agent_msg_booking">Send Message</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            

							<?php } ?>
							
                        </tbody>
                    </table>            
            </div>
        </div>
	<!--	Submit property   -->
        
        
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $('#history').DataTable()
</script>
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