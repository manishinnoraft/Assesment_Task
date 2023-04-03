<?php
    $server = "localhost";
    $username = "Manishvj02";
    $password = "Manish123#";
    $database = "VehicleSystem";


    $connect = new mysqli($server, $username, $password, $database);
    if ($connect->connect_error) {
        echo "No conncection";
    } 

    

?>