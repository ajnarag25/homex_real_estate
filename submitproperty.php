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
	date_default_timezone_set('Asia/Manila');
	$currentDate = date('Y-m-d');

	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$pstatus = $_POST['pstatus'];
	// $bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	// $loc=$_POST['loc'];
	$region=$_POST['region'];
	$province=$_POST['province'];
	$barangay=$_POST['barangay'];
	// $uid=$_POST['uid'];
	$feature=$_POST['pfeature'];
	$floorarea = $_POST['floorarea'];
	// $status=$_POST['status'];

	// $totalfloor=$_POST['totalfl'];
	
    $aimage = $_FILES['aimage']['name'];
    $aimage2 = $_FILES['aimage2']['name'];
    $aimage4 = $_FILES['aimage4']['name'];
    $fimage1 = $_FILES['fimage1']['name'];
    $aimage1 = $_FILES['aimage1']['name'];
    $aimage3 = $_FILES['aimage3']['name'];
    $fimage = $_FILES['fimage']['name'];
    $fimage2 = $_FILES['fimage2']['name'];

    move_uploaded_file($_FILES['aimage']['tmp_name'], "admin/property/$aimage");
    move_uploaded_file($_FILES['aimage1']['tmp_name'], "admin/property/$aimage1");
    move_uploaded_file($_FILES['aimage2']['tmp_name'], "admin/property/$aimage2");
    move_uploaded_file($_FILES['aimage3']['tmp_name'], "admin/property/$aimage3");
    move_uploaded_file($_FILES['aimage4']['tmp_name'], "admin/property/$aimage4");

    move_uploaded_file($_FILES['fimage']['tmp_name'], "admin/property/$fimage");
    move_uploaded_file($_FILES['fimage1']['tmp_name'], "admin/property/$fimage1");
    move_uploaded_file($_FILES['fimage2']['tmp_name'], "admin/property/$fimage2");

	$user_agent = $_SESSION['get_data']['fname'].' '.$_SESSION['get_data']['lname'];
	$user_id = $_SESSION['get_data']['uid'];
	$user_type = 'agent';
	$sql="insert into property (title,pcontent,type,pstatus,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,region,province,city,barangay,feature,pimage,pimage1,pimage2,pimage3,pimage4,mapimage,topmapimage,groundmapimage,date,useragent,user_type,user_id, floorarea)
	values('$title','$content','$ptype','$pstatus','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price','$region',
	'$province','$city','$barangay','$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$fimage','$fimage1','$fimage2','$currentDate','$user_agent','$user_type','$user_id', $floorarea)";
	$result=mysqli_query($conn,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
}					
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!--  meta tags -->
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
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Submit Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Submit Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Submit Property</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								<div class="description">
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
											<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Property Details</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title"  placeholder="Enter Title">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Property Type</label>
													<div class="col-lg-9">
														<select class="form-control"  name="ptype">
															<option value="">Select Type</option>
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
															<option value="">Select Status</option>
															<option value="rent">Rent</option>
															<option value="sale">Sale</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Make it Featured</label>
													<div class="col-lg-9">
														<select class="form-control"  name="pfeature">
															<option value="">Select</option>
															<option value="yes">Yes</option>
															<option value="no">No</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bath"  placeholder="Enter Bathroom (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc"  placeholder="Enter Kitchen (only no 1 to 10)">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"  name="pstatus">
															<option value="">Select Property Status</option>
															<option value="new">New</option>
															<option value="pre-selling">Pre-Selling</option>
															<option value="pre-owned">Pre-Owned</option>
															<option value="rfor">Ready for Occupation - Refurbished</option>
															<option value="rfonr">Ready for Occupation - Not Refurbished</option>
															
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bedroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bed"  placeholder="Enter Bedroom  (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc"  placeholder="Enter Balcony  (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hall</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="hall"  placeholder="Enter Hall  (only no 1 to 10)">
													</div>
												</div>
												
											</div>
										</div>
										<h4 class="card-title">Price & Location</h4>
										<div class="row">
											<div class="col-xl-6"><!--
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor</label>
													<div class="col-lg-9">
														<select class="form-control"  name="floor">
															<option value="">Select Floor</option>
															<option value="1st Floor">1st Floor</option>
															<option value="2nd Floor">2nd Floor</option>
															<option value="3rd Floor">3rd Floor</option>
															<option value="4th Floor">4th Floor</option>
															<option value="5th Floor">5th Floor</option>
														</select>
													</div>
												</div>-->
												<div>
													<table>
														<tr>
															<td>Region</td>
															<td><input type="text" class="form-control" id="setRegion" name="region"></td>
															<!-- <td><select id="region" value=>
															<option value="">---</option> 
															</select></td>
															<input type="hidden" id="setRegion" name="region"> -->
														</tr>
														<tr>
															<td>Province</td>
															<td><input type="text" class="form-control" id="setProvince" name="province"></td>
															<!-- <td><select id="province">
															<option value="">---</option> 
															</select></td>
															<input type="hidden" id="setProvince" name="province"> -->
														</tr>
														<tr>
															<td>City</td>
															<td><input type="text" class="form-control" id="setCity" name="city"></td>
															<!-- <td><select id="city"><option value="">---</option> 
															</select></td>
															<input type="hidden" id="setCity" name="city"> -->
														</tr>
														<tr>
															<td>Barangay</td>
															<td><input type="text" class="form-control" id="setBarangay" name="barangay"></td>
															<!-- <td><select id="barangay"><option value="">---</option> 
															</select></td>
															<input type="hidden" id="setBarangay" name="barangay"> -->
														</tr>
													</table>

												</div>
												</br>
												<div class="form-group row">	
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price"  placeholder="Enter Price">
													</div>
												</div>


					</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor</label>
													<div class="col-lg-9">
												    <input type="text" class="form-control" inputmode="decimal" min="0" step="any" name="floor">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor Area</label>
													<div class="col-lg-9">
												    <input type="text" class="form-control" inputmode="decimal" min="0" step="any" name="floorarea">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Lot Area</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize"  placeholder="Enter Lot Area (in sqrt)">
													</div>
												</div>
							
												<!-- <div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc"  placeholder="Enter Address">
													</div>
												</div> -->
												
											</div>
										</div>



										<h4 class="card-title">Image & Status</h4>
										<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file"> <!---->
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file"> <!---->
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file"> <!---->
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" >
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" >
													</div>
												</div>
												<!-- <div class="form-group row">
													<label class="col-lg-3 col-form-label">User ID</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="uid"  placeholder="Enter User Id (only number)">
													</div>
												</div> -->
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>
											</div>
										</div>

										
											<input type="submit" value="Submit" class="btn btn-primary"name="add" style="margin-left:200px;">
										
								</div>
								</form>
							</div>
						</div>
					</div>
				
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
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