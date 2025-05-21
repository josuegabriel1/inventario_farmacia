<?php 
require_once('include/session.php'); 
$item_menu=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Lista de productos - SGC</title>
    <link rel="icon" type="image/png" href="IMG/logo_nuevo.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link href="assets/css/plugins/morris.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <style>
        .card-lista-productos {
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            background-color: #ffffff;
            margin-top: 20px;
        }
        #all-item table thead {
            background-color: #343a40;
            color: white;
        }
        #all-item table tbody tr:hover {
            background-color: #f1f1f1;
        }
        #add-new-item {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <?php include('navbar.php');?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-lista-productos">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3><i class="fa fa-list"></i> Lista de productos</h3>
                                <button class="btn btn-success" id="add-new-item">
                                    <i class="fa fa-plus-circle"></i> Agregar producto
                                </button>
                            </div>
                            <div id="all-item"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once('modal/add_new_item.php'); ?>
<?php include_once('modal/message.php'); ?>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/regis.js"></script>
</body>

</html>