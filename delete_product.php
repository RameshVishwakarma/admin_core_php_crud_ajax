<?php
include_once("conn.php");
session_start();

$prod_id = $_REQUEST['id'];

$sql ="UPDATE `product` set `isDeleted`='1' WHERE id='".$prod_id."' ";
$result = $conn->query($sql);

header("Location: dashboard.php");
?>