<?php
$con=mysqli_connect("localhost", "root", "","inventario_farmacia") or die ('Error en la conexion');
$sql="SELECT * FROM `cat_clientes`";
$resultado=mysqli_query($con,$sql) or die ('Error en el query database');

$codigo_cita = $_POST['codigo_cita'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$telefono = $_POST['telefono'];
$motivo = $_POST['motivo'];


$sql = "UPDATE cat_citas SET idpacinte = '".$codigo."', fecha = '".$fecha."' , telefono ='".$telefono."', motivo ='".$motivo."',  nombre ='".$nombre."',  hora ='".$hora."'	WHERE id = '".$codigo_cita."';";

//$sql = "INSERT INTO cat_citas (idpacinte, fecha, telefono, motivo) VALUES ('".$codigo."','".$fecha."','".$telefono."','".$motivo."')";

if ($con->query($sql) === TRUE) {
		echo "New record created successfully";
} else {
		echo "Error: " . $sql . "<br>" . $con->error;



/*
$saveItem = $pacientes->add_item($fecha, $edad, $num_expediente, $nombre, $direccion, $telefono, $responsable, $consulta, $antecedentes, $ta, $fc, $t, $spo2, $hgt, $Peso, $diagnostico, $tratamiento);
if($saveItem){
	$return['valid'] = true;
	$return['msg'] = "Nuevo registro agregado con éxito!";
}else{
	$return['valid'] = false;
}
echo json_encode($return);*/
}//end isset

 ?>
