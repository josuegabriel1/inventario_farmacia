<?php 
require_once('include/session.php'); 
$home_menu = 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Principal - SGC</title>

    <!-- ✅ Favicon agregado -->
    <link rel="icon" type="image/png" href="IMG/logo_nuevo.png">

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/plugins/morris.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <style>
        .dashboard-card {
            border-radius: 10px;
            transition: transform 0.2s ease;
            text-decoration: none;
            display: block;
        }
        .dashboard-card:hover {
            transform: scale(1.02);
        }
        .dashboard-icon {
            font-size: 3em;
            color: #fff;
        }
        .dashboard-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #fff;
        }
        .card-body {
            padding: 20px;
            color: #fff;
        }

        /* Colores fuertes personalizados */
        .bg-success {
            background-color: #28a745 !important;
        }
        .bg-warning {
            background-color: #ffc107 !important;
        }
        .bg-danger {
            background-color: #dc3545 !important;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <?php include('navbar.php'); ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Título -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Panel Principal</h1>
                </div>
            </div>

            <!-- Tarjetas enlazadas -->
            <div class="row text-center">
                <div class="col-md-3 col-sm-6 mb-4">
                    <a href="pacientes.php" class="dashboard-card">
                        <div class="panel panel-primary" style="box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                            <div class="card-body bg-primary">
                                <i class="fa fa-users dashboard-icon"></i>
                                <div class="dashboard-title mt-2">Pacientes</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-4">
                    <a href="citas.php" class="dashboard-card">
                        <div class="panel panel-success" style="box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                            <div class="card-body bg-success">
                                <i class="fa fa-calendar dashboard-icon"></i>
                                <div class="dashboard-title mt-2">Citas</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-4">
                    <a href="stock.php" class="dashboard-card">
                        <div class="panel panel-warning" style="box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                            <div class="card-body bg-warning">
                                <i class="fa fa-medkit dashboard-icon"></i>
                                <div class="dashboard-title mt-2">Inventario</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-sm-6 mb-4">
                    <a href="productos_vendidos.php" class="dashboard-card">
                        <div class="panel panel-danger" style="box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                            <div class="card-body bg-danger">
                                <i class="fa fa-bar-chart dashboard-icon"></i>
                                <div class="dashboard-title mt-2">Reportes</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-12 text-right mb-2">
                        <a href="compras_dia.php" class="btn btn-success">
                            <i class="fa fa-calendar-check-o"></i> Compras del Día
                        </a>
                    </div>
                </div>
            </div>

            <div id="order"></div>
        </div>
    </div>
</div>

<?php include_once('modal/to_cart.php'); ?>
<?php include_once('modal/confirmation.php'); ?>
<?php include_once('modal/add_new_item.php'); ?>
<?php include_once('modal/message.php'); ?>

<!-- Scripts -->
<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/regis.js"></script>
</body>
</html>
