<?php
include '../Model/VehicleParkingFunction.php';

$obj=new ParkingLotModel();
if (isset($_POST["remove_btn"])) {
    $vehicle_number = $_POST["vehicle_number"];
}
?>