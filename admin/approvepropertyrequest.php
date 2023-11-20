<?php
include("config.php");
$pid = $_GET['id'];
$sql = "UPDATE PROPERTY SET is_approved=true WHERE pid = {$pid}";
$result = mysqli_query($conn, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Property Approved to Feature in Public</p>";
	header("Location:propertyapprove.php?msg=$msg");
}

mysqli_close($conn);
?>