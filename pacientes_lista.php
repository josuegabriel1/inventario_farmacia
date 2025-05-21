<?php
 require_once('include/session.php');
 $pacientes_lista=1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de pacientes - SGC</title>
    <link rel="icon" type="image/png" href="IMG/logo_nuevo.png">

    <!-- Bootstrap 3 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/plugins/morris.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <style>
        #pacientes_lista table {
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
            border-radius: 8px;
            overflow: hidden;
        }
        #pacientes_lista th {
            background-color: #222;
            color: white;
            text-align: center;
        }
        #pacientes_lista tbody tr:hover {
            background-color: #f5f5f5;
        }
        #pacientes_lista .btn {
            margin: 2px;
            font-weight: bold;
        }
        .page-header {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <?php include ("navbar.php")?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ver Pacientes</h1>
                </div>
            </div>

            <button class="btn btn-success btn-sm mb-3" id="imprimir_pacientes">
                <i class="fa fa-print"></i> IMPRIMIR
            </button>

            <div id="pacientes_lista" class="table-responsive"></div>
        </div>
    </div>
</div>

<form action="reporte_paciente.php" method="post" target="_blank" name="reporte" id="reporte">
  <input type="hidden" id="id_pacientee" name="id_pacientee">
</form>

<?php include_once('modal/confirmation.php'); ?>
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
