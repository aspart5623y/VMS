<?php

    // buffer
    ob_start();

    // include database
    include './php/config/db_connect.php';
      

    if (!isset($_SESSION)) {
        session_start();
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site title -->
    <title>PMT - Vehicle Maintenance System</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/logo/favicon.png" width="40px" type="image/x-icon">
    <!-- Bootstrap CSS Link -->
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font awesome CSS Link -->
    <link rel="stylesheet" href="./vendor/fontawesome-free-5.13.0-web/fontawesome-free-5.13.0-web/css/all.min.css">
    <!-- External CSS Style Link -->
    <link rel="stylesheet" href="./css/style.css" media="screen">
    <link rel="stylesheet" href="./css/print.css" media="print">
</head>
<body>
    <!-- 
        |***********************************|
        |            F  O  R  M             |
        |***********************************|
    -->
    


    <div class="container">
        <div class="my-3">
            <div class="col-lg-7 mx-auto">
                <div class="card border-0 rounded shadow-sm">
                    <!-- slip -->
                    <div class="card-body px-5" id="print">
                        <!-- company logo -->
                        <a href="javascript:void(0)" class="navbar-brand">
                            <!-- sidebar brand image -->
                            <img src="./assets/logo/logo.png" class="img-fluid" width="40px" alt="logo">
                            <!-- sidebar brand name -->
                            <span class="sidebar-name text-dark ml-2">
                                PMT
                            </span>
                        </a>
                        <!-- subtite -->
                        <p class="lead mb-4 mb-md-5 text-center">Vehicle Maintenance Report</p>

                        <!-- vehicle details -->
                        <p class="mb-1">Vehicle plate number: <?php echo $_SESSION['plate_number'] ?></p>
                        <p class="mb-1">Vehicle fleet number: <?php echo $_SESSION['fleet_number'] ?></p>
                        <p class="mb-1">From <?php echo $_SESSION['started'] ?> to <?php echo $_SESSION['ended'] ?></p>
                        
        
                        <p class="mb-1">Number or trips: <?php echo $_SESSION['trip'] ?></p>
                        <p class="mb-1">Date: <?php echo date("D d M, Y"); ?></p>
                        <p class="mb-1">Time: <?php echo date("h:ia"); ?></p>
                        <p class="mb-1">New status: <?php echo $_SESSION['status']; ?>%</p>

                        <!-- QR Code -->
                        <img src="./vendor/qrcode.php?text=<?php echo $_SESSION['plate_number'] ?>,<?php echo $_SESSION['fleet_number'] ?>,<?php echo $_SESSION['status']; ?>,<?php echo date("d-m-Y"); ?> <?php echo date("h:ia"); ?>&url=./index.php&size=350&padding=30" alt="qrcode" class="img-fluid d-block mx-auto my-5">
                    </div>
                    <!-- card footer -->
                    <div class="card-footer noprint">
                        <a href="javascript:window.print()" class="btn btn-blue px-5 py-2 float-right">Print Report</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- jQuery Link -->
    <script src="./vendor/jQuery/jquery-3.5.1.min.js"></script>
    <!-- Popper JS Link -->
    <script src="./vendor/popper.js/umd/popper.min.js"></script>
    <!-- Bootstrap JS Link -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- External JS Script link -->
    <script src="./js/script.js"></script>
    
<script>
    // function print(el){
        // var prtContent = document.getElementById("print");
        // var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        // WinPrint.document.write(prtContent.innerHTML);
        // WinPrint.document.close();
        // WinPrint.focus();
        // WinPrint.print();
        // WinPrint.close();
        // $("#print").printElement();



        // var printContents = document.getElementById("print").innerHTML;
        // var originalContents = document.body.innerHTML;
        // // window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        // document.body.innerHTML = printContents;
        // window.print();
        // window.close();
        // document.body.innerHTML = originalContents;



        // var WinPrint = window.open();
        // WinPrint.document.write(prtContent.innerHTML);
        // WinPrint.print();
        // WinPrint.close();
        
    // }
</script>



    
    

</body>
</html>
<?php ob_flush(); ?>