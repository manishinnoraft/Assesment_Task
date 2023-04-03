<?php
include './database/config.php';
include './functions/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="./js/jquery.js"></script>
</head>

<body>
    <header>
        <h1>Vehicle Management System</h1>
    </header>

    <div>
        <section class="Availability_section">
            <table>
                <tr>
                    <th>Two Vehile Parking</th>
                    <th>Four Vehile Parking</th>
                </tr>
                <tr>
                    <?php $sqlquery3 = "SELECT COUNT(*) as count, vehicle_type FROM vehicle_details GROUP BY vehicle_type;";

                    if ($result = mysqli_query($connect, $sqlquery3)) {
                        while ($row = mysqli_fetch_array($result)) {  ?>
                            <td> <?php echo (100 - $row['count']) . "<br>"; ?></td>
                    <?php }
                    } else {
                        echo "Deletion Error";
                    }
                    ?>
                </tr>
            </table>
        </section>
        <section class="Vehicle_Action_Section">
            <button class="register_btn">Register a Vehicle</button>
            <button class="remove_btn">Remove a Vehicle</button>

            <form action="" method="post" id="register_form">
                Vehcile Type : <br><input type="radio" name="vehicle_type" value="2 Wheeler"><label>2 Wheeler</label><br><input type="radio" name="vehicle_type" value="4 Wheeler"><label for="html">4 Wheeler</label> <br>
                Vehicle Number : <input type="text" name="vehicle_number"> <br>
                Slot Number : <input type="number" name="slot_number"> <br>
                Time of Entry : <input type="text" name="entry_time"> <br>
                Time of Exit: <input type="text" name="exit_time"> <br>
                <input type="submit" value="Submit" name="submit">
            </form>

            <form action="" method="post" id="deletion_form">
                Vehicle Number : <input type="text" name="vehicle_number"> <br>
                <input type="submit" value="Remove" name="remove">
            </form>
        </section>

        <section class="Tickets_section">
            <h3>Tickets Section::</h3>
            <table>
                <thead>
                    <tr>
                        <th>Slot Number</th>
                        <th>Vehicle Number</th>
                        <th>Time of Entry</th>
                        <th>Time of Exit</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $query1 = "select * from vehicle_details";
                    $conn_query1 = mysqli_query($connect, $query1);

                    while ($result1 = mysqli_fetch_array($conn_query1)) {

                    ?>

                        <tr>
                            <td><?php echo $result1['slot_number']; ?></td>
                            <td><?php echo $result1['vehicle_number']; ?></td>
                            <td><?php echo $result1['exit_time']; ?></td>
                            <td><?php echo $result1['entry_time']; ?></td>
                            <td><?php echo $result1['status']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <section class="generate_ticket">
            <button class="Ticket_Generate_btn">Generate Ticket</button>
            <form action="" method="post">
                <input type="text" name=vehicle_number>
                <input type="submit" name="Generate_ticket" value="Submit">
            </form>
        </section>
    </div>
</body>

</html>


<?php

if (isset($_POST['submit'])) {
    $vehicle_type = $_POST['vehicle_type'];
    $vehicle_number = $_POST['vehicle_number'];
    $slot_number = $_POST['slot_number'];
    $entry_time = $_POST['entry_time'];
    $exit_time = $_POST['exit_time'];
    $status = "Booked";

    $sqlquery1 = "insert into vehicle_details values( $slot_number,'$vehicle_number','$entry_time','$exit_time','$status','$vehicle_type')";
    if (mysqli_query($connect, $sqlquery1)) {
        echo '<script>alert("Data is sent to database")</script>';
    } else {
    }
}


if (isset($_POST['remove'])) {
    $vehicle_number = $_POST['vehicle_number'];
    $sqlquery1 = "DELETE FROM vehicle_details WHERE vehicle_number='$vehicle_number';";
    if (mysqli_query($connect, $sqlquery1)) {
        echo '<script>alert("Data is Deleted from database")</script>';
    } else {
        echo "Deletion Error";
    }
}






?>