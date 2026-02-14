<?php
include '../connection.php';

$delete = $_GET['id'];
$sql = "DELETE FROM `order` WHERE  orderno=$delete ";
$RUN_QUERY = mysqli_query($conn, $sql);
header("location:adminorder.php");
?>