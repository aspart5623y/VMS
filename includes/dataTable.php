<link rel="stylesheet" href="../vendor/DataTable.net/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../vendor/DataTable.net/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

<style>
    
    /* 
        |**************************************|
        |       D  A  T  A  T  A  B  L  E      |
        |**************************************|
    */

    ul.pagination {
        margin-top: 60px;
    }
    ul.pagination .page-item .page-link{
        border: none;
        margin: 0px 10px;
        color: gray;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 30px;
        width: 30px;
        box-shadow: none;
        text-align: center;
    }
    ul.pagination .page-item.next .page-link{
        visibility: hidden;
    }
    ul.pagination .page-item.next .page-link::after{
        content: '>>';
        visibility: visible;
        position: absolute;
    }
    ul.pagination .page-item.previous .page-link{
        visibility: hidden;
    }
    ul.pagination .page-item.previous .page-link::after{
        content: '<<';
        visibility: visible;
        position: absolute;
    }
    ul.pagination .page-item.active .page-link {
        border-radius: 50%;
        background-color: #f69657;
        color: white;
    }



</style>

<script src="../vendor/DataTable.net/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendor/DataTable.net/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../vendor/DataTable.net/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendor/DataTable.net/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
