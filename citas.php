<?php
require_once('include/session.php');
$item_menu=1;


if (isset($_POST['codigo_cita'])) {
  $codigo_cita = $_POST['codigo_cita'];
  $id_pacinte_cita = $_POST['id_pacinte_cita'];
  $nombre_cita = $_POST['nombre_cita'];
  $fecha_cita = $_POST['fecha_cita'];
  $hora_cita = $_POST['hora_cita'];
  $telefono_cita = $_POST['telefono_cita'];
  $motivo_cita = $_POST['motivo_cita'];
//  $fecha_cita = date("d/m/Y", strtotime($fecha_cita));
}else{
  $codigo_cita = "";
  $id_pacinte_cita = "";
  $nombre_cita = "";
  $fecha_cita = "";
  $telefono_cita = "";
  $motivo_cita = "";
}







?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Citas - SGC</title>
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
        <!-- /.row -->
        <?php if (isset($_POST['codigo_cita'])) { ?>
          <button class="btn btn-default" id="add-new-item2">Actualizar Citas</button>
      <?php }else {  ?>
        <button class="btn btn-default" id="add-new-item2">Agregar Citas</button>
        <?php  } ?>
        <div id="orderSS">
          <BR>
            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-success">
                  <div class="panel-body">
                    <!-- start item -->
                    <input type="hidden" id="item-id">
                    <input type="hidden" id="codigo" value="<?php echo $id_pacinte_cita; ?>">
                    <input type="hidden" id="codigo_cita" value="<?php echo $codigo_cita; ?>">
                    <!--INICIO DEL PRIMER FORMULARIO PACIENTES-->
                    <!--1.FECHA-->
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Fecha: </label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="fecha" name="fecha"  tabindex="1" required="" value="<?php echo $fecha_cita; ?>">
                      </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Hora: </label>
                      <div class="col-sm-9">
                        <input type="time" class="form-control" id="hora" name="hora"  tabindex="1" required="" value="<?php echo $hora_cita; ?>">
                      </div>
                    </div>
                    <br>
                    <br>
                    <!--2.EDAD-->
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Nombre:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" tabindex="2" value="<?php echo $nombre_cita; ?>" required="">
                      </div>
                    </div>
                    <br>
                    <br>

                    <!--3.NUMERO DE EXPEDIENTE-->
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Telefono:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono"  autofocus="" tabindex="3" value="<?php echo $telefono_cita; ?>" required="" maxlength="9">
                      </div>
                    </div>


                    <!-- end item -->
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="panel panel-primary">

                  <div class="panel-body">

                    <!--17. PLAN DE TRATAMIENTO-->
                    <div class="form-group">
                      <label class="control-label col-sm-3" for="">Motivo:</label>
                      <div class="col-sm-9">

                        <!-- <input type="text" maxlength="50" class="form-control" id="tratamiento" name="tratamiento" placeholder="Tratamiento"  autofocus="" tabindex="17" value="<?php echo $tratamiento; ?>"> -->


                        <textarea class="form-control" id="motivo" name="motivo" tabindex="17" rows="5" cols="50" required=""><?php echo $motivo_cita; ?></textarea>

                      </div>
                    </div>

                  </form>



                  <!-- cart -->
                </div>
              </div>
            </div>
          </div>



        </div>
        <!-- <div id="all-item"></div> -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->


  <?php include_once('modal/cargar_clientes.php'); ?>
  <?php include_once('modal/add_new_item.php'); ?>
  <?php include_once('modal/message.php'); ?>

  <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="assets/js/regis.js"></script>

  <script type="text/javascript">

  $('#myTable-item2').DataTable();

</script>
</body>

</html>
