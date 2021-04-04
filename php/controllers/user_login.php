<?php

    $error = "";
    $plate_number  = "";


    // This happens when user submits his login form
    if(isset($_POST['user_login'])) {
        // Gets the user plate number field
        $plate_number = $_POST['plate_number'];

        // checks if the plate bumber input is empty
        if(empty($plate_number)){
            // error message
            $error = "<i class=\"fas fa-exclamation-circle\"></i> Please enter a vehicle plate number";
        } else {
            if (filter_var($plate_number, FILTER_VALIDATE_EMAIL)) {
                $error = "<i class=\"fas fa-exclamation-circle\"></i> you entered an email &nbsp; - &nbsp; please enter a Bus plate number!";  
            }
        }

        


        if (empty($error)) {
            // check if plate number exists in database users table
            $sql = "SELECT * FROM users WHERE plate_number = '" . $plate_number . "' LIMIT 1";

            // gets the result of search
            $result = mysqli_query($conn, $sql);

            // if plate number exists do this!
            if(mysqli_num_rows($result) == 1) {
                // it starts a session
                session_start();
                // gets all vehicle information and feeds it into the session as an array
                $user_data = mysqli_fetch_array($result);
                $_SESSION = $user_data;
            
                // redirects to the home page
                header('Location: ./home.php');

                

                // if plate number does not exist do this!!
            } else {

                // check if plate number exists in database users table
                $checkNumber = "SELECT * FROM users WHERE plate_number = '" . $plate_number . "' LIMIT 1";


                // gets the result of search
                $numberResult = mysqli_query($conn, $checkNumber);

                // if plate number does not exist do this!
                if(mysqli_num_rows($numberResult) != 1) {
                    $error = "Plate number does not exist";
                }
            
            }

        }
        // end of empty error check

    } 

?>