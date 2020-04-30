<?php
include_once("conn.php");
session_start();

date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d");

$name = $_REQUEST['cat_name'];

if(!(empty($_FILES['image']['name'])))
{
	$pname = $_FILES['image']['name'];
	$src = $_FILES['image']['tmp_name'];
	$cat_img = time().$pname;
	$dest ="store_image/".$cat_img;
	move_uploaded_file($src,$dest);
}

$sql = "INSERT INTO `category`(`name`, `image`, `created_at`, `isDeleted`) VALUES ('$name',
'$cat_img','$today',0)";

if($conn->query($sql))
{
	echo 1;
}
?>