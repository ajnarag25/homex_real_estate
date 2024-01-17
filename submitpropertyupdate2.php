<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

//// code insert
//// add code

$error="";
$msg="";
if(isset($_POST['add']))
{
    $pid = $_REQUEST['id'];
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $ptype = $_POST['ptype'];
    $stype = $_POST['stype'];
    $bath = $_POST['bath'];
    $kitc = $_POST['kitc'];
    $pstatus = $_POST['pstatus'];
    $bed = $_POST['bed'];
    $balc = $_POST['balc'];
    $hall = $_POST['hall'];
    $price = $_POST['price'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $floor = $_POST['floor'];
    $asize = $_POST['asize'];
    $status = $_POST['status'];
    // $uid = $_POST['uid'];
    $aimage = $_FILES['aimage']['name'];
    $aimage2 = $_FILES['aimage2']['name'];
    $aimage4 = $_FILES['aimage4']['name'];
    $fimage1 = $_FILES['fimage1']['name'];
    $aimage1 = $_FILES['aimage1']['name'];
    $aimage3 = $_FILES['aimage3']['name'];
    $fimage = $_FILES['fimage']['name'];
    $fimage2 = $_FILES['fimage2']['name'];

    move_uploaded_file($_FILES['aimage']['tmp_name'], "property/$aimage");
    move_uploaded_file($_FILES['aimage1']['tmp_name'], "property/$aimage1");
    move_uploaded_file($_FILES['aimage2']['tmp_name'], "property/$aimage2");
    move_uploaded_file($_FILES['aimage3']['tmp_name'], "property/$aimage3");
    move_uploaded_file($_FILES['aimage4']['tmp_name'], "property/$aimage4");

    move_uploaded_file($_FILES['fimage']['tmp_name'], "property/$fimage");
    move_uploaded_file($_FILES['fimage1']['tmp_name'], "property/$fimage1");
    move_uploaded_file($_FILES['fimage2']['tmp_name'], "property/$fimage2");

    $sql = "UPDATE property SET title= '{$title}', pcontent= '{$content}', type='{$ptype}', stype='{$stype}',
    bedroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', hall='{$hall}', floor='{$floor}', 
    size='{$asize}', price='{$price}', region='{$region}', city='{$city}', province='{$province}', 
    pimage='{$aimage}', pimage1='{$aimage1}', pimage2='{$aimage2}', pimage3='{$aimage3}', pimage4='{$aimage4}', 
	status='{$status}', mapimage='{$fimage}', topmapimage='{$fimage1}', groundmapimage='{$fimage2}', 
    totalfloor='{$floor}' WHERE pid = {$pid}";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        $_SESSION['status'] = 'Property Successfully Updated';
        $_SESSION['status_icon'] = 'success';
        header('location:feature.php');
    }
    else
    {
		$_SESSION['status'] = 'An Error Occured!';
        $_SESSION['status_icon'] = 'success';
        header('location:feature.php');
    }
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
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Update Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Update Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Update Property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Update Property</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
							<?php echo $error; ?>
							<?php echo $msg; ?>
	
								<?php
									
									$pid=$_REQUEST['id'];
									$query=mysqli_query($conn,"select * from property where pid='$pid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
												
												<div class="row">
									<div class="col-xl-12">
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Title</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="title" value="<?php echo $row['1'] ?>"  placeholder="Enter Title">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Content</label>
											<div class="col-lg-9">
												<textarea class="tinymce form-control" name="content" value="<?php echo $row['2'] ?>"  rows="10" cols="30"><?php echo $row['2'] ?></textarea>
											</div>
										</div>
										
									</div>
									<div class="col-xl-6">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Property Type</label>
											<div class="col-lg-9">
												<select class="form-control"  name="ptype">
													<option value="<?php echo $row['3'] ?>" selected><?php echo $row['3'] ?></option>
													<option value="bungalow">Bungalow</option>
													<option value="commercial">Commercial</option>
													<option value="condominium">Condominium</option>
													<option value="land-property">Land Property</option>
													<option value="lot">Lot</option>
													<option value="residential">Residential</option>
													<option value="row-house">Row House</option>
													<option value="single-detached">Single Detached</option>
													<option value="townhouse">Townhouse</option>

												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Selling Type</label>
											<div class="col-lg-9">
												<select class="form-control"  name="stype">
													<option value="<?php echo $row['5'] ?>" selected><?php echo $row['5'] ?></option>
													<option value="rent">Rent</option>
													<option value="sale">Sale</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Bathroom</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="bath" value="<?php echo $row['7'] ?>"  placeholder="Enter Bathroom (only no 1 to 10)">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Kitchen</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="kitc" value="<?php echo $row['9'] ?>"  placeholder="Enter Kitchen (only no 1 to 10)">
											</div>
										</div>
										
									</div>   
									<div class="col-xl-6">
										<div class="form-group row mb-3">
											<label class="col-lg-3 col-form-label">Status</label>
											<div class="col-lg-9">
												<select class="form-control"  name="pstatus">
													<option value="<?php echo $row['4'] ?>" selected><?php echo $row['4'] ?></option>
													<option value="new">New</option>
													<option value="pre-selling">Pre-Selling</option>
													<option value="pre-owned">Pre-Owned</option>
													<option value="rfo">Ready for Occupation</option>
													
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Bedroom</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="bed" value="<?php echo $row['6'] ?>" placeholder="Enter Bedroom  (only no 1 to 10)">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Balcony</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="balc" value="<?php echo $row['8'] ?>" placeholder="Enter Balcony  (only no 1 to 10)">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Hall</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="hall" value="<?php echo $row['10'] ?>" placeholder="Enter Hall  (only no 1 to 10)">
											</div>
										</div>
										
									</div>
								</div>
									<hr>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required value="<?php echo $row['13']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Region</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="region" required value="<?php echo $row['14']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Province</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="province" required value="<?php echo $row['15']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required value="<?php echo $row['16']; ?>">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
									
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Barangay</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="barangay" required value="<?php echo $row['17']; ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="floor" value="<?php echo $row['11'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required value="<?php echo $row['12']; ?>">
													</div>
												</div>
												<!-- <div class="form-group row">
													<label class="col-lg-3 col-form-label">Uid</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="uid" required value="<?php echo $row['24']; ?>">
													</div>
												</div> -->
												<!-- <div class="form-group row">
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Select Status</option>
															<option value="<?php echo $row['25'] ?>" selected><?php echo $row['25'] ?></option>
															<option value="available">Available</option>
															<option value="sold out">Sold Out</option>
														</select>
													</div>
												</div> -->
											</div>
										</div>
							<!--	
								<div class="form-group row">
									<label class="col-lg-2 col-form-label">Feature</label>
									<div class="col-lg-9">
									<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>
									
									<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
										
										<div class="col-md-4">
												<ul>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Property Age : </span>10 Years</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Swiming Pool : </span>Yes</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Parking : </span>Yes</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>
												</ul>
											</div>
											<div class="col-md-4">
												<ul>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Appartment</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Dining Capacity : </span>10 People</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Temple  : </span>Yes</li>
												
												</ul>
											</div>
											<div class="col-md-4">
												<ul>
												<li class="mb-3"><span class="text-secondary font-weight-bold">3rd Party : </span>No</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Alivator : </span>Yes</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>
												<li class="mb-3"><span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank</li>
												</ul>
											</div>
									
									</textarea>
									</div>
								</div>
	-->	

								<h4 class="card-title">Image & Status</h4>
								<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file">
														<img src="admin/property/<?php echo $row['19'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file">
														<img src="admin/property/<?php echo $row['20'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file">
														<img src="admin/property/<?php echo $row['21'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
														<img src="admin/property/<?php echo $row['26'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file">
														<img src="admin/property/<?php echo $row['19'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file">
														<img src="admin/property/<?php echo $row['21'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
														<img src="admin/property/<?php echo $row['26'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
														<img src="admin/property/<?php echo $row['27'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
											</div>
										</div>

								
									<input type="submit" value="Submit" class="btn btn-primary"name="add" style="margin-left:200px;">
								
						</div>
								
							<?php
								} 
							?>
                    </div>            
            </div>
        </div>
	<!--	Update Property   -->
        
        
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
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/tinymce/init-tinymce.min.js"></script>
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
</body>
</html>