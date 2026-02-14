<?php
include '../connection.php';

$delete = $_GET['id'];
$sql = "DELETE FROM `users` WHERE  id=$delete ";
$RUN_QUERY = mysqli_query($conn, $sql);
header("location:useradmin.php");
?>