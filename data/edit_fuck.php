<?php 
require_once('../class/Stock.php');

	$item_id = $_POST['item_id'];
	$qty = $_POST['qty'];
	$xDate = $_POST['xDate'];
	$manu = $_POST['manu'];
	$purc = $_POST['purc'];

	 $link = mysqli_connect("localhost", "root", "","inventario_farmacia");
    // Chequea coneccion
    if($link === false){
        echo die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }

		$connection = mysqli_connect("localhost", "root", "","inventario_farmacia");
		///$query = "UPDATE stock set stock_qty='" . $qty . "', stock_expiry='2015-01-01', stock_manufactured='2015-01-01', stock_purchased='2015-01-01' WHERE item_id ='" . $item_id . "'";
		$query = "UPDATE stock set stock_qty='" . $qty . "', stock_expiry='" . $xDate . "', stock_manufactured='" . $manu . "', stock_purchased='" . $purc ."' WHERE item_id ='" . $item_id . "'";
		mysqli_query($connection, $query);
		echo $qty." ".$item_id." ".$xDate." ".$manu." ".$purc." siii";
	//$saveStock = $stock->edit_fuck($item_id, $qty, $xDate, $manu, $purc);
//end isset
