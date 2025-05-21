<?php
require_once('../class/Item.php');
$items = $item->all_items();
// echo '<pre>';
//     print_r($items);
// echo '</pre>';

$con=mysqli_connect("localhost", "root", "","inventario_farmacia") or die ('Error en la conexion');
$sql="SELECT cat_citas.* FROM cat_citas";
//$sql="SELECT cat_citas.*,cat_clientes.nombre FROM cat_citas, cat_clientes where cat_citas.idpacinte = cat_clientes.id";
$resultado=mysqli_query($con,$sql) or die ('Error en el query database');
?>
<br />
<div class="table-responsive">
  <table id="myTable-item" class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>hora</th>
        <th>Telefono</th>
        <th>Motivo</th>
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
          <td align="left"><?= $fila['nombre']; ?></td>
          <td align="left"><?= $fila['fecha']; ?></td>
          <td align="left"><?= $fila['hora']; ?></td>
          <td align="left"><?= $fila['telefono']; ?></td>
          <td align="left"><?= $fila['motivo']; ?></td>
          <!-- <td><?= "$ ".number_format($it['item_price'], 2); ?></td> -->
          <td>
            <center>
              <button onclick="document.getElementById('codigo_cita').value = '<?= $fila['id']; ?>'; document.getElementById('id_pacinte_cita').value = '<?= $fila['idpacinte']; ?>'; document.getElementById('nombre_cita').value = '<?= $fila['nombre']; ?>'; document.getElementById('fecha_cita').value = '<?= $fila['fecha']; ?>'; document.getElementById('hora_cita').value = '<?= $fila['hora']; ?>'; document.getElementById('telefono_cita').value = '<?= $fila['telefono']; ?>'; document.getElementById('motivo_cita').value = '<?= $fila['motivo']; ?>'; document.getElementById('citassss').submit() " type="button" class="btn btn-warning btn-xs">Editar
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
              </button>
            </center>
          </td>
        </tr>
      <?php  }} ?>
    </tbody>
  </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
$(document).ready(function() {
  $('#myTable-item').DataTable();
});
</script>

<?php
$item->Disconnect();
?>
