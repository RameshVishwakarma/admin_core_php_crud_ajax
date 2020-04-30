<?php
session_start();
include_once("conn.php");

date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d");

$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);

$sql = "SELECT * FROM `admin` WHERE `username`='$username' and password='$password' and role_id='1' ";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
	$_SESSION['admin_username'] = $username;
	$_SESSION['role_id'] = 1;

	echo 1;
}
?>