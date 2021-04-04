<?php

    if (isset($_POST['delete_route'])) {

        $id = mysqli_real_escape_string($conn, $_POST['route_id']);
        $sql = "DELETE FROM routes WHERE ID = $id";
        if(mysqli_query($conn, $sql)){
            header('Location: ./update-routes.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

?>