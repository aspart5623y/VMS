<?php 
    // buffer
    ob_start();
    // page name
    $page = 'check vehicle'; 
    // inclde header
    include './components/header.php'; ?>
            

    <!-- 
        |***********************************|
        |            F  O  R  M             |
        |***********************************|
    -->
    <div class="form-2 mb-5">
        <div class="col-lg-7 mx-auto">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body p-5">
                    <!-- Check vehicle status form -->
                    <form method="POST" class="my-5 w-100">

                        <?php
                            include './php/controllers/check_status.php';
                        ?>

                        <!-- destinations -->
                        <div class="row">
                            <!-- From -->
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="">started:</label>
                                    <!-- started select box -->
                                    <select name="started" id="" class="custom-select">
                                        <!-- default display option -->
                                        <option value="">Select where you started your trip</option>
                                        <!-- query to get list of routes from database -->
                                        <?php 
                                            $query = mysqli_query($conn, 'SELECT * FROM routes');

                                            $rows = mysqli_num_rows($query);

                                            if ($rows > 0) {
                                                // PHP loop to display each of the destination in option
                                                while ($route = mysqli_fetch_array($query)){
                                                    ?>
                                                    <!-- options -->
                                                    <option value="<?php echo $route['route'] ?>"><?php echo $route['route'] ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <p class="text-danger">
                                        <?php echo $errors['started'] ?>
                                    </p>
                                </div>
                            </div>

                            <!-- to -->
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="">ended:</label>
                                    <!-- ended select box -->
                                    <select name="ended" id="" class="custom-select">
                                        <!-- default display option -->
                                        <option value="">Select where you ended your trip</option>
                                        <!-- query to get list of routes from database -->
                                        <?php 
                                            $query = mysqli_query($conn, 'SELECT * FROM routes');

                                            $rows = mysqli_num_rows($query);

                                            if ($rows > 0) {
                                                // PHP loop to display each of the destination in option
                                                while ($route = mysqli_fetch_array($query)){
                                                    ?>
                                                    <!-- options -->
                                                    <option value="<?php echo $route['route'] ?>"><?php echo $route['route'] ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <p class="text-danger">
                                        <?php echo $errors['ended'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- input box -->
                        <div class="form-group">
                            <label for="">Enter number of trips:</label>
                            <input type="number" class="form-control" name="trip" value="1">
                        </div>
                        <p class="text-danger mb-4">
                            <?php echo $errors['trip'] ?>
                        </p>

                        <!-- submit button -->
                        <button type="submit" name="check_status" class="btn px-5 py-2 d-block mt-4 mx-auto btn-blue">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


            

<?php 
    // include footer
    include './components/footer.php'; 
    // flush buffer
    ob_flush();
?>



