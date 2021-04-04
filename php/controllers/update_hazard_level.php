<?php 

    $errors = ['hazard' => ''];
    

    // this happens once a user clicks the submit button
    if (isset($_POST['update_hazard'])) {

        // check if hazard field is empty
        if(empty($_POST['hazard'])) {
            // display error
            $errors['hazard'] = 'Please enter a hazard!';
        } else {
            // feed the variable 
            $hazard = $_POST['hazard'];
        }
        // getting the id from the form
        $hazard_id = $_POST['hazard_id'];




        // if there no errors do this
        if (!array_filter($errors)) {
            
            // it updates the fleet number into the database
            $sql = "UPDATE hazard SET hazard = '$hazard' WHERE id = '$hazard_id'";

            // it checks if the update was successful
            if(mysqli_query($conn, $sql)){
                header('Location: ./update-hazard.php');
            } 
            // it sends an error message if the insertion was not successful
            else {
                echo 'query error' . mysqli_error($conn);
            }

            
        }
    }

          
?>