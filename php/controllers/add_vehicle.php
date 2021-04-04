<?php

    $errors = ['plate_number' => '', 'fleet_number' => ''];
    $plate_number = $fleet_number = '';

    // this happens once a user clicks the submit button
    if (isset($_POST['add_vehicle'])) {

        // check if plate_number field is empty
        if(empty($_POST['plate_number'])) {
            // display error
            $errors['plate_number'] = 'Please enter a bus plate number!';
        } else {
            // feed the variable
            $plate_number = $_POST['plate_number'];
        }

        // check if fleet_number field is empty
        if(empty($_POST['fleet_number'])) {
            // display error
            $errors['fleet_number'] = 'Please enter a bus fleet number!';
        } else {
            // feed the variable 
            $fleet_number= $_POST['fleet_number'];
        }


        // if there no errors do this
        if (!array_filter($errors)) {
            // it checks if the plate number and fleet number entered by the user exists in the datatbase
            $checkVehicle_plateNum = "SELECT * FROM users WHERE plate_number = '$plate_number'";
            $checkVehicle_fleetNum = "SELECT * FROM users WHERE fleet_number = '$fleet_number'";

            $result_p = mysqli_query($conn, $checkVehicle_plateNum);
            $result_f = mysqli_query($conn, $checkVehicle_fleetNum);

            // if the plate number exists, it does this
            if (mysqli_fetch_array($result_p)) {
                $errors['plate_number'] = 'Plate number already exists in database!';
            } 
            // if the fleet number exists, it does this
            else if (mysqli_fetch_array($result_f)) {
                $errors['fleet_number'] = 'Fleet number already exists in database!';
            } 
            // if the plate number and fleet number does not exists, it does this
            else {
                // it inserts the new plate number and fleet number into the database
                $sql = "INSERT INTO users(plate_number, fleet_number) VALUE ('$plate_number', '$fleet_number')";

                // it checks if the insertion was successful
                if(mysqli_query($conn, $sql)){
                    header('Location: ./manage-vehicles.php');
                } 
                // it sends an error message if the insertion was not successful
                else {
                    echo 'query error' . mysqli_error($conn);
                }
            }

            
        }
    }

          
?>