<?php 
    // buffer
    ob_start();
    // page name
    $page = 'check record'; 
    // include component
    include './components/header.php'; ?>
            
    <!-- 
        |***********************************|
        |         S  T  A  T  U  S          |
        |***********************************|
    -->
    <div class="status">
        <div class="container">
           <!-- left hand side in records -->
            <div class="row" style="margin-bottom: 150px">
                <div class="col-lg-8 order-2 theiaStickySidebar order-lg-1">
                    <?php 
                        // php query to select all from daatbase table 
                        $query = mysqli_query($conn, 'SELECT * FROM record WHERE plate_number = "'.$_SESSION['plate_number'].'" ORDER BY real_time DESC');
                        // check number of rows where they exists
                        $rows = mysqli_num_rows($query);
                        // check if row is greater that one
                        if ($rows > 0) {
                            // while there is a record in the database, it displays this
                            while ($record = mysqli_fetch_array($query)){
                                
                                ?> 
                                <!-- 
                                    |***********************************|
                                    |            C  A  R  D             |
                                    |***********************************|
                                -->
                                <div class="card border-0 rounded shadow-sm mb-4">
                                <!-- card header -->
                                    <div class="card-header bg-white">
                                    <!-- title -->
                                        <h6 class="font-weight-bold mb-0 d-inline-block">
                                        <!-- icon -->
                                            <i class="fas fa-car-crash" style="font-size:22px"></i>
                                            <!-- space -->
                                            &nbsp;
                                            &nbsp;
                                            <!-- platenumber -->
                                            <?php echo $_SESSION['plate_number'] ?>
                                        </h6>
                                        
                                        <!-- delete record button -->
                                        <button type="button" id="<?php echo $record['id'] ?>" class="btn close btn-delete">
                                            <i class="fas fa-times-circle" style="font-size:18px"></i>
                                        </button>
                                    </div>

                                    <!-- C A R D     B O D Y -->
                                    <div class="card-body py-5">
                                        <!-- journey detail -->
                                        <p class="text-muted font-weight-bold">
                                            <!-- from -->
                                             <?php
                                                if($record['started'] == '<i class="fas fa-check-double"></i> &nbsp; Your vehicle has been maintained') {
                                                    echo $record['started'];
                                                } else {
                                                    echo 'From ' . $record['started'];
                                                }
                                            ?>
                                            
                                            <!-- to -->
                                            <?php 
                                                if($record['ended'] == '') {
                                                    echo '';
                                                } else {
                                                    echo 'to ' . $record['ended'];
                                                }
                                            ?>
                                        </p>

                                        <!-- number of trip -->
                                        <p class="text-muted">
                                            <?php
                                                 if($record['trip'] == 0) {
                                                    echo '';
                                                } else {
                                                    echo 'Number of trips: ' . $record['trip'];
                                                }
                                            ?>
                                        </p>
                                        
                                        <!-- date -->
                                        <p class="text-muted">
                                            Date:
                                            <?php echo $record['date'] ?>
                                        </p>

                                        <!-- time -->
                                        <p class="text-muted">
                                            TIme:
                                            <?php echo $record['time']; ?>
                                        </p>
                                    
                                        <!-- vehicle status -->
                                        <p class="text-muted">
                                            Vehicle Status:
                                            <?php echo $record['status']; ?>%
                                        </p>

                                        <!-- progress bar -->
                                        <?php
                                        if($record['status'] == 100) {
                                            echo '';
                                        } else {
                                            ?>
                                                <p class="text-muted">
                                                    Vehicle Status Bar:
                                                </p>
                                                <div class="progress shadow">
                                                    <?php
                                                        $level = $record['status'];
                                                        include './php/controllers/status_controller.php';
                                                    ?>
                                                    
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated <?php echo $status ?>" style="width: <?php echo $record['status']; ?>%;"></div>
                                                </div>
                                            <?php
                                        }
                                    ?>

                                        
                                    </div>
                                </div>
                                <?php
                            }
                            // while there is no record in the database, it displays this
                        } else {
                            ?> 
                            <!-- 
                                |***********************************|
                                |            C  A  R  D             |
                                |***********************************|
                            -->
                            <div class="card border-0 rounded shadow-sm">
                                <!-- card body -->
                                <div class="card-body text-center py-5">
                                    <!-- icon -->
                                    <i class="fas fa-car-crash" style="font-size:30px"></i>
                                    <!-- display text -->
                                    <h5 class="font-weight-bold mb-3">
                                        You have not checked your vehicle status yet
                                    </h5>
                                    <p class="text-muted">
                                        All vehicle status check would be shown here!
                                    </p>
                                </div>
                            </div>

                        <?php } ?>
                </div>

                <!-- right hand side -->
                <div class="col-lg-4 theiaStickySidebar order-1 order-lg-2">
                    <!-- 
                        |***********************************|
                        |            C  A  R  D             |
                        |***********************************|
                    -->
                    <div class="card border-0 rounded shadow-sm">
                        <!-- card body -->
                        <div class="card-body py-5">
                            <!-- plate number -->
                            <h6 class="font-weight-bold mb-3">
                                Vehicle Plate Number:
                                <?php echo $_SESSION['plate_number'] ?>
                            </h6>
                            
                            <!-- vehicle fleet number -->
                            <p class="text-muted">
                                Vehicle Fleet Number:
                                <?php echo $_SESSION['fleet_number'] ?>
                            </p>

                            <!-- vehicle status -->
                            <p class="text-muted">
                                Vehicle Status:
                                <?php 
                                    $sql = "SELECT status from users WHERE plate_number = '".$_SESSION['plate_number']."'";
                                    $name = mysqli_query($conn, $sql);
                                    $status_ = mysqli_fetch_array($name);
                                    
                                    echo $status_['status']; 
                                ?>%
                            </p>

                            <!-- Status progress bar -->
                            <p class="text-muted">
                                Vehicle Status Bar:
                            </p>

                            <!-- P R O G R E S S     B A R -->
                            <div class="progress shadow">
                                <?php
                                    
                                    $level = $status_['status'];
                                    include './php/controllers/status_controller.php';
                                ?>
                                <div class="progress-bar progress-bar-striped progress-bar-animated <?php echo $status ?>" style="width: <?php echo $status_['status'];?>%;"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- divider -->
                    <hr class="d-block d-lg-none mb-5">
                </div>
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
                            include './php/controllers/delete_record.php';
                        ?>
                        <!-- hidden input containing vehicle database ID -->
                        <input type="hidden" name="record_id">
                        <button type="submit" class="btn btn-orange px-5" name="delete_record">Yes</button>
                    </form>
                    <button type="button" data-dismiss="modal" class="btn btn-blue px-5 ml-2">No</button>
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


<!-- Script controlling the delete function -->
<script>
    $('.btn-delete').on('click', function(){
        $id = $(this).attr('id');
        $('#deleteVehicle').on('show.bs.modal', function(){
            $('input[name=record_id]').val($id);
        });
        $('#deleteVehicle').modal('show');
    });
</script>


<!-- script controlling the sticky is sidebar -->
<script src="./vendor/theia-sticky-sidebar-1.5.0/theia-sticky-sidebar-1.5.0/js/theia-sticky-sidebar.js"></script>
<script>
    $(document).ready(function() {
        $('.theiaStickySidebar')
            .theiaStickySidebar({
                additionalMarginTop: 70
            });
    });
</script>