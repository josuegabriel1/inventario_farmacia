<?php
    require_once('../class/Stock.php');
    $pacientes = $stock->pacientes_lista();

    // echo '<pre>';
    //     print_r($pacientes);
    // echo '</pre>';
 ?>
<br />
<div class="table-responsive">
        <table id="myTable-stock" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center>Nombre</center></th>
                    <th><center>No. Expediente</center></th>
                    <th><center>Fecha</center></th>
                    <th><center>Edad</center></th>
                    <th><center>Telefono</center></th>
                    <th><center>Antecedentes</center></th>
                    <th><center>Tratamiento</center></th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($pacientes as $p):
                $fecha = date("d-m-Y", strtotime($p['fecha']));
                ?>
                <tr align="center">
                    <td><?= $p['nombre']; ?></td>
                    <td><?= $p['num_expediente']; ?></td>
                    <td><?= $fecha; ?></td>
                    <td><?= $p['edad']; ?></td>
                    <td><?= $p['telefono']; ?></td>
                    <td><?= $p['antecedestes']; ?></td>
                    <td><?= $p['tratamiento']; ?></td>
                    <td>

                        <input type="button" class="btn btn-success btn-sm" value="Ver" onclick="a = <?php echo $p['id']; ?>; modificar(a)">
                        <input type="button" class="btn btn-danger btn-sm" value="Borrar" onclick="a = <?php echo $p['id']; ?>; confirmar(a)">
                        <input type="button" class="btn btn-warning btn-sm" value="Reporte" onclick="a = <?php echo $p['id']; ?>; imprimir(a)">


                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>

<form id="mandar" method="post" action="pacientes.php">
    <input type="hidden" id="codigomandado" name="codigomandado" vale="1">
</form>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-stock').DataTable();
    });


    function modificar(a){
        document.getElementById('codigomandado').value = a
        document.getElementById('mandar').submit()
    }

    function imprimir(a){
        document.getElementById('id_pacientee').value = a
        document.getElementById('reporte').submit()
    }

    function borrar(a){

        funcion = 'borrar';
        codigo = a;

        $.post("<?php echo 'data/pacientes.php'; ?>", {
        codigo:codigo,funcion:funcion
        }, function(data) {
          alert("Datos borrados correctamente")
          window.location.href = 'pacientes_lista.php';
      });
    }

    //Confirma si queremos eliminar un registro o no.
    function confirmar(a){
        if(confirm("¿Estas seguro de eliminar el registro?")){
            borrar(a)
        }
        {
            return false;
        }
    }


</script>

<?php
$stock->Disconnect();
 ?>
