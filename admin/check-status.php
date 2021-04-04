<?php $page = 'check vehicle'; include '../components/header-admin.php'; ?>         

    <!-- 
        |***********************************|
        |            F  O  R  M             |
        |***********************************|
    -->
    <div class="form-2 mb-5">
        <div class="col-lg-7 mx-auto">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body p-2">
                    <!-- Check vehicle status form -->
                    <form class="my-5 w-100">
                        <h6 class="lead text-center">Scan Code</h6>
                        <br>
                        <!-- Scanner box -->
                        <div class="d-flex justify-content-center">
                            <video id="preview" width="400" height="400"></video>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> 


    <!-- 
        |*************************************************************************|
        |           S C A N           R E S U L T            M O D A L            |
        |*************************************************************************|
    -->
    <div class="modal fade" id="vehicle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- modal header -->
                <div class="modal-header">
                    <!-- header title -->
                    <i class="fas fa-qrcode" style="font-size: 20px;"></i>
                    &nbsp;
                    &nbsp;
                    <h6 class="font-weight-bold">Scan Result</h5>
                    <!-- modal close btn -->
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                </div>
                <!-- modal body -->
                <div class="modal-body text-center">
                    <!-- Scan result container
                        (
                            This result is gotten using javascript in the script below
                        )
                     -->
                    <div class="qr-content mb-4 text-left"></div>
                    
                    <!-- Done btn which also dismisses the modal -->
                    <button type="button" data-dismiss="modal" class="btn btn-blue px-5 mb-3">Done</button>
                </div>
            </div>
        </div>
    </div>


     
<!-- including footer-admin.php -->
<?php include '../components/footer-admin.php' ?>
<!-- link to instascan.min.js library -->
<script src="../vendor/instascan.min.js"></script>

<!-- Script -->
<script type="text/javascript">
    // get the video tag above
    const args = { video: document.getElementById('preview'), mirror: false };

    window.URL.createObjectURL = (stream) => {
        args.video.srcObject = stream;
        return stream;
    }; 

    // storing an instance of instascan.scanner class in a variable
    const scanner = new Instascan.Scanner(args);
    
    // Getting the camera
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No camera found!!');
        }
    }).catch(function (e){
        console.error(e);
    });

    // once the qr code if scanned, this function is carried out
    scanner.addListener('scan', function(content) {
        // this convert the ifo gotten from the QR Code into an array
        let qrContent = content.split(",");
        console.log(typeof qrContent);
        // once the snan result modal shows it does this function
        $('#vehicle').on('show.bs.modal', function(){
            // content to be rendered to the browser

            if (qrContent[1] == undefined && qrContent[2] == undefined && qrContent[3] == undefined ) {
                $('.modal .qr-content').html(`
                    <h5 class="my-4 text-muted text-center" id="comment"></h5> 
                `);
            } else {
                $('.modal .qr-content').html(`
                    <h6 class="font-weight-bold">Vehicle Plate number: ${qrContent[0]}</h6> 
                    <p class="mb-1">Vehicle Fleet number: ${qrContent[1]}</p> 
                    <p class="mb-1">Vehicle Status: ${qrContent[2]}%</p> 
                    <p class="mb-1">Date and Time: ${qrContent[3]}</p> 
                    <h5 class="my-4 text-muted text-center" id="comment"></h5> 
                `);
            }
            

            // condition controlling the comment
            if(qrContent[2] < 30){
                document.getElementById('comment').innerHTML = `
                    <i class="fas fa-times-circle fa-4x text-danger"></i> 
                    <br />
                    <br />
                    This vehicle is due for maintainance!
                `;
            } else if(qrContent[2] < 70){
                document.getElementById('comment').innerHTML = `
                    <i class="fas fa-exclamation-circle fa-4x text-warning"></i> 
                    <br />
                    <br />
                    This vehicle is not in its best state!
                `;
            } else if(qrContent[2] <= 100){
                document.getElementById('comment').innerHTML = `
                    <i class="fas fa-check-circle fa-4x text-success"></i> 
                    <br />
                    <br />
                    This vehicle is in good condition!
                `;
            } else {
                document.getElementById('comment').innerHTML = `
                    <i class="fas fa-exclamation-triangle fa-4x text-danger"></i> 
                    <br />
                    <br />
                    Invalid QR Code!
                `;
            }

            setInterval(() => {
                $('button[data-dismiss="modal"]').trigger('click');
                window.location('manage-vehicles.php');
            }, 60000);
        });
        // show modal
        $('#vehicle').modal('show');
    });

</script>



