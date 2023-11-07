<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location:index.php");
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
	$uid=$_POST['uid'];
	$feature=$_POST['pfeature'];
	$status=$_POST['status'];

	// $totalfloor=$_POST['totalfl'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"property/$aimage");
	move_uploaded_file($temp_name1,"property/$aimage1");
	move_uploaded_file($temp_name2,"property/$aimage2");
	move_uploaded_file($temp_name3,"property/$aimage3");
	move_uploaded_file($temp_name4,"property/$aimage4");
	
	move_uploaded_file($temp_name5,"property/$fimage");
	move_uploaded_file($temp_name6,"property/$fimage1");
	move_uploaded_file($temp_name7,"property/$fimage2");
	
	$sql="insert into property (title,pcontent,type,pstatus,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,region,province,city,barangay,feature,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,date)
	values('$title','$content','$ptype','$pstatus','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price','$region',
	'$province','$city','$barangay','$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$currentDate')";
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
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		
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
								<h3 class="page-title">Property</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Property</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Property Details</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
									<h5 class="card-title">Property Detail</h5>
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
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
															<option value="rfo">Ready for Occupation</option>
															
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
															<td><select id="region" value=>
															<option value="">---</option> 
															</select></td>
															<input type="hidden" id="setRegion" name="region">
														</tr>
														<tr>
															<td>Province</td>
															<td><select id="province">
															<option value="">---</option> 
															</select></td>
															<input type="hidden" id="setProvince" name="province">
														</tr>
														<tr>
															<td>City</td>
															<td><select id="city"><option value="">---</option> 
															</select></td>
															<input type="hidden" id="setCity" name="city">
														</tr>
														<tr>
															<td>Barangay</td>
															<td><select id="barangay"><option value="">---</option> 
															</select></td>
															<input type="hidden" id="setBarangay" name="barangay">
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
												    <input type="number" inputmode="numeric" min=0 name="floor">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize"  placeholder="Enter Area Size (in sqrt)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc"  placeholder="Enter Address">
													</div>
												</div>
												
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
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"   name="status">
															<option value="">Select Status</option>
															<option value="available">Available</option>
															<option value="sold out">Sold Out</option>
															<option value="sold out">Lease</option>
														</select>
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
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">User ID</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="uid"  placeholder="Enter User Id (only number)">
													</div>
												</div>
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
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.1.js"></script>
        <script type="text/javascript">
       		var my_handlers = {

				fill_provinces:  function(){

					var region_code = $(this).val();
					$('#province').ph_locations('fetch_list', [{"region_code": region_code}]);
					
				},

				fill_cities: function(){

					var province_code = $(this).val();
					$('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
				},


				fill_barangays: function(){

					var city_code = $(this).val();
					$('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
				}
			};

			$(function () {
				$('#region').on('change', function () {
					var region_text = $('#region option:selected').text();
					console.log('Region: ' + region_text);
					$('#setRegion').val(region_text);
					my_handlers.fill_provinces.call(this);
				});

				$('#province').on('change', function () {
					var province_text = $('#province option:selected').text();
					console.log('Province: ' + province_text);
					$('#setProvince').val(province_text);
					my_handlers.fill_cities.call(this);
				});

				$('#city').on('change', function () {
					var city_text = $('#city option:selected').text();
					console.log('City: ' + city_text);
					$('#setCity').val(city_text);
					my_handlers.fill_barangays.call(this);
				});

				$('#barangay').on('change', function () {
					var barangay_text = $('#barangay option:selected').text();
					$('#setBarangay').val(barangay_text);
					console.log('Barangay: ' + $('#barangay option:selected').text());
				});

				$('#region').ph_locations({ 'location_type': 'regions' });
				$('#province').ph_locations({ 'location_type': 'provinces' });
				$('#city').ph_locations({ 'location_type': 'cities' });
				$('#barangay').ph_locations({ 'location_type': 'barangays' });

				$('#region').ph_locations('fetch_list');
			});


        </script>
						
		
    </body>

</html>