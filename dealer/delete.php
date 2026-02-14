<?php
include '../connection.php';

$delete = $_GET['id'];
$sql = "DELETE FROM `employees` WHERE  id=$delete ";
$RUN_QUERY = mysqli_query($conn, $sql);
header("location:index.php");
?>