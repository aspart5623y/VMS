<?php 

    $errors = ['fleet_number' => ''];
    

    // this happens once a user clicks the submit button
    if (isset($_POST['update_fleet'])) {

        // check if fleet_number field is empty
        if(empty($_POST['fleet_number'])) {
            // display error
            $errors['fleet_number'] = 'Please enter a bus fleet number!';
        } else {
            // feed the variable 
            $fleet_number= $_POST['fleet_number'];
        }
        $bus_id = $_POST['bus_id'];




        // if there no errors do this
        if (!array_filter($errors)) {
            // it checks if the fleet number entered by the user exists in the datatbase
            $checkVehicle_fleetNum = "SELECT * FROM users WHERE fleet_number = '$fleet_number'";

            $result_f = mysqli_query($conn, $checkVehicle_fleetNum);

            
            // if the fleet number exists, it does this
            if (mysqli_fetch_array($result_f)) {
                $errors['fleet_number'] = 'Fleet number already exists in database!';
            } 
            // if the fleet number does not exists, it does this
            else {
                // it updates the fleet number into the database
                $sql = "UPDATE users SET fleet_number = '$fleet_number' WHERE id = '$bus_id'";

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