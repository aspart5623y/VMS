<?php 
    // buffer
    ob_start();
    // page name
    $page = 'update routes'; 
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
            <p class="text-muted">Click the button below to add new route</p>
            <!-- add new vehicle button -->
            <button type="button" class="btn btn-orange px-5 py-2" data-toggle="modal" data-target="#addVehicle">
                <i class="fas fa-road"></i> 
                &nbsp;
                Add New Route
            </button>

            <div class="col-lg-7 mx-auto">
                <!-- table responsive -->
                <div class="table-responsive shadow-sm mt-5">
                    <table class="table bg-white table-striped" id="myTable">
                        <!-- table head -->
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Route</th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- table body -->
                        <tbody>

                            <?php 

                                $query = mysqli_query($conn, 'SELECT * FROM routes WHERE id > 1');

                                $rows = mysqli_num_rows($query);

                                if ($rows > 0) {
                                    while ($route = mysqli_fetch_array($query)){

                                        ?>

                                <!-- tabel row -->
                                <tr>
                                    <!-- s/n -->
                                    <td class="sn"></td>
                                    <!-- vehicle plate number -->
                                    <td><?php echo $route['route'] ?></td>
                                    <!-- functional buttons -->
                                    <td class="text-center">
                                        <!-- edit vehicle button -->
                                        <button type="button" class="btn btn-blue btn-edit rounded-circle" id="<?php echo $route['id'] ?>" this-route="<?php echo $route['route'] ?>">
                                            <!-- tooltip -->
                                            <a href="javascript:void(0)" class="tooltip" title="Edit Route">
                                                <i class="fas fa-archive"></i>
                                            </a>
                                            <!-- btn icon -->
                                            <i class="fas fa-marker"></i>
                                        </button>

                                        <!-- delete vehicle button -->
                                        <button type="button" class="btn btn-danger btn-delete rounded-circle" id="<?php echo $route['id'] ?>">
                                            <!-- tooltip -->
                                            <a href="javascript:void(0)" class="tooltip" title="Delete Route">
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
                                    <td colspan="3" class="text-center">There's no Route in the database!</td>
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
        |           D E L E T E     R  O  U  T  E     M O D A L           |
        |*****************************************************************|
    -->
    <div class="modal fade" id="deleteVehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h6 class="mb-3">Are you sure you want to delete this route?</h6>
                    <form method="POST" class="d-inline-block">
                        <!-- Include delete_vehicle.php -->
                        <?php 
                            include '../php/controllers/delete_route.php';
                        ?>
                        <!-- hidden input containing vehicle database ID -->
                        <input type="hidden" name="route_id">

                        <button type="submit" name="delete_route" class="btn btn-orange px-5">Yes</button>
                    </form>
                    <button type="button"data-dismiss="modal" class="btn btn-blue px-5 ml-2">No</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 
        |*****************************************************************|
        |              E D I T     R  O  U  T  E     M O D A L            |
        |*****************************************************************|
    -->
    <div class="modal fade" id="editVehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="mb-0">
                        Edit Route    
                    </h6>
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <!-- Include add_vehicle.php -->
                        <?php 
                            include '../php/controllers/update_route.php';
                        ?>

                        <!-- hidden input containing vehicle database ID -->
                        <input type="hidden" name="route_id">                        
                        <!-- input box -->
                        <div class="form-group">
                            <label for="">Enter Route:</label>
                            <input type="text" class="form-control" placeholder="Enter Route" name="route">
                        </div>
                        <p class="mb-4 text-danger">
                            <?php
                                echo $errors['route'];
                            ?>
                        </p>
                        
                        <!-- submit button -->
                        <button type="submit" name="update_route" class="btn px-5 py-2 d-block mt-4 mx-auto btn-blue">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- 
        |*****************************************************************|
        |               A D D     R  O  U  T  E     M O D A L             |
        |*****************************************************************|
    -->
    <div class="modal fade" id="addVehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="mb-0">
                        Add Vehicle    
                    </h6>
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <!-- Include add_route.php -->
                        <?php 
                            include '../php/controllers/add_route.php';
                        ?>
                        <!-- input box -->
                        <div class="form-group">
                            <label for="">Enter Route:</label>
                            <input type="text" name="route" class="form-control" placeholder="Enter Route" value="<?php echo $route ?>">
                        </div>
                        <p class="text-danger mb-4">
                            <?php echo $errors['route'] ?>
                        </p>
                        
                        <!-- submit button -->
                        <button type="submit" name="add_route" class="btn px-5 py-2 d-block mt-4 mx-auto btn-blue">Add</button>
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
        $route = $(this).attr('this-route');
        $('#editVehicle').on('show.bs.modal', function(){
            $('input[name=route_id]').val($id);
            $('input[name=route]').val($route);
        });
        $('#editVehicle').modal('show');
    });
</script>



<script>
    $('.btn-delete').on('click', function(){
        $id = $(this).attr('id');
        $('#deleteVehicle').on('show.bs.modal', function(){
            $('input[name=route_id]').val($id);
        });
        $('#deleteVehicle').modal('show');
    });
</script>

<script>
    $(function(){
        $("#myTable").DataTable();
    });
</script>

