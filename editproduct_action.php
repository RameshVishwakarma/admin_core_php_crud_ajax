<?php
include_once("conn.php");
session_start();

date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d");

$hidden_prod_id = $_REQUEST['hidden_prod_id'];
$cat_id = $_REQUEST['cat_id'];
$prod_name = $_REQUEST['prod_name'];

$sql1 = "select `image` from product where id='".$hidden_prod_id."' ";
$result1 = $conn->query($sql1);
$hidden_img = $result1->fetch_assoc();

if(!(empty($_FILES['image']['name'])))
{
	$pname = $_FILES['image']['name'];
	$src = $_FILES['image']['tmp_name'];
	$prod_img = time().$pname;
	$dest ="store_image/".$prod_img;
	move_uploaded_file($src,$dest);
}
else
{
	$prod_img = $hidden_img['image'];
}

$sql = "UPDATE `product` SET `cat_id`='".$cat_id."',`name`='".$prod_name."',`image`='".$prod_img."',`created_at`='".$today."',`isDeleted`='0' WHERE id='".$hidden_prod_id."' ";

if($conn->query($sql))
{
	echo 1;
}
?>