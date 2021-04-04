<?php

    $errors = ['started' => '', 'ended' => '', 'hazard' => ''];
    $started = $ended = $hazard = "";

    // this happens once a user clicks the submit button
    if (isset($_POST['add_hazard'])) {

        // check if plate_number field is empty
        if(empty($_POST['started'])) {
            // display error
            $errors['started'] = 'Please enter where you started your trip!';
        } else {
            // feed the variable
            $started = $_POST['started'];
        }

        // check if plate_number field is empty
        if(empty($_POST['ended'])) {
            // display error
            $errors['ended'] = 'Please enter where you ended your trip!';
        } else {
            // feed the variable
            $ended = $_POST['ended'];
        }

        // check if plate_number field is empty
        if(empty($_POST['hazard'])) {
            // display error
            $errors['hazard'] = 'Please enter a hazard!';
        } else {
            // feed the variable
            $hazard = $_POST['hazard'];
        }


        // if there no errors do this
        if (!array_filter($errors)) {
            // it checks if the route entered by the admin exists in the datatbase
            $checkHazard= "SELECT * FROM hazard WHERE started = '$started' AND ended = '$ended' OR ended = '$started' AND started = '$ended'";

            $result_h = mysqli_query($conn, $checkHazard);
            // $errors['hazard'] = print_r($result_h);
            

            // if the route exists, it does this
            if (mysqli_fetch_array($result_h)) {
                $errors['hazard'] = "$started to $ended already exists in database!";
            }
            // if the route does not exists, it does this
            else {
                // it inserts the new plate number and fleet number into the database
                $sql = "INSERT INTO hazard(started, ended, hazard) VALUES ('$started', '$ended', '$hazard')";

                // it checks if the insertion was successful
                if(mysqli_query($conn, $sql)){
                    header('Location: ./update-hazard.php');
                } 
                // it sends an error message if the insertion was not successful
                else {
                    echo 'query error' . mysqli_error($conn);
                }
            }

            
        }
    }

          
?>