<?php 
    // buffer
    ob_start();
    // page name
    $page = 'update hazard'; 
    // include header
    include '../components/header-admin.php'; 

?>
            
    <!-- 
        |***********************************|
        |        H  A  Z  A  R  D  S        |
        |***********************************|
    -->
    <div class="vehicles">
        <div class="container">
            <!-- call out text -->
            <p class="text-muted">Click the button below to add new route hazard level</p>
            <!-- add new vehicle button -->
            <button type="button" class="btn btn-orange px-5 py-2" data-toggle="modal" data-target="#addVehicle">
                <i class="fas fa-road"></i> 
                &nbsp;
                Add New Route Hazard
            </button>

            <div class="col-lg-7 mx-auto">
                <!-- table responsive -->
                <div class="table-responsive shadow-sm mt-5">
                    <table class="table bg-white table-striped" id="myTable">
                        <!-- table head -->
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Hazard Level</th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- table body -->
                        <tbody>

                            <?php 
                                // selects all the items on hazard table
                                $query = mysqli_query($conn, 'SELECT * FROM hazard');
                                // get the number or=f rows it occupies
                                $rows = mysqli_num_rows($query);
                                
                                // dsplays all the items using the while loop
                                if ($rows > 0) {
                                    while ($hazard = mysqli_fetch_array($query)){
                                        ?>

                                <!-- tabel row -->
                                <tr>
                                    <!-- s/n -->
                                    <td class="sn"></td>
                                    <!-- where the journey starts -->
                                    <td><?php echo $hazard['started'] ?></td>
                                    <!-- where the journey ends -->
                                    <td><?php echo $hazard['ended'] ?></td>
                                    <!-- hazard percentage -->
                                    <td><?php echo $hazard['hazard'] ?>%</td>
                                    <!-- functional buttons -->
                                    <td class="text-center">
                                        <!-- edit vehicle button -->
                                        <button type="button" class="btn btn-blue btn-edit rounded-circle" this-started="<?php echo $hazard['started']; ?>" this-ended="<?php echo $hazard['ended']; ?>" this-hazard="<?php echo $hazard['hazard']; ?>" id="<?php echo $hazard['id'] ?>">
                                            <!-- tooltip -->
                                            <a href="javascript:void(0)" class="tooltip" title="Edit route hazard level">
                                                <i class="fas fa-archive"></i>
                                            </a>
                                            <!-- btn icon -->
                                            <i class="fas fa-marker"></i>
                                        </button>

                                        <!-- delete vehicle button -->
                                        <button type="button" class="btn btn-danger btn-delete rounded-circle" id="<?php echo $hazard['id'] ?>">
                                            <!-- tooltip -->
                                            <a href="javascript:void(0)" class="tooltip" title="Delete route hazard level">
                                                <i class="fas fa-archive"></i>
                                            </a>
                                            <!-- btn icon -->
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                                    }
                                } else  {
                                    ?> 
                                    <!-- tabel row -->
                                    <tr>
                                        <!-- s/n -->
                                        <td colspan="5" class="text-center">There's no Route Hazard in the database!</td>
                                    </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- 
        |*****************************************************************|
        |            D E L E T E     H A Z A R D     M O D A L            |
        |*****************************************************************|
    -->
    <div class="modal fade" id="deleteVehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h6 class="mb-3">Are you sure you want to delete this route?</h6>
                    <form method="POST" class="d-inline-block">
                        <!-- Include delete_hazard.php -->
                        <?php 
                            include '../php/controllers/delete_hazard.php';
                        ?>

                        <!-- hidden input containing hazard database ID -->
                        <input type="hidden" name="hazard_id">
                        <!-- form submit button -->
                        <button type="submit" name="delete_hazard" class="btn btn-orange px-5">Yes</button>
                    </form>
                    <button type="button" data-dismiss="modal" class="btn btn-blue px-5 ml-2">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        |*****************************************************************|
        |               E D I T     H A Z A R D     M O D A L             |
        |*****************************************************************|
    -->
    <div class="modal fade" id="editVehicle">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h6 class="mb-0">
                        Edit Route Hazard    
                    </h6>
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Check vehicle status form -->
                    <form method="POST">
                        <!-- Include add_vehicle.php -->
                        <?php 
                            include '../php/controllers/update_hazard_level.php';
                        ?>

                        <!-- hidden input containing hazard database ID -->
                        <input type="hidden" name="hazard_id">
                                    
                        <!-- destinations -->
                        <p class="text-center text-blue hazard-info"></p>
                        
                        <!-- input box -->
                        <div class="form-group mb-4">
                            <!-- enter the hazard level here -->
                            <label for="">Enter hazard level:</label>
                            <input type="text" class="form-control" name="hazard" placeholder="Hazard level">
                        </div>
                        
                        <!-- submit button -->
                        <button type="submit" name="update_hazard" class="btn px-5 py-2 d-block mt-4 mx-auto btn-blue">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- 
        |*****************************************************************|
        |               A D D      H A Z A R D      M O D A L             |
        |*****************************************************************|
    -->
    <div class="modal fade" id="addVehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h6 class="mb-0">
                        Add Route Hazard    
                    </h6>
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Check vehicle status form -->
                        <form method="POST">
                        <!-- Include add_hazard.php -->
                        <?php 
                            include '../php/controllers/add_hazard.php';
                        ?>
                        <!-- destinations -->
                        <div class="row">
                            <!-- started -->
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

                            <!-- ended -->
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label for="">ended:</label>
                                    <!-- to select box -->
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
                            <!-- enter the hazard level here -->
                            <label for="">Enter hazard level:</label>
                            <input type="text" class="form-control" name="hazard" placeholder="Hazard level">
                        </div>
                        <p class="text-danger mb-4">
                            <?php echo $errors['hazard'] ?>
                        </p>
                        
                        <!-- submit button -->
                        <button type="submit" name="add_hazard" class="btn px-5 py-2 d-block mt-4 mx-auto btn-blue">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




            
            

<?php 
    // include footer
    include '../components/footer-admin.php';
    include '../includes/dataTable.php'; 

    // flush buffer
    ob_flush();
?>

<!-- Initialises the tooltip -->
<script>
    $(document).ready(function() {
        $('.tooltip').tooltip();
    });
</script>

<!-- nuumber the list of hazard level -->
<script>
    // select all elements the has the classname ===>> "sn"
    var sn = document.querySelectorAll('.sn');
    // loop the goeas through all the elements with classname ===>> "sn"
    for (i = 0; i < sn.length; i++) {
        // the number to be displayed in each of the element
        sn[i].textContent = i + 1;
    }
</script>

<!-- Edit hazard level trigger button script -->
<script>
    $('.btn-edit').on('click', function(){
        // id of the hazard level to be edited
        $id = $(this).attr('id');
        // where the trip started
        $started = $(this).attr('this-started');
        // where the trip ended
        $ended = $(this).attr('this-ended');
        // hazard level
        $hazard = $(this).attr('this-hazard');

        // this happens when modal show
        $('#editVehicle').on('show.bs.modal', function(){
            // it inserts each of the above variables into the values below
            $('input[name=hazard_id]').val($id);
            $('input[name=hazard]').val($hazard);
            $('p.hazard-info').text($started + ' - ' + $ended);
        });
        // this triggers the modal to show
        $('#editVehicle').modal('show');
    });
</script>

<!-- the delete hazard level modal button script -->
<script>
    $('.btn-delete').on('click', function(){
        // gets the id of the clicked element button
        $id = $(this).attr('id');
        // this happens when the modal shows
        $('#deleteVehicle').on('show.bs.modal', function(){
            $('input[name=hazard_id]').val($id);
        });
        // this triggers the modal to show
        $('#deleteVehicle').modal('show');
    });
</script>



<script>
    $(function(){
        $("#myTable").DataTable();
    });
</script>