<?php
require_once('include/session.php'); 
$stock_menu = 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Inventario - SGC</title>
    <link rel="icon" type="image/png" href="IMG/logo_nuevo.png">


    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/plugins/morris.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .btn-print {
            float: right;
        }
        h1.page-header {
            font-weight: 600;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
<div id="wrapper">
    <?php include("navbar.php") ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            
            <!-- Encabezado -->
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <h1 class="page-header"><i class="fa fa-medkit"></i> Inventario de Productos</h1>
                </div>
            </div>

            <!-- Tarjeta con el contenido -->
            <div class="card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0"><i class="fa fa-list"></i> Lista de productos en stock</h4>
                    <button class="btn btn-success btn-sm" id="stock-report">
                        <i class="fa fa-print"></i> Imprimir
                    </button>
                </div>

                <div id="all-stock"></div>
            </div>

        </div>
    </div>
</div>

<!-- Modales -->
<?php include_once('modal/confirmation.php'); ?>
<?php include_once('modal/message.php'); ?>

<!-- Scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/jquery-1.12.3.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
<script src="assets/js/regis.js"></script>
</body>
</html>
