<?php

    $errors = ['email' => '', 'password' => ''];
    $email = $password  = "";


    // This happens when user submits his login form
    if(isset($_POST['admin_login'])) {
        // Gets the user plate number field
        $email = $_POST['email'];
        $password = $_POST['password'];

        // checks if the plate bumber input is empty
        if(empty($email)){
            // error message
            $errors['email'] = "<i class=\"fas fa-exclamation-circle\"></i> Please enter an email!";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "<i class=\"fas fa-exclamation-circle\"></i> you entered an invalid email!";  
            }
        }

        if(empty($password)){
            // error message
            $errors['password'] = "<i class=\"fas fa-exclamation-circle\"></i> Please enter a your password!";
        }

        


        if (!array_filter($errors)) {
            // check if plate number exists in database users table
            $sql = "SELECT * FROM users WHERE plate_number = '" . $email . "' AND fleet_number = '" . $password . "' LIMIT 1";

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
                header('Location: ./admin/home.php');

                

                // if plate number does not exist do this!!
            } else {

                // check if plate number exists in database users table
                $checkNumber = "SELECT * FROM users WHERE plate_number = '" . $email . "' LIMIT 1";


                // gets the result of search
                $numberResult = mysqli_query($conn, $checkNumber);

                // if plate number does not exist do this!
                if(mysqli_num_rows($numberResult) != 1) {
                    $errors['email'] = "<i class=\"fas fa-exclamation-circle\"></i> Email does not exist";
                } else {
                    $errors['password'] = "<i class=\"fas fa-exclamation-circle\"></i> Incorrect password!";
                }
            }

        }
        // end of empty error check

    } 

?>