<?php $page = 'check vehicle'; include '../components/header-admin.php'; ?>
            
    <!-- 
        |***********************************|
        |            F  O  R  M             |
        |***********************************|
    -->
    <div class="form py-5 mb-5" style="margin-top:120px">
        <div class="col-lg-7 mx-auto">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <!-- Check Status Btn -->
                    <a href="check-status.php" class="btn d-block btn-orange btn-lg px-5 py-4">Open Scanner</a>
                </div>
            </div>
        </div>
    </div>


<?php include '../components/footer-admin.php' ?>

<!-- initializing the tooltip -->
<script>
    $(document).ready(function() {
        $('.tooltip').tooltip();
    });
</script>