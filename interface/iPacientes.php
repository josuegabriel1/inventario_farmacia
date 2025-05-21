<?php 
interface iPacientes{
	public function all_items();
	//public function get_item($item_id);
	public function add_item($fecha, $edad, $num_expediente, $nombre, $direccion, $telefono, $responsable, $consulta, $antecedentes, $ta, $fc, $t, $spo2, $hgt, $Peso, $diagnostico, $tratamiento);
	//public function edit_item($item_id, $iName, $iPrice, $type_id, $code, $brand, $grams);
}//end iItem