<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

///search code
	
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
<meta name="description" content="Homex template">
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
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property Grid</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Property Grid</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
        
        <!--	Property Grid
		===============================================================-->
        <div class="full-row">
            <div class="container">
                <div class="row">
				
					<div class="col-lg-8">
                        <div class="row">
						
							<?php 
							
							if(isset($_REQUEST['filter']))
							{
								$type=$_REQUEST['type'];
								$stype=$_REQUEST['stype'];
								$city=$_REQUEST['city'];
								$sql = "SELECT * FROM property WHERE ((type = '{$type}' AND stype = '{$stype}') OR city = '{$city}' OR region = '{$city}' OR province = '{$city}' OR barangay = '{$city}') AND is_approved = 1";
								//SELECT * FROM `property` WHERE type='office' or type='office' and stype='sale' or stype='rent' and city='valsad' OR state='mumbai'
								//SELECT * FROM `property` WHERE type='office' and stype='sale'  and city='valsad' OR state='mumbai'
								$result=mysqli_query($conn,$sql);
							
								if(mysqli_num_rows($result)>0)
								{
									if($result == true)
									{
										while($row=mysqli_fetch_array($result))
										{
							?>
									
                            <div class="col-md-6">
                                <div class="featured-thumb hover-zoomer mb-4">
                                    <div class="overlay-black overflow-hidden position-relative"> <img src="admin/property/<?php echo $row['19'];?>" alt="pimage">
                                        <!-- <div class="featured bg-success text-white">New</div> -->
                                        <div class="sale bg-success text-white text-capitalize">For <?php echo $row['5'];?></div>
                                        <div class="price text-primary"><b>₱<?php echo $formattedNumber = number_format($row['price'], 2, '.', ',');;?> </b><span class="text-white"><?php echo $row['12'];?> Sqft</span></div>
                                    </div>          
                                    <div class="featured-thumb-data shadow-one">
                                        <div class="p-3">
                                            <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h5>
                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> <?php echo $row['14'];?></span> </div>
                                        <div class="bg-gray quantity px-4 pt-4">
                                            <ul>
                                                <li><span><?php echo $row['12'];?></span> Sqft</li>
                                                <li><span><?php echo $row['6'];?></span> Beds</li>
                                                <li><span><?php echo $row['7'];?></span> Baths</li>
                                                <li><span><?php echo $row['9'];?></span> Kitchen</li>
                                                <li><span><?php echo $row['8'];?></span> Balcony</li>
                                                
                                            </ul>
                                        </div>
                                        <div class="p-4 d-inline-block w-100">
                                            <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : <?php echo $row['useragent'];?></div>
                                            <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> <?php echo date('d-m-Y', strtotime($row['date']));?></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 		
										} 
					
									}
								}
								else {
									
									echo "<h1 class='mb-5'><center>No Property Available</center></h1>";
								}
									
							}

							?>
                            
                        </div>
                    </div>
					
                    <div class="col-lg-4">
      
                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Featured Property</h4>
                            <ul class="property_list_widget">
                                

                                <?php 
                                    $query=mysqli_query($conn,"SELECT * FROM `property` WHERE feature='yes' AND is_approved = true ORDER BY date DESC LIMIT 7");
                                            while($row=mysqli_fetch_array($query))
                                            {
                                    ?>
                                    <li> <img src="admin/property/<?php echo $row['19'];?>" alt="pimage">
                                        <h6 class="text-secondary hover-text-success text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                        <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['14'];?></span>
                                        
                                    </li>
                                <?php } ?>


                            </ul>

                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recent Property Add</h4>
                            <ul class="property_list_widget">
                            
                                <?php 
                                $query=mysqli_query($conn,"SELECT * FROM `property` where is_approved = true ORDER BY date DESC LIMIT 6");
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
</body>

</html>