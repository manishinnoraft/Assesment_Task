<?php
class ParkingSystem {
   
function details_display()
{
include 'db.php';
$sql = "SELECT * FROM vehicles";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    
    echo "<table>
            <tr>
                <th>Slot number</th>
                <th>Vehicle number</th>
                <th>Entry Time</th>
                <th>Exit Time</th>
                <th>Status</th>
            </tr>";

  
    while ($row = mysqli_fetch_assoc($result)) {
        $slot_number = $row["slot_number"];
        $vehicle_number = $row["vehicle_number"];
        $time_of_entry = $row["entry_time"];
        $time_of_exit = $row["exit_time"];
        $status = $row["status"];

        echo "<tr>
                <td>$slot_number</td>
                <td>$vehicle_number</td>
                <td>$time_of_entry</td>
                <td>$time_of_exit</td>
                <td>$status</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No tickets found";
}

mysqli_close($conn);

}


function vehicle_seats()
{
include 'db.php';
    
$sqlquery3 = "SELECT COUNT(*) as count, vehicle_type FROM vehicle_details GROUP BY vehicle_type;";

                    if ($result = mysqli_query($connect, $sqlquery3)) {
                        while ($row = mysqli_fetch_array($result)) {  
                             $slots[$row["vehicle_type"]] = 100 - $row['count'];
                 }
                
mysqli_close($connect);
}
function delete_vehicle($vehicle_number)
{
    include 'db.php';
    $conn = mysqli_connect("localhost", "Manishvj02", "Manish123#", "VehicleSystem");
    $vehicle_number = $_POST['vehicle_number'];
    $sqlquery1 = "DELETE FROM vehicle_details WHERE vehicle_number='$vehicle_number';";
    if (mysqli_query($connect, $sqlquery1)) {
        echo '<script>alert("Data is Deleted from database")</script>';
    } else {
        echo "Deletion Error";
    }
  


}
}
}
