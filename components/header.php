<?php

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
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
    <!-- 
        ========================  P R E L O A D E R  =======================
    -->
    <div id="preloader">
        <img loading="lazy" src="./assets/preloader/loader (2).gif" alt="preloader">
    </div>

    <!-- 
        |********************************|
        |       W  R  A  P  P  E  R      |
        |********************************|
    -->
    <main>
        
        <!-- 
            |********************************|
            |       S  I  D  E  B  A  R      |
            |********************************|
        -->
        <section class="sidebar bg-white shadow">
            <!-- Sidebar brand -->
            <a href="" class="sidebar-brand bg-blue">
                <!-- sidebar brand image -->
                <img src="./assets/logo/logo.png" class="img-fluid" width="40px" alt="logo">
                <!-- sidebar brand name -->
                <span class="sidebar-name ml-2">
                    PMT
                </span>
            </a>

            <!-- side bar navigation menu -->
            <div class="sidebar-collapse">
            

                <ul class="sidebar-nav list-unstyled">
                    <!-- sidebar item -->
                    <li class="sidebar-item">
                        <!-- sidebar link -->
                        <a href="home.php" class="sidebar-link border-bottom <?php if($page == 'home') {echo 'active';} ?>">
                            Home
                        </a>
                    </li>

                    <!-- sidebar item -->
                    <li class="sidebar-item">
                        <!-- sidebar link -->
                        <a href="check-vehicle.php" class="sidebar-link border-bottom <?php if($page == 'check vehicle') {echo 'active' ;} ?>">
                            Check Vehicle Status
                        </a>
                    </li>

                    <!-- sidebar item -->
                    <li class="sidebar-item">
                        <!-- sidebar link -->
                        <a href="check-record.php" class="sidebar-link border-bottom <?php if($page == 'check record') {echo 'active' ;} ?>">
                            Check Vehicle Status Records
                        </a>
                    </li>

                    <!-- sidebar item -->
                    <li class="sidebar-item">
                        <!-- sidebar link -->
                        <a href="javascript:void(0)" data-target="#logout" data-toggle="modal" id="logout-btn" class="sidebar-link border-bottom">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <!-- 
            |*****************************************************|
            |         L  O  G  O  U  T       M  O  D  A  L        |
            |*****************************************************|
        -->
        <div class="modal fade" id="logout">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h6 class="mb-3">Are you sure you want to logout?</h6>
                        <!-- logout form -->
                        <form action="./php/controllers/logout.php" class="d-inline-block">
                            <!-- logout submit button -->
                            <button type="submit" class="btn btn-orange px-5">Yes</button>
                        </form>
                        <button type="button" data-dismiss="modal" class="btn btn-blue px-5 ml-2">No</button>
                    </div>
                </div>
            </div>
        </div>








        <!-- 
            |***********************************|
            |       M  A  I  N  B  O  D  Y      |
            |***********************************|
        -->
        <section class="mainbody">
            <!-- 
                |***********************************|
                |         N  A  V  B  A  R          |
                |***********************************|
            -->
            <nav class="navbar <?php if($page == 'home') {echo 'unscrolled';} else {echo 'scrolled shadow-sm';} ?> navbar-light fixed-top">
                <a href="" class="navbar-brand d-lg-none">
                    <!-- sidebar brand image -->
                    <img src="./assets/logo/logo.png" class="img-fluid" width="40px" alt="logo">
                    <!-- sidebar brand name -->
                    <span class="sidebar-name text-white ml-2">
                        PMT
                    </span>
                </a>
                
                <!-- navbar nav -->
                <ul class="ml-auto navbar-nav">
                    <!-- nav-item -->
                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- nav link -->
                        <a href="javascript:void(0)" class="nav-link">
                            Welcome, 
                            <?php echo $_SESSION['plate_number']; ?>
                        </a>
                    </li>
                </ul>
                
                <!-- sidebar toggler btn -->
                <button class="navbar-toggler border-0 d-lg-none ml-3">
                    <span class="navbar-toggler-bar bg-white w-100"></span>
                    <span class="navbar-toggler-bar bg-white w-75"></span>
                    <span class="navbar-toggler-bar bg-white w-100"></span>
                </button>

            </nav>
