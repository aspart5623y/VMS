<?php

    if (isset($_POST['delete_record'])) {

        $id = mysqli_real_escape_string($conn, $_POST['record_id']);
        $sql = "DELETE FROM record WHERE ID = $id";
        if(mysqli_query($conn, $sql)){
            header('Location: ./check-record.php');
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

?>