<?php 

    $errors = ['route' => ''];
    

    // this happens once a user clicks the submit button
    if (isset($_POST['update_route'])) {

        // check if route field is empty
        if(empty($_POST['route'])) {
            // display error
            $errors['route'] = 'Please enter a route!';
        } else {
            // feed the variable 
            $route = $_POST['route'];
        }
        $route_id = $_POST['route_id'];




        // if there no errors do this
        if (!array_filter($errors)) {
            // it checks if the fleet number entered by the user exists in the datatbase
            $checkRoute = "SELECT * FROM routes WHERE route = '$route'";

            $result_r = mysqli_query($conn, $checkRoute);

            
            // if the fleet number exists, it does this
            if (mysqli_fetch_array($result_r)) {
                $errors['route'] = "$route already exists in database!";
            } 
            // if the fleet number does not exists, it does this
            else {
                // it updates the fleet number into the database
                $sql = "UPDATE routes SET route = '$route' WHERE id = '$route_id'";

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