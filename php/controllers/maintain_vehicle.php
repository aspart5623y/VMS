<?php

    if (isset($_POST['maintain_vehicle'])) {

        $bus_id = mysqli_real_escape_string($conn, $_POST['bus_id']);
        $bus_plate = mysqli_real_escape_string($conn, $_POST['bus_plate']);
        $status = '100';
        $started = '<i class="fas fa-check-double"></i> &nbsp; Your vehicle has been maintained';
        $date = date("D d M, Y"); 
        $time = date("h:ia");
        $sql = "UPDATE users SET status = '$status' WHERE id = '$bus_id'";
        $record = "INSERT INTO record(plate_number, started, status, date, time) VALUES ('$bus_plate', '$started', '$status', '$date', '$time')";
        if(mysqli_query($conn, $sql)){
            if(mysqli_query($conn, $record)){
                header('Location: ./manage-vehicles.php');
            }
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

?>