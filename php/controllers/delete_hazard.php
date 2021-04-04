<?php

    if (isset($_POST['delete_hazard'])) {

        $id = mysqli_real_escape_string($conn, $_POST['hazard_id']);
        $sql = "DELETE FROM hazard WHERE ID = $id";
        if(mysqli_query($conn, $sql)){
            header('Location: ./update-hazard.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

?>