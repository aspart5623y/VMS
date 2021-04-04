<?php $page = 'home'; include './components/header.php'; ?>
            
            <!-- 
                |***********************************|
                |      M  A  S  T  H  E  A  D       |
                |***********************************|
            -->
            <div class="masthead">
                <div class="container">
                    <div class="col-lg-7">
                        <!-- masthead content -->
                        <div class="masthead-content">
                            <!-- masthead title and image -->
                            <img src="./assets/logo/logo.png" width="45px" alt="" class="img-fluid d-none d-lg-inline-block">
                            <h1 class="masthead-title text-white font-weight-bold d-inline-block ml-lg-2" style="top: 7px;">Peace Mass </h1>
                            &nbsp;
                            <h1 class="masthead-title text-orange font-weight-bold d-inline-block" style="top: 7px;"> Transit</h1>
                            <!-- divider -->
                            <hr class="border-bottom" style="border-color: #d8854e !important;">
                            <!-- masthead sub title -->
                            <h4 class=" text-white">Vehicle Maintenance System</h4>
                            <!-- masthead text -->
                            <p class="text-white">
                                In order to ensure that our vehiles are sound at all time and do not break down unexpectedly,
                                we designed this software to help check and maintain all our vehicles. Therefore, drivers of each bus is expected to check his/her vehicle status after work everyday.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- masthead overlay -->
                <div class="masthead-overlay"></div>
            </div>



            <!-- 
                |**************************************|
                |      S  E  C  T  I  O  N  -  1       |
                |**************************************|
            -->
            <div class="section-1 py-5 mb-5">
                <div class="container">
                    <h3 class="section-1-title text-center">What We Do</h3>
                    <div class="row mt-5">
                        <!-- section 1 card -->
                        <div class="col-lg-4">
                            <div class="card my-3 rounded border-0 shadow">
                                <!-- card body -->
                                <div class="card-body">
                                    <img src="./assets/images/1.png" class="img-fluid" alt="" class="card-image-top">
                                    <h5 class="text-muted">Sound Vehicle</h5>
                                    <p class="text-muted">
                                        We ensure that our vehicles engines and other essentiall parts are in good condition.
                                    </p>
                                                                        
                                </div>
                            </div>
                        </div>
 
                        <!-- section 2 card -->
                        <div class="col-lg-4">
                            <div class="card my-3 rounded border-0 shadow">
                                <!-- card body -->
                                <div class="card-body">
                                    <img src="./assets/images/4.png" class="img-fluid" alt="" class="card-image-top">
                                    <h5 class="text-muted">Optimum Maintenance</h5>
                                    <p class="text-muted">
                                        We ensure that maintenance is carried out on all our vehicles at due time.
                                    </p>
                                                                        
                                </div>
                            </div>
                        </div>

                        <!-- section 3 card -->
                        <div class="col-lg-4">
                            <div class="card my-3 rounded border-0 shadow">
                                <!-- card body -->
                                <div class="card-body">
                                    <img src="./assets/images/2.png" class="img-fluid" alt="" class="card-image-top">
                                    <h5 class="text-muted">Vehicle Pass</h5>
                                    <p class="text-muted">
                                        We ensure that our drivers print a vehicle pass which would be scanned before the vehicle is allowed to go on a trip.
                                    </p>
                                                                        
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>


        <?php include './components/footer.php' ?>
        
            <!-- internal JS Script -->
            <script>
                //change nav bg color
                $(window).scroll(function(){
                    if($(this).scrollTop() > 380){

                        $('nav').addClass('scrolled');
                        $('nav').addClass('shadow-sm');
                        $('nav').removeClass('unscrolled');
                    } else {
                        $('nav').removeClass('scrolled');
                        $('nav').removeClass('shadow-sm');
                        $('nav').addClass('unscrolled');
                    }


                });
                // change nav color
                $(window).scroll(function(){
                    if($(this).scrollTop() > 420){
                        $('.nav-link').removeClass('text-white');
                    } else {
                        $('.nav-link').addClass('text-white')
                    }
                });
            </script>