<?php
include 'connection.php';
$userTABLE= "CREATE TABLE Users(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(200) NOT NULL,
    Pass VARCHAR(100) NOT NULL,
    RoleID INT(20) NOT NULL,
    FName VARCHAR(100) NOT NULL,
    LName VARCHAR(100) NOT NULL                                                      




)";
if(mysqli_query($conn, $userTABLE)){
        echo "Table created successfully";
    }



?>