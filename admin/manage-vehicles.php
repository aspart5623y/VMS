<?php 
    // buffer
    ob_start();
    // page name
    $page = 'manage vehicle'; 
    // include header
    include '../components/header-admin.php'; 
?>
            
    <!-- 
        |***********************************|
        |          V E H I C L E S          |
        |***********************************|
    -->
    <div class="vehicles">
        <div class="container">
            <!-- call out text -->
            <p class="text-muted">Click the button below to add new vehicles</p>
            <!-- add new vehicle button -->
            <button type="button" class="btn btn-orange px-5 py-2" data-toggle="modal" data-target="#addVehicle">
                <i class="fas fa-plus"></i> Add vehicle
            </button>

            <!-- table responsive -->
            <div class="table-responsive shadow-sm mt-5">
                <table class="table bg-white table-striped" id="myTable">
                    <!-- table head -->
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Vehicle Plate Number</th>
                            <th>Vehicle Fleet Number</th>
                            <th>Vehicle Health Level</th>
                            <th>Vehicle Health Percentage</th>
                            <th></th>
                        </tr>
                    </thead>
                    <!-- table body -->
                    <tbody>

                        
                        <?php 

                            $query = mysqli_query($conn, 'SELECT * FROM users WHERE usertype = "user"');

                            $rows = mysqli_num_rows($query);

                            if ($rows > 0) {
                                while ($bus = mysqli_fetch_array($query)){

                                    ?> 

                                    <!-- tabel row -->
                                    <tr>
                                        <!-- s/n -->
                                        <td class="sn"></td>
                                        <!-- vehicle plate number -->
                                        <td><?php echo $bus['plate_number']; ?></td>
                                        <!-- fleet number -->
                                        <td class="text-center"><?php echo $bus['fleet_number']; ?></td>
                                        
                                        <!-- health level -->
                                        <td>
                                            <!-- PROGRESS BAR -->
                                            <div class="progress bg-white shadow">
                                                <?php
                                                    $level = $bus['status'];
                                                    include '../php/controllers/status_controller.php';
                                                ?>
                                                <div class="progress-bar progress-bar-striped progress-bar-animated <?php echo $status; ?>" style="width: <?php echo $bus['status']; ?>%;"></div>
                                            </div>
                                        </td>

                                        <!-- health percentage -->
                                        <td class="text-center"><?php echo $bus['status']; ?>%</td>
                                        
                                        <!-- functional buttons -->
                                        <td class="text-right">
                                            <!-- edit vehicle button -->
                                            <button type="button" class="btn btn-edit btn-blue rounded-circle" id="<?php echo $bus['id']; ?>" this-plate="<?php echo $bus['plate_number']; ?>" this-fleet="<?php echo $bus['fleet_number']; ?>">
                                                <!-- tooltip -->
                                                <a href="javascript:void(0)" class="tooltip" title="Edit vehicle details">
                                                    <i class="fas fa-archive"></i>
                                                </a>
                                                <!-- btn icon -->
                                                <i class="fas fa-marker"></i>
                                            </button>

                                            <!-- Vehicle maintenance vehicle button -->
                                            <button type="button" class="btn btn-maintain btn-orange rounded-circle" this-plate="<?php echo $bus['plate_number']; ?>" id="<?php echo $bus['id']; ?>">
                                                <!-- tooltip -->
                                                <a href="javascript:void(0)" class="tooltip" title="Maintain vehicle">
                                                    <i class="fas fa-archive"></i>
                                                </a>
                                                <!-- btn icon -->
                                                <i class="fas fa-cog"></i>
                                            </button>

                                            <!-- delete vehicle button -->
                                            <button type="button" class="btn btn-danger btn-delete rounded-circle" id="<?php echo $bus['id']; ?>">
                                                <!-- tooltip -->
                                                <a href="javascript:void(0)" class="tooltip" title="Delete vehicle">
                                                    <i class="fas fa-archive"></i>
                                                </a>
                                                <!-- btn icon -->
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php

                                }
                            } else {
                                ?> 
                                <!-- tabel row -->
                                    <tr>
                                        <!-- s/n -->
                                        <td colspan="5" class="text-center">There's no Bus in the database!</td>
                                    </tr>

                            <?php } ?>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- 
        |*****************************************************************|
        |           D E L E T E     V E H I C L E     M O D A L           |
        |*****************************************************************|
    -->
    <div class="modal fade" id="deleteVehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h6 class="mb-3">Are you sure you want to delete vehicle?</h6>
                    <form method="POST" class="d-inline-block">
                        <!-- Include delete_vehicle.php -->
                        <?php 
                            include '../php/controllers/delete_vehicle.php';
                        ?>
                        <!-- hidden input containing vehicle database ID -->
                        <input type="hidden" name="bus_id">
                        <button type="submit" class="btn btn-orange px-5" name="delete_vehicle">Yes</button>
                    </form>
                    <button type="button" data-dismiss="modal" class="btn btn-blue px-5 ml-2">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        |*****************************************************************|
        |              E D I T     V E H I C L E     M O D A L            |
        |*****************************************************************|
    -->
    <div class="modal fade" id="editVehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="mb-0">
                        Edit Vehicle    
                    </h6>
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">
                        <!-- nav -->
                        <ul class="nav nav-tabs nav-justified">
                            <!-- nav item -->
                            <li class="nav-item">
                                <!-- nav link -->
                                <a href="#user" data-toggle="tab" class="nav-link text-dark active">
                                    Update Plate Number
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <!-- nav link -->
                                <a href="#admin" data-toggle="tab" class="nav-link text-dark">
                                    Update Fleet Number
                                </a>
                            </li>
                        </ul>
                        <!-- tab content -->
                        <div class="tab-content mt-4">
                            <!-- tab pane -->
                            <div class="tab-pane active" id="user">
                                <!-- 
                                    |****************************************************|
                                    |        U P D A T E   P L A T E   N U M B E R       |
                                    |****************************************************|
                                -->

                                <form method="POST">
                                    <!-- Include add_vehicle.php -->
                                    <?php 
                                        include '../php/controllers/update_plate.php';
                                    ?>

                                    <!-- hidden input containing vehicle database ID -->
                                    <input type="hidden" name="bus_id">

                                    
                                    <!-- input box -->
                                    <div class="form-group mb-4">
                                        <label for="">Enter Vehicle Fleet Number:</label>
                                        <input type="text" class="form-control" placeholder="Enter Vehicle Fleet Number" name="fleet_number" readonly>
                                    </div>

                                    <!-- input box -->
                                    <div class="form-group">
                                        <label for="">Enter Vehicle Plate Number:</label>
                                        <input type="text" class="form-control" placeholder="Enter Vehicle Plate Number" name="plate_number">
                                    </div>
                                    <p class="text-danger mb-4">
                                        <?php echo $errors['plate_number'] ?>
                                    </p>

                                    
                                    <!-- submit button -->
                                    <button type="submit" name="update_plate" class="btn px-5 py-2 d-block mt-4 mx-auto btn-blue">Update</button>
                                </form>
                            </div>

                            <div class="tab-pane" id="admin">
                                <!-- 
                                    |****************************************************|
                                    |        U P D A T E   F L E E T   N U M B E R       |
                                    |****************************************************|
                                -->

                                <form method="POST">
                                    <!-- Include add_vehicle.php -->
                                    <?php 
                                        include '../php/controllers/update_fleet.php';
                                    ?>

                                    <!-- hidden input containing vehicle database ID -->
                                    <input type="hidden" name="bus_id">

                                    

                                    <!-- input box -->
                                    <div class="form-group mb-4">
                                        <label for="">Enter Vehicle Plate Number:</label>
                                        <input type="text" class="form-control" placeholder="Enter Vehicle Plate Number" name="plate_number" readonly>
                                    </div>
                                

                                    <!-- input box -->
                                    <div class="form-group">
                                        <label for="">Enter Vehicle Fleet Number:</label>
                                        <input type="text" class="form-control" placeholder="Enter Vehicle Fleet Number" name="fleet_number">
                                    </div>
                                    <p class="text-danger mb-4">
                                        <?php echo $errors['fleet_number'] ?>
                                    </p>
                                    
                                    <!-- submit button -->
                                    <button type="submit" name="update_fleet" class="btn px-5 py-2 d-block mt-4 mx-auto btn-blue">Update</button>
                                </form>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>





    <!-- 
        |*****************************************************************|
        |               A D D     V E H I C L E     M O D A L             |
        |*****************************************************************|
    -->
    <div class="modal fade" id="addVehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- modal header -->
                <div class="modal-header">
                    <!-- modal header title -->
                    <h6 class="mb-0">
                        Add Route    
                    </h6>
                    <!-- close modal button -->
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- 
                        |*****************************************************************|
                        |                A D D     V E H I C L E     F O R M              |
                        |*****************************************************************|
                    -->
                    <form method="POST">
                        <!-- Include add_vehicle.php -->
                        <?php 
                            include '../php/controllers/add_vehicle.php';
                        ?>

                        <!-- input box -->
                        <div class="form-group">
                            <label for="">Enter Vehicle Plate Number:</label>
                            <input type="text" class="form-control" placeholder="Enter Vehicle Plate Number" name="plate_number" value="<?php echo $plate_number ?>">
                        </div>
                        <!-- errors -->
                        <p class="text-danger mb-4"><?php echo $errors['plate_number'] ?></p>

                        <!-- input box -->
                        <div class="form-group">
                            <label for="">Enter Vehicle Fleet Number:</label>
                            <input type="text" class="form-control" placeholder="Enter Vehicle Fleet Number" name="fleet_number" value="<?php echo $fleet_number ?>">
                        </div>
                        <!-- errors -->
                        <p class="text-danger mb-4"><?php echo $errors['fleet_number'] ?></p>
                        
                        <!-- submit button -->
                        <button type="submit" name="add_vehicle" class="btn px-5 py-2 d-block mt-4 mx-auto btn-blue">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- 
        |*************************************************************************|
        |         V E H I C L E       M A I N T E N A N C E      M O D A L        |
        |*************************************************************************|
    -->
    <div class="modal fade" id="maintenance">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h6 class="mb-3">Are you sure you want to maintain this vehicle?</h6>
                    <form method="POST" class="d-inline-block">
                        <!-- Include maintain_vehicle.php -->
                        <?php 
                            include '../php/controllers/maintain_vehicle.php';
                        ?>
                        <!-- hidden input containing vehicle database ID -->
                        <input type="hidden" name="bus_id">
                        <input type="hidden" name="bus_plate">
                        <button type="submit" name="maintain_vehicle" class="btn btn-orange px-5">Yes</button>
                    </form>
                    <button type="button"data-dismiss="modal" class="btn btn-blue px-5 ml-2">No</button>
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

<script>
    $(document).ready(function() {
        $('.tooltip').tooltip();
    });
</script>

<script>
    var sn = document.querySelectorAll('.sn');
    for (i = 0; i < sn.length; i++) {
        sn[i].textContent = i + 1;
    }
</script>

<script>
    $('.btn-edit').on('click', function(){
        $id = $(this).attr('id');
        $plate_number = $(this).attr('this-plate');
        $fleet_number = $(this).attr('this-fleet');
        $('#editVehicle').on('show.bs.modal', function(){
            $('input[name=bus_id]').val($id);
            $('input[name=plate_number]').val($plate_number);
            $('input[name=fleet_number]').val($fleet_number);
        });
        $('#editVehicle').modal('show');
    });
</script>


<script>
    $('.btn-delete').on('click', function(){
        $id = $(this).attr('id');
        $('#deleteVehicle').on('show.bs.modal', function(){
            $('input[name=bus_id]').val($id);
        });
        $('#deleteVehicle').modal('show');
    });
</script>



<script>
    $('.btn-maintain').on('click', function(){
        $id = $(this).attr('id');
        $plate_number = $(this).attr('this-plate');
        $('#maintenance').on('show.bs.modal', function(){
            $('input[name=bus_id]').val($id);
            $('input[name=bus_plate]').val($plate_number);
        });
        $('#maintenance').modal('show');
    });
</script>

<script>
    $(function(){
        $("#myTable").DataTable();
    });
</script>

