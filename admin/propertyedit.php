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
if(isset($_POST['add'])) {
    $pid = $_REQUEST['id'];
    
    // Retrieve other form inputs
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
    $uid = $_POST['uid'];
	$floorarea = $_POST['floorarea'];
    
    // Check if new images are uploaded
    $aimage = $_FILES['aimage']['name'] ? $_FILES['aimage']['name'] : '';
    $aimage1 = $_FILES['aimage1']['name'] ? $_FILES['aimage1']['name'] : '';
    $aimage2 = $_FILES['aimage2']['name'] ? $_FILES['aimage2']['name'] : '';
    $aimage3 = $_FILES['aimage3']['name'] ? $_FILES['aimage3']['name'] : '';
    $aimage4 = $_FILES['aimage4']['name'] ? $_FILES['aimage4']['name'] : '';
    $fimage = $_FILES['fimage']['name'] ? $_FILES['fimage']['name'] : '';
    $fimage1 = $_FILES['fimage1']['name'] ? $_FILES['fimage1']['name'] : '';
    $fimage2 = $_FILES['fimage2']['name'] ? $_FILES['fimage2']['name'] : '';

    // Move uploaded files
    if($aimage) move_uploaded_file($_FILES['aimage']['tmp_name'], "property/$aimage");
    if($aimage1) move_uploaded_file($_FILES['aimage1']['tmp_name'], "property/$aimage1");
    if($aimage2) move_uploaded_file($_FILES['aimage2']['tmp_name'], "property/$aimage2");
    if($aimage3) move_uploaded_file($_FILES['aimage3']['tmp_name'], "property/$aimage3");
    if($aimage4) move_uploaded_file($_FILES['aimage4']['tmp_name'], "property/$aimage4");
    if($fimage) move_uploaded_file($_FILES['fimage']['tmp_name'], "property/$fimage");
    if($fimage1) move_uploaded_file($_FILES['fimage1']['tmp_name'], "property/$fimage1");
    if($fimage2) move_uploaded_file($_FILES['fimage2']['tmp_name'], "property/$fimage2");

    // Prepare SQL query
    $sql = "UPDATE property SET title='{$title}', pcontent='{$content}', pstatus='{$pstatus}', type='{$ptype}', stype='{$stype}',
            bedroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', hall='{$hall}', floor='{$floor}', 
            size='{$asize}', price='{$price}', region='{$region}', city='{$city}', province='{$province}', 
            uid='{$uid}', status='{$status}', floorarea='{$floorarea}'";
    
    // Append image fields if they have values
    if($aimage) $sql .= ", pimage='{$aimage}'";
    if($aimage1) $sql .= ", pimage1='{$aimage1}'";
    if($aimage2) $sql .= ", pimage2='{$aimage2}'";
    if($aimage3) $sql .= ", pimage3='{$aimage3}'";
    if($aimage4) $sql .= ", pimage4='{$aimage4}'";
    if($fimage) $sql .= ", mapimage='{$fimage}'";
    if($fimage1) $sql .= ", topmapimage='{$fimage1}'";
    if($fimage2) $sql .= ", groundmapimage='{$fimage2}'";
    
    // Complete the SQL query
    $sql .= " WHERE pid={$pid}";

    // Execute SQL query
    $result = mysqli_query($conn, $sql);

    // Redirect based on query result
    if($result) {
        $msg = "<p class='alert alert-success'>Property Updated</p>";
        header("Location: propertyview.php?msg=$msg");
        exit();
    } else {
        $msg = "<p class='alert alert-warning'>Property Not Updated</p>";
        header("Location: propertyview.php?msg=$msg");
        exit();
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
							<h4 class="card-title">Update Property Details</h4>
						</div>
						<form method="post" enctype="multipart/form-data">
						<div class="card-body">
							<h5 class="card-title">Property Detail</h5>
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
													<option value="<?php echo $row['3'] ?>" selected></option>
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
													<option value="<?php echo $row['5'] ?>" selected></option>
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
													<option value="<?php echo $row['4'] ?>" selected></option>
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
													<label class="col-lg-3 col-form-label">Floor Area</label>
													<div class="col-lg-9">
												    <input type="text" class="form-control" inputmode="numeric" min=0 name="floorarea" value="<?php echo $row['37'] ?>">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Lot Area</label>
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

								<h4 class="card-title">Images</h4>
								<div class="row">
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file">
														<img src="property/<?php echo $row['19'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file">
														<img src="property/<?php echo $row['21'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file">
														<img src="property/<?php echo $row['23'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
														<img src="property/<?php echo $row['27'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file">
														<img src="property/<?php echo $row['20'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file">
														<img src="property/<?php echo $row['22'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
														<img src="property/<?php echo $row['26'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
														<img src="property/<?php echo $row['28'];?>" alt="pimage" height="150" width="180">
													</div>
												</div>
											</div>
										</div>

								
									<input type="submit" value="Submit" class="btn btn-primary"name="add" style="margin-left:200px;">
								
						</div>
						</form>
					</div>
					<?php } ?>
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

				

	</body>

</html>