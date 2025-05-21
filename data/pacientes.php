<?php
//include_once('Connection.php'); //my connection is here


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "inventario_farmacia";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	if (isset($_POST['funcion'])) {
	if($_POST['funcion'] == 'guardar'){

		$fecha = $_POST['fecha'];
		$hora = $_POST['hora'];
		$num_expediente = $_POST['num_expediente'];
		$direccion = $_POST['direccion'];
		$responsable = $_POST['responsable'];
		$antecedentes = $_POST['antecedentes'];
		$fc = $_POST['fc'];
		$spo2 = $_POST['spo2'];
		$Peso = $_POST['Peso'];
		$tratamiento = $_POST['tratamiento'];
		$edad = $_POST['edad'];
		$nombre = $_POST['nombre'];
		$telefono = $_POST['telefono'];
		$consulta = $_POST['consulta'];
		$ta = $_POST['ta'];
		$t = $_POST['t'];
		$hgt = $_POST['hgt'];
		$diagnostico = $_POST['diagnostico'];
		//																																																				$fecha, $edad, $num_expediente, $nombre, $direccion, $telefono, $responsable, $consulta, $antecedentes, $ta, $fc, $t, $spo2, $hgt, $Peso, $diagnostico, $tratamiento

		$sql = "INSERT INTO cat_clientes (fecha, edad, num_expediente, nombre, direccion, telefono, responsable, consulta_por, antecedestes, ta, fc, t, spo2, hgt, peso, diagnostico, tratamiento,hora) VALUES ('".$fecha."','".$edad."','".$num_expediente."','".$nombre."','".$direccion."','".$telefono."','".$responsable."','".$consulta."','".$antecedentes."','".$ta."','".$fc."','".$t."','".$spo2."','".$hgt."','".$Peso."','".$diagnostico."','".$tratamiento."','".$hora."')";

		if ($conn->query($sql) === TRUE) {
	    	echo "New record created successfully";
		} else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;



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
	}




	if($_POST['funcion'] == 'modificar'){

			$codigo = $_POST['codigo'];
			$fecha = $_POST['fecha'];
			$hora = $_POST['hora'];
			$num_expediente = $_POST['num_expediente'];
			$direccion = $_POST['direccion'];
			$responsable = $_POST['responsable'];
			$antecedentes = $_POST['antecedentes'];
			$fc = $_POST['fc'];
			$spo2 = $_POST['spo2'];
			$Peso = $_POST['Peso'];
			$tratamiento = $_POST['tratamiento'];
			$edad = $_POST['edad'];
			$nombre = $_POST['nombre'];
			$telefono = $_POST['telefono'];
			$consulta = $_POST['consulta'];
			$ta = $_POST['ta'];
			$t = $_POST['t'];
			$hgt = $_POST['hgt'];
			$diagnostico = $_POST['diagnostico'];
			//																																																				$fecha, $edad, $num_expediente, $nombre, $direccion, $telefono, $responsable, $consulta, $antecedentes, $ta, $fc, $t, $spo2, $hgt, $Peso, $diagnostico, $tratamiento

			// $sql = "INSERT INTO cat_clientes (fecha, edad, num_expediente, nombre, direccion, telefono, responsable, consulta_por, antecedestes, ta, fc, t, spo2, hgt, peso, diagnostico, tratamiento) VALUES ('".$fecha."','".$edad."','".$num_expediente."','".$nombre."','".$direccion."','".$telefono."','".$responsable."','".$consulta."','".$antecedentes."','".$ta."','".$fc."','".$t."','".$spo2."','".$hgt."','".$Peso."','".$diagnostico."','".$tratamiento."')";

				$sql = "UPDATE cat_clientes SET fecha = '".$fecha."', edad = '".$edad."' , num_expediente ='".$num_expediente."', nombre ='".$nombre."', direccion ='".$direccion."', telefono ='".$telefono."', responsable ='".$responsable."', consulta_por ='".$consulta."', antecedestes ='".$antecedentes."', ta ='".$ta."', fc ='".$fc."', t ='".$t."', spo2 ='".$spo2."', hgt ='".$hgt."', peso ='".$Peso."', diagnostico ='".$diagnostico."', tratamiento ='".$tratamiento."', hora ='".$hora."'	WHERE id = '".$codigo."';";

				// $sql = "UPDATE cat_clientes SET num_expediente ='".$num_expediente."' WHERE id = '".$codigo."';";

			if ($conn->query($sql) === TRUE) {
		    	echo "New record created successfully";
			} else {
		    	echo "Error: " . $sql . "<br>" . $conn->error;

		}
	}


	if($_POST['funcion'] == 'borrar'){

			$codigo = $_POST['codigo'];

				$sql = "DELETE FROM cat_clientes WHERE id = '".$codigo."';";

			if ($conn->query($sql) === TRUE) {
		    	echo "New record created successfully";
			} else {
		    	echo "Error: " . $sql . "<br>" . $conn->error;

		}
	}



}

	//$item->Disconnect();

function obtenerpaciente($a){

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "inventario_farmacia";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "select * from cat_clientes where id = '".$a."';";

			$consulta = $conn->query($sql);
	    	return $consulta;
}
