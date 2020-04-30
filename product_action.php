<?php
include_once("conn.php");
session_start();

date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d");

$cat_id = $_REQUEST['cat_name'];
$prod_name = $_REQUEST['prod_name'];

if(!(empty($_FILES['image']['name'])))
{
	$pname = $_FILES['image']['name'];
	$src = $_FILES['image']['tmp_name'];
	$prod_img = time().$pname;
	$dest ="store_image/".$prod_img;
	move_uploaded_file($src,$dest);
}

$sql = "INSERT INTO `product`(`cat_id`, `name`, `image`, `created_at`, `isDeleted`) VALUES ('$cat_id','$prod_name','$prod_img','$today','0')";

if($conn->query($sql))
{
	echo 1;
}
?>