<?php 
require_once('../class/Stock.php');
$stockList = $stock->mas_vendidos($_POST["fecha_inicio"],$_POST["fecha_fin"]);
	//$connection = mysqli_connect("localhost", "root", "","inventario_farmacia");
	
	//$con=mysqli_connect("localhost", "root", "","inventario_farmacia") or die ('Error en la conexion');  
   // $sql="SELECT item_code, generic_name, type as tipo, SUM(qty) as suma FROM `sales` WHERE date_sold BETWEEN '2023-02-01' AND '2023-02-28'  GROUP BY generic_name ORDER BY SUM(qty) desc";  
    //$resultado=mysqli_query($con,$sql) or die ('Error en el query database');
?>

	<div class="table-responsive">
        <table id="myTable-item" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>codigo</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach($stockList as $fila): 			?>
                    <tr align="center">
                        <td align="left"><?= $fila['item_code']; ?></td>
                        <td align="left"><?= $fila['generic_name']; ?></td>
                        <td align="left"><?= $fila['tipo']; ?></td>
                        <td align="left"><?= $fila['suma']; ?></td>                      
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>

</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-item').DataTable({
           "order": [[ 3, "desc" ]]
        }
        );
    });
</script>

	
	