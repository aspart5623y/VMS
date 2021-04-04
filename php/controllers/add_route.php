<?php

    $errors = ['route' => ''];
    $route = '';

    // this happens once a user clicks the submit button
    if (isset($_POST['add_route'])) {

        // check if plate_number field is empty
        if(empty($_POST['route'])) {
            // display error
            $errors['route'] = 'Please enter a route!';
        } else {
            // feed the variable
            $route = $_POST['route'];
        }


        // if there no errors do this
        if (!array_filter($errors)) {
            // it checks if the route entered by the admin exists in the datatbase
            $checkRoute = "SELECT * FROM routes WHERE route = '$route'";

            $result_r = mysqli_query($conn, $checkRoute);

            // if the route exists, it does this
            if (mysqli_fetch_array($result_r)) {
                $errors['route'] = "$route already exists in database!";
            }
            // if the route does not exists, it does this
            else {
                // it inserts the new plate number and fleet number into the database
                $sql = "INSERT INTO routes(route) VALUE ('$route')";

                // it checks if the insertion was successful
                if(mysqli_query($conn, $sql)){
                    header('Location: ./update-routes.php');
                } 
                // it sends an error message if the insertion was not successful
                else {
                    echo 'query error' . mysqli_error($conn);
                }
            }

            
        }
    }

          
?>