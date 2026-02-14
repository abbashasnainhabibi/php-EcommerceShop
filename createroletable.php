<?php
include 'connection.php';
$sql= "CREATE TABLE ROLE (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    RoleName VARCHAR(30) NOT NULL
    )";

    if(mysqli_query($conn, $sql)){
        echo "Success";
    }


?>