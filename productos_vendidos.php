<?php 
require_once('include/session.php'); 
require_once('data/pacientes.php');
$pacientes=1;

$boton = 'Generar';


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGC </title>
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
        <?php include('navbar.php');?>

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
                <form class="form-horizontal" role="form" id="form-pacientes" >

                <!--  <button class="btn btn-default" id="add-pacientes" value="add" onclick="agregar()">Agregar paciente
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </button> -->

                <input type="button" class="btn btn-success " id="botton_vendidos" value="<?php echo $boton; ?>" >

                <div id="orderSS">
                    <BR>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-body">
                <!-- start item -->
				<input type="hidden" id="item-id">
				<input type="hidden" id="codigo" value="<?php echo $codigo; ?>">
				<!--INICIO DEL PRIMER FORMULARIO PACIENTES-->
				<!--1.FECHA-->
                 <div class="form-group">
				    <label class="control-label col-sm-3" for="">Fecha Inicio: </label>
				    <div class="col-sm-9"> 
				      <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"  tabindex="1"  required="">
				    </div>
				  </div>              

                <!-- end item -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
          
            <div class="panel-body">
                <!-- cart -->
                
				<input type="hidden" id="item-id">
				<!--INICIO DEL SEGUNDO FORMULARIO PACIENTES-->
				

				  

				  <!--12. TEMPERATURA-->
                <div class="form-group">
				    <label class="control-label col-sm-3" for="">Fecha Fin: </label>
				    <div class="col-sm-9"> 
				      <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"  tabindex="2"  required="">
				    </div>
				  </div> 

				  
				
				</form>

                        

                <!-- cart -->
            </div>
        </div>
    </div>

	    <div class="col-md-12">
        <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- <button class="btn btn-success btn-sm" id="imprimir_pacientes">IMPRIMIR
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                </button> -->
               <div id="mas_vendidos"></div>

            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>



                </div>         
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include_once('modal/to_cart.php'); ?>
<?php include_once('modal/confirmation.php'); ?>
<?php include_once('modal/add_new_item.php'); ?>
<?php include_once('modal/message.php'); ?>

    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/js/regis.js"></script>

<script>

$('#botton_vendidos').click(function (){

	fecha_inicio = $("#fecha_inicio").val();
	fecha_fin = $("#fecha_fin").val();


	if(fecha_inicio == ""){
		alert("Debe de seleccionar la fecha de inicio");
	}else if(fecha_fin == ""){
		alert("Debe de seleccionar la fecha de fin");
		
	}else{
		$.ajax({
			  url: 'data/mas_vendidos.php',
			  type: 'post',
			  data: {
					  fecha_inicio: fecha_inicio,
					  fecha_fin: fecha_fin,
					  
				  },
			  success: function (data) {
				  $('#mas_vendidos').html(data);
			  },
			  error: function () {
				  eMsg('275');
			  }
		  });

	}




});



</script>

</body>

</html>
