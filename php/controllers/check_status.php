<?php

    $errors = ['started' => '', 'ended' => '', 'trip' => ''];
    $started = $ended = $trip = '';

    // this happens once a user clicks the submit button
    if (isset($_POST['check_status'])) {

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
        if(empty($_POST['trip'])) {
            // display error
            $errors['trip'] = 'Please enter number of trips you went on!';
        } else {
            // feed the variable
            $trip = $_POST['trip'];
        }


        // if there no errors do this
        if (!array_filter($errors)) {
            // it checks if the route entered by the admin exists in the datatbase
            $checkHazard = "SELECT * FROM hazard WHERE started = '$started' AND ended = '$ended' OR ended = '$started' AND started = '$ended'";

            $result_h = mysqli_query($conn, $checkHazard);
            $resultArr = mysqli_fetch_array($result_h);

            // if the route exists, it does this
            if ($resultArr) {
                $new_status = $_SESSION['status'] - ($resultArr['hazard'] * $trip);
                if ($new_status < 0) {
                    $my_status = 0;
                } else if ($new_status >= 0)  {
                    $my_status = $new_status;
                }
                $_SESSION['status'] = $my_status;
                $_SESSION['trip'] = $trip;
                $_SESSION['started'] = $started;
                $_SESSION['ended'] = $ended;
                $date = date("D d M, Y"); 
                $time = date("h:ia");
                echo $_SESSION['status'];


                // it inserts the new plate number and fleet number into the database
                $sql = "INSERT INTO record(plate_number, started, ended, status, date, time, trip) VALUES ('".$_SESSION['plate_number']."', '$started', '$ended', '$my_status', '$date', '$time', '$trip')";
                $update = "UPDATE users SET status = '$my_status' WHERE plate_number = '".$_SESSION['plate_number']."' ";

                // it checks if the insertion was successful
                if(mysqli_query($conn, $sql)){
                    if(mysqli_query($conn, $update)){
                        header('Location: ./report.php');
                    }
                } 
                // it sends an error message if the insertion was not successful
                else {
                    echo 'query error' . mysqli_error($conn);
                }
            } else {
                $errors['trip'] = "$started to $ended does not exist in database. Please contact the admin for help!";
            }

            
        }
    }

          
?>









<!-- 
// it inserts the new plate number and fleet number into the database
$sql = "INSERT INTO hazard(started, ended, hazard) VALUES ('$started', '$ended', '$hazard')";

// it checks if the insertion was successful
if(mysqli_query($conn, $sql)){
    header('Location: ./update-hazard.php');
} 
// it sends an error message if the insertion was not successful
else {
    echo 'query error' . mysqli_error($conn);
} -->