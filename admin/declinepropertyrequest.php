<?php
include("config.php");
$pid = $_GET['id'];
$sql = "DELETE FROM PROPERTY WHERE pid = {$pid}";
$result = mysqli_query($conn, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Property Declined</p>";
	header("Location:propertyapprove.php?msg=$msg");
}

mysqli_close($conn);
?>