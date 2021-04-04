<?php

    if (isset($_POST['delete_vehicle'])) {

        $id = mysqli_real_escape_string($conn, $_POST['bus_id']);
        $sql = "DELETE FROM users WHERE ID = $id";
        if(mysqli_query($conn, $sql)){
            header('Location: ./manage-vehicles.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

?>