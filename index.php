<?php

    // include database
    include './php/config/db_connect.php';
    ob_start();


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
    <link rel="stylesheet" href="./css/auth.css">
</head>
<body>
    
    <!-- 
        ========================  P R E L O A D E R  =======================
    -->
    <!-- <div id="preloader">
        <img loading="lazy" src="./assets/preloader/loader (2).gif" alt="preloader">
    </div> -->

  
    <main class="login">
        <section class="login-content">
            <!-- 
                |***********************************|
                |         N  A  V  B  A  R          |
                |***********************************|
            -->
            <nav class="navbar navbar-light fixed-top">
                <div class="container">
                    <a href="" class="navbar-brand">
                        <!-- sidebar brand image -->
                        <img src="./assets/logo/logo.png" class="img-fluid" width="40px" alt="logo">
                        <!-- sidebar brand name -->
                        <span class="sidebar-name text-white ml-2">
                            PMT
                        </span>
                    </a>
                </div>
            </nav>



            <!-- 
                |***********************************|
                |            F  O  R  M  S          |
                |***********************************|
            -->
            <div class="form">
                

                <div class="container">
                    <div class="col-lg-4 text-center mb-5 mx-auto">
                        <!-- company logo -->
                        <img src="./assets/logo/logo.png" width="50px" alt="" class="img-fluid">
                        <!-- text -->
                        <h5 class="text-white mt-2">Login</h5>
                    </div>

                    <!-- Navigations -->
                    <div class="col-lg-4 mx-auto">
                        <!-- nav -->
                        <ul class="nav nav-tabs nav-justified">
                            <!-- nav item -->
                            <li class="nav-item">
                                <!-- nav link -->
                                <a href="#user" data-toggle="tab" class="nav-link active">
                                    User Login
                                </a>
                            </li>
                            <!-- nav item -->
                            <li class="nav-item">
                                <!-- nav link -->
                                <a href="#admin" data-toggle="tab" class="nav-link">
                                    Admin Login
                                </a>
                            </li>
                        </ul>

                        <!-- tab content -->
                        <div class="tab-content">
                            <!-- tab pane -->
                            <div class="tab-pane active" id="user">
                                <!-- 
                                    |**********************************************|
                                    |        U  S  E  R        L  O  G  I  N       |
                                    |**********************************************|
                                -->
                                <form class="my-5 w-100 text-center" method="POST">
                                    <!-- include the user login form controller -->
                                    <?php
                                        include './php/controllers/user_login.php';
                                    ?>


                                    <!-- input group -->
                                    <div class="input-group mx-auto mt-5 mb-3">
                                        <!-- input group prepend -->
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <!-- icon -->
                                                <i class="fas fa-car-crash" style="font-size: 20px;"></i>
                                            </span>
                                        </div>

                                        <!-- input box -->
                                        <input type="text" name="plate_number" class="form-control" placeholder="Vehicle Plate Number" value="<?php echo $plate_number; ?>">
                                    </div>

                                    <!-- error message -->
                                    <p class="text-white text-left">
                                        <?php echo $error; ?>
                                    </p>

                                    <!-- submit button -->
                                    <button type="submit" name="user_login" class="btn btn-orange w-100 py-2">Login</button>
                                </form>
                            </div>

                            <!-- tab pane -->
                             <div class="tab-pane fade" id="admin">
                                <!-- 
                                    |*************************************************|
                                    |        A  D  M  I  N        L  O  G  I  N       |
                                    |*************************************************|
                                -->
                                <form class="my-5 w-100 text-center" method="POST">
                                    <!-- include the admin login form controller -->
                                    <?php
                                        include './php/controllers/admin_login.php';
                                    ?>
                                    
                                    <!-- input group -->
                                    <div class="input-group mx-auto mt-5">
                                        <!-- input prepend -->
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <!-- icon -->
                                                <i class="fas fa-envelope-open" style="font-size: 20px;"></i>
                                            </span>
                                        </div>
                                        <!-- input box -->
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
                                    </div>
                                     <!-- error message -->
                                    <p class="text-white text-left">
                                        <?php echo $errors['email']; ?>
                                    </p>


                                    <!-- input group -->
                                    <div class="input-group mx-auto mt-3">
                                        <!-- input prepend -->
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <!-- icon -->
                                                <i class="fas fa-key" style="font-size: 20px;"></i>
                                            </span>
                                        </div>
                                        <!-- input box -->
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <!-- error message -->
                                    <p class="text-white text-left mb-5">
                                        <?php echo $errors['password']; ?>
                                    </p>


                                    <!-- submit btn -->
                                    <button type="submit" name="admin_login" class="btn btn-orange w-100 py-2">Login</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>


    <?php include './components/footer.php' ?>

<?php ob_flush() ?>
