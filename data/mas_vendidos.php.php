<?php 
require_once('../class/Stock.php');

	//$connection = mysqli_connect("localhost", "root", "","inventario_farmacia");
	
	$con=mysqli_connect("localhost", "root", "","inventario_farmacia") or die ('Error en la conexion');  
    $sql="SELECT item_code, generic_name, type, SUM(qty) as suma FROM `sales` WHERE date_sold BETWEEN '2023-02-01' AND '2023-02-28'  GROUP BY generic_name ORDER BY SUM(qty) desc";  
    $resultado=mysqli_query($con,$sql) or die ('Error en el query database');
?>

	<div class="table-responsive">
        <table id="myTable-item" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php if( $resultado ){

  //Ahora valida que la consuta haya traido registros
  					if( mysqli_num_rows( $resultado ) > 0){ 
						 while($fila = mysqli_fetch_array( $resultado ) ){	
						?>
                    <tr align="center">
                        <td align="left"><?= $fila['NOMBRE']; ?></td>
                        <td align="left"><?= $fila['NOMBRE']; ?></td>
                        <td align="left"><?= $fila['NOMBRE']; ?></td>
                        <td align="left"><?= $fila['NOMBRE']; ?></td>                      
                    </tr>
                <?php } } } ; ?>
            </tbody>
        </table>
</div>
	
	
