<?php

    // connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'vms');

    // check connection
    if(!$conn){
        echo 'Connection Error: ' . mysqli_connect_error();
    }


?>