<?php

    $errors = ['plate_number' => ''];
    

    // this happens once a user clicks the submit button
    if (isset($_POST['update_plate'])) {

        // check if plate_number field is empty
        if(empty($_POST['plate_number'])) {
            // display error
            $errors['plate_number'] = 'Please enter a bus plate number!';
        } else {
            // feed the variable
            $plate_number = $_POST['plate_number'];
        }

        $bus_id = $_POST['bus_id'];




        // if there no errors do this
        if (!array_filter($errors)) {
            // it checks if the plate number entered by the user exists in the datatbase
            $checkVehicle_plateNum = "SELECT * FROM users WHERE plate_number = '$plate_number'";

            $result_p = mysqli_query($conn, $checkVehicle_plateNum);

            // if the plate number exists, it does this
            if (mysqli_fetch_array($result_p)) {
                $errors['plate_number'] = 'Plate number already exists in database!';
            }
            // if the plate number does not exists, it does this
            else {
                // it updates the new plate number into the database
                $sql = "UPDATE users SET plate_number = '$plate_number'  WHERE id = '$bus_id'";

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