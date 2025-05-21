<?php
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM item_type
		ORDER BY item_type_desc ASC";
$types = $db->getRows($sql);
// echo '<pre>';
// 	print_r($types);
// echo '</pre>';

$con=mysqli_connect("localhost", "root", "","inventario_farmacia") or die ('Error en la conexion');
$sql="SELECT * FROM `cat_clientes`";
$resultado=mysqli_query($con,$sql) or die ('Error en el query database');
 ?>
<div class="modal fade" id="modal-item2">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="cerrarodal">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">

				<div class="table-responsive">
				  <table id="myTable-item2" class="table table-bordered table-hover table-striped">
				    <thead>
				      <tr>
				        <th>Código</th>
				        <th>Nombre</th>
				        <th>Telefono</th>
				        <th>Edad</th>
				         <th>
				          <center>Acciones</center>
				        </th>
				      </tr>
				    </thead>
				    <tbody>
							<?php
							if( mysqli_num_rows( $resultado ) > 0){
							 while($fila = mysqli_fetch_array( $resultado ) ){ ?>
				        <tr align="center">
				          <td align="left"><?= $fila['id']; ?></td>
				          <td align="left"><?= $fila['nombre']; ?></td>
				          <td align="left"><?= $fila['telefono']; ?></td>
				          <td align="left"><?= $fila['edad']; ?></td>
				          <td>
				            <center>
				              <button onclick="document.getElementById('nombreeee').value = '<?= $fila['nombre']; ?>'; document.getElementById('fecha').value = '<?= $fila['fecha']; ?>';document.getElementById('hora').value = '<?= $fila['hora']; ?>';document.getElementById('edad').value = '<?= $fila['edad']; ?>';document.getElementById('num_expediente').value = '<?= $fila['num_expediente']; ?>';document.getElementById('direccion').value = '<?= $fila['direccion']; ?>';document.getElementById('telefono').value = '<?= $fila['telefono']; ?>';document.getElementById('responsable').value = '<?= $fila['responsable']; ?>';document.getElementById('consulta').value = '<?= $fila['consulta_por']; ?>';document.getElementById('antecedentes').value = '<?= $fila['antecedestes']; ?>';document.getElementById('ta').value = '<?= $fila['ta']; ?>';document.getElementById('fc').value = '<?= $fila['fc']; ?>';document.getElementById('t').value = '<?= $fila['t']; ?>';document.getElementById('spo2').value = '<?= $fila['spo2']; ?>';document.getElementById('hgt').value = '<?= $fila['hgt']; ?>';document.getElementById('Peso').value = '<?= $fila['peso']; ?>';document.getElementById('diagnostico').value = '<?= $fila['diagnostico']; ?>';document.getElementById('tratamiento').value = '<?= $fila['tratamiento']; ?>'; document.getElementById('cerrarodal').click();" type="button" class="btn btn-warning btn-xs">Agregar
				                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
				              </button>
				            </center>
				          </td>
				        </tr>
				      <?php  }} ?>
				    </tbody>
				  </table>
				</div>

			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<?php
$db->Disconnect();
 ?>
