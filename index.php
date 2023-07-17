<?php
session_start();
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "main";
}
$page_logined = $page;
  
if (isset($_SESSION['member_id'])) {
    $logined = true;
    $member_id = $_SESSION['member_id'];
    if (!isset($_SESSION['hcode'])) {
        $hcode = '12275';
        $_SESSION['hcode'] = $hcode;
    }
} else {
    $logined = false;
    $page = "title"; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ประเมินคุณภาพผู้ป่วยนอก รพ.สิรินธร จ.ขอนแก่น</title>
    <link rel="stylesheet preload prefetch preconnect" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" as="style" crossorigin="anonymous">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="../node_modules/select2-bootstrap4-theme/dist/select2-bootstrap4.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../node_modules/DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../node_modules/DataTables/Buttons-2.2.3/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../node_modules/css/style.css">
    <link rel="stylesheet" href="../node_modules/css/form_style.css">
    <link rel="stylesheet" href="vip.css">

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/select2/dist/js/select2.min.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script type="text/javascript" src="../node_modules/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/DataTables-1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/Buttons-2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/Buttons-2.2.3/js/buttons.print.min.js"></script>



    <script src="toruskit.min.js"></script>
    


    <style>
        <?php include("../audit_opd/checkbox.css"); ?>
    </style>


</head>
<body>

<?php
include './includes/header.php';
include($page.".php");
?>
</div>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<script>

$('[data-toggle="tooltip"]').tooltip(); 
</script>

</body>
</html>