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

    <title> Ver citas - SGC</title>
    <link rel="icon" type="image/png" href="IMG/logo_nuevo.png">


    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('navbar2.php');?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        </h1>
                    </div>
                </div>
                <form class="" action="citas.php" method="post" id="citassss" name="citassss">
                  <input type="hidden" name="codigo_cita" id="codigo_cita" value="">
                  <input type="hidden" name="id_pacinte_cita" id="id_pacinte_cita" value="">
                  <input type="hidden" name="nombre_cita" id="nombre_cita" value="">
                  <input type="hidden" name="fecha_cita" id="fecha_cita" value="">
                  <input type="hidden" name="hora_cita" id="hora_cita" value="">
                  <input type="hidden" name="telefono_cita" id="telefono_cita" value="">
                  <input type="hidden" name="motivo_cita" id="motivo_cita" value="">
                </form>

               <div id="all-item_citas"></div>

            </div>


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include_once('modal/add_new_item.php'); ?>
<?php include_once('modal/message.php'); ?>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/regis.js"></script>

<script type="text/javascript">

</script>

</body>

</html>
