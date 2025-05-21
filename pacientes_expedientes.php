<?php
require_once('include/session.php');
require_once('data/pacientes.php');
$pacientes=1;

$boton = 'Agregar paciente';

if (isset($_POST['codigomandado'])) {
	$pacientes = obtenerpaciente($_POST['codigomandado']);

	$boton = 'Modificar paciente';

	foreach($pacientes as $p):

		$codigo = $p['id'];
		$fecha = date("Y-m-d", strtotime($p['fecha']));
		$edad = $p['edad'];
		$num_expediente = $p['num_expediente'];
		$nombre = $p['nombre'];
		$direccion = $p['direccion'];
		$telefono = $p['telefono'];
		$responsable = $p['responsable'];
		$consulta_por = $p['consulta_por'];
		$antecedestes = $p['antecedestes'];
		$ta = $p['ta'];
		$fc = $p['fc'];
		$t = $p['t'];
		$spo2 = $p['spo2'];
		$hgt = $p['hgt'];
		$peso = $p['peso'];
		$diagnostico = $p['diagnostico'];
		$tratamiento = $p['tratamiento'];
		$hora = $p['hora'];

	endforeach;

}else{
	$codigo = '';
	$fecha = '';
	$num_expediente = '';
	$nombre = '';
	$direccion = '';
	$telefono = '';
	$responsable = '';
	$consulta_por = '';
	$antecedestes = '';
	$ta = '';
	$fc = '';
	$t = '';
	$spo2 = '';
	$hgt = '';
	$peso = '';
	$diagnostico = '';
	$tratamiento = '';
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

	<title>Pacientes </title>
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

				<input type="button" class="btn btn-default" id="add-pacientes" value="<?php echo $boton; ?>" onclick="agregar();">

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

										<div class="form-group">
											<label class="control-label col-sm-3" for="">Nombre:</label>
											<div class="col-sm-9">
												<input type="text" onkeypress="return valideKeyLetter(event);" class="form-control" id="nombreeee" name="nombreeee" placeholder="Nombre"  tabindex="4" value="<?php echo $nombre; ?>" required="">
											</div>
										</div>
										<!--1.FECHA-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Fecha: </label>
											<div class="col-sm-9">
												<input type="date" class="form-control" id="fecha" name="fecha"  tabindex="1" value="<?php echo $fecha; ?>" required="">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3" for="">Hora: </label>
											<div class="col-sm-9">
												<input type="time" class="form-control" id="hora" name="hora" value="<?php echo $hora; ?>" tabindex="1"  required="">
											</div>
										</div>

										<!--2.EDAD-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Edad:</label>
											<div class="col-sm-9">
												<input type="number" onkeypress="return valideKey(event);" maxlength="50" class="form-control" id="edad" name="edad" placeholder="Edad"  autofocus="" tabindex="2" value="<?php echo $edad; ?>" required="">
											</div>
										</div>

										<!--3.NUMERO DE EXPEDIENTE-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Número Expediente:</label>
											<div class="col-sm-9">
												<input type="number" onkeypress="return valideKey(event);" maxlength="255" class="form-control" id="num_expediente" name="num_expediente" placeholder="Número de Expediente"  autofocus="" tabindex="3" value="<?php echo $num_expediente; ?>" required="">
											</div>
										</div>

										<!--4.NOMBRE DEL PACIENTE-->


										<!--5. DIRECCIÓN-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Dirección:</label>
											<div class="col-sm-9">
												<input type="text" onkeypress="return valideKeyLetter(event);" class="form-control" id="direccion" name="direccion" placeholder="Dirección"  tabindex="5" value="<?php echo $direccion; ?>" required="">
											</div>
										</div>

										<!--6. TELEFONO-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Teléfono:</label>
											<div class="col-sm-9">
												<input type="text"  maxlength="9" class="form-control" id="telefono" name="telefono" placeholder="Teléfono"  autofocus="" tabindex="6" value="<?php echo $telefono; ?>" required="" >
											</div>
										</div>

										<!--7. RESPONSABLE-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Responsable:</label>
											<div class="col-sm-9">
												<input type="text" onkeypress="return valideKeyLetter(event);" maxlength="255" class="form-control" id="responsable" name="responsable" placeholder="Responsable"  autofocus="" tabindex="7" value="<?php echo $responsable; ?>" required="">
											</div>
										</div>

										<!--8. CONSULTA POR-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Consulta por:</label>
											<div class="col-sm-9">
												<input type="text" maxlength="255" class="form-control" id="consulta" name="consulta" placeholder="Consulta por"  autofocus="" tabindex="8" value="<?php echo $consulta_por; ?>" required="">
											</div>
										</div>

										<!--9. ANTECEDENTES-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Antecedentes:</label>
											<div class="col-sm-9">
												<input type="text" maxlength="255" class="form-control" id="antecedentes" name="antecedentes" placeholder="Antecedentes"  autofocus="" tabindex="9" value="<?php echo $antecedestes; ?>" required="">
											</div>
										</div>

										<!--10. T/A-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">T/A:</label>
											<div class="col-sm-9">
												<input type="text" onkeypress="return valideKey(event);" maxlength="50" class="form-control" id="ta" name="ta" placeholder="Presión arterial"  autofocus="" tabindex="10" value="<?php echo $ta; ?>" required="">
											</div>
										</div>

										<!--11. FC-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">FC:</label>
											<div class="col-sm-9">
												<input type="text" onkeypress="return valideKey(event);" maxlength="50" class="form-control" id="fc" name="fc" placeholder="Frecuencia Cardíaca"  autofocus="" tabindex="11" value="<?php echo $fc; ?>" required="">
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
											<label class="control-label col-sm-3" for="">T°:</label>
											<div class="col-sm-9">
												<input type="text" onkeypress="return valideKey(event);" maxlength="50" class="form-control" id="t" name="t" placeholder="Temperatura"  autofocus="" tabindex="12" value="<?php echo $t; ?>" required="">
											</div>
										</div>

										<!--13. SPO2-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Spo2:</label>
											<div class="col-sm-9">
												<input type="text" onkeypress="return valideKey(event);" maxlength="50" class="form-control" id="spo2" name="spo2" placeholder="Saturación de oxígeno"  autofocus="" tabindex="13" value="<?php echo $spo2; ?>" required="">
											</div>
										</div>

										<!--14. HGT-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">HGT:</label>
											<div class="col-sm-9">
												<input type="text" onkeypress="return valideKey(event);" maxlength="255" class="form-control" id="hgt" name="hgt" placeholder="Hemoglucotes"  autofocus="" tabindex="14" value="<?php echo $hgt; ?>" required="">
											</div>
										</div>

										<!--15. PESO-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">PESO:</label>
											<div class="col-sm-9">
												<input type="number" onkeypress="return valideKey(event);" maxlength="50" class="form-control" id="Peso" name="Peso" placeholder="Peso"  autofocus="" tabindex="15" value="<?php echo $peso; ?>" required="">
											</div>
										</div>

										<!--16. DIAGNÓSTICO-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Diagnóstico:</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="diagnostico" name="diagnostico" placeholder="Dagnóstico"  autofocus="" tabindex="16" value="<?php echo $diagnostico; ?>" required="">
											</div>
										</div>

										<!--17. PLAN DE TRATAMIENTO-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="">Plan de Tratamiento:</label>
											<div class="col-sm-9">

												<!-- <input type="text" maxlength="50" class="form-control" id="tratamiento" name="tratamiento" placeholder="Tratamiento"  autofocus="" tabindex="17" value="<?php echo $tratamiento; ?>"> -->


												<textarea class="form-control" id="tratamiento" name="tratamiento" tabindex="17" rows="5" cols="50" required=""><?php echo $tratamiento; ?></textarea>

											</div>
										</div>

									</form>



									<!-- cart -->
								</div>
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

	<?php include_once('modal/cargar_clientes.php'); ?>
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
	  $('#myTable-item2').DataTable();
	function validar(){

		var campos = 'fecha,num_expediente,direccion,responsable,antecedentes,fc,spo2,Peso,tratamiento,edad,nombreeee,telefono,consulta,ta,t,hgt,diagnostico'

		var porciones = campos.split(',')

		for (var i = 0; i < porciones.length; i++) {
			valor = document.getElementById(porciones[i]).value
			if (valor == "") {
				alert("Debe rellenar el campo")
				document.getElementById(porciones[i]).focus()
				exit()
			}
		}

	}

	function agregar(){
		// alert('entro')

		var codigo = $('#codigo').val();
		var fecha = $('#fecha').val();
		var hora = $('#hora').val();
		var num_expediente = $('#num_expediente').val();
		var direccion = $('#direccion').val();
		var responsable = $('#responsable').val();
		var antecedentes = $('#antecedentes').val();
		var fc = $('#fc').val();
		var spo2 = $('#spo2').val();
		var Peso = $('#Peso').val();
		var tratamiento = $('#tratamiento').val();
		var edad = $('#edad').val();
		var nombre = $('#nombreeee').val();
		var telefono = $('#telefono').val();
		var consulta = $('#consulta').val();
		var ta = $('#ta').val();
		var t = $('#t').val();
		var hgt = $('#hgt').val();
		var diagnostico = $('#diagnostico').val();

		var boton = $('#add-pacientes').val();

		if (boton == 'Agregar paciente') {

			validar()

			var funcion = "guardar";

			$.post("<?php echo 'data/pacientes.php'; ?>", {
				codigo:codigo,fecha:fecha,hora:hora,num_expediente:num_expediente,direccion:direccion,responsable:responsable,antecedentes:antecedentes,fc:fc,spo2:spo2,Peso:Peso,tratamiento:tratamiento,edad:edad,nombre:nombre,telefono:telefono,consulta:consulta,ta:ta,t:t,hgt:hgt,diagnostico:diagnostico,funcion:funcion
			}, function(data) {
				alert("Datos almacenados correctamente")
				document.getElementById('fecha').value = ""
				document.getElementById('hora').value = ""
				document.getElementById('num_expediente').value = ""
				document.getElementById('direccion').value = ""
				document.getElementById('responsable').value = ""
				document.getElementById('antecedentes').value = ""
				document.getElementById('fc').value = ""
				document.getElementById('tratamiento').value = ""
				document.getElementById('edad').value = ""
				document.getElementById('nombreeee').value = ""
				document.getElementById('telefono').value = ""
				document.getElementById('ta').value = ""
				document.getElementById('t').value = ""
				document.getElementById('hgt').value = ""
				document.getElementById('diagnostico').value = ""
				document.getElementById('consulta').value = ""
				document.getElementById('spo2').value = ""
				document.getElementById('Peso').value = ""


			});

		}else{

			var funcion = "modificar";

			$.post("<?php echo 'data/pacientes.php'; ?>", {
				codigo:codigo,fecha:fecha,hora:hora,num_expediente:num_expediente,direccion:direccion,responsable:responsable,antecedentes:antecedentes,fc:fc,spo2:spo2,Peso:Peso,tratamiento:tratamiento,edad:edad,nombre:nombreeee,telefono:telefono,consulta:consulta,ta:ta,t:t,hgt:hgt,diagnostico:diagnostico,funcion:funcion
			}, function(data) {
				alert("Datos modificados correctamente")
			});

		}




	}

	function valideKey(evt){

		// code is the decimal ASCII representation of the pressed key.
		var code = (evt.which) ? evt.which : evt.keyCode;

		if(code==8) { // backspace.
			return true;
		} else if(code>=48 && code<=57) { // is a number.
			return true;
		} else{ // other keys.
			return false;
		}
	}

	function valideKeyLetter(event) {
  const key = event.key;
  const isNumber = /\d/.test(key);
  const isTilde = /[áéíóúÁÉÍÓÚ]/.test(key);
  const forbiddenSymbols = /[<>=|;@]/.test(key);

  if (isNumber || forbiddenSymbols) {
    event.preventDefault();
  }

  if (!isTilde && event.getModifierState("Alt")) {
    event.preventDefault();
  }
}



</script>

</body>

</html>
