<?php 
require_once('../class/Stock.php');
$stockList = $stock->all_stockList();

// echo '<pre>';
//     print_r($stockList);
// echo '</pre>';
 ?>
<br />
<div class="table-responsive">
        <table id="myTable-stocklist" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th><center></center></th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th><center>Fabricado</center></th>
                    <th><center>Comprado</center></th>
                    <th><center>Precio</center></th>
                    <th><center>Cantidad</center></th>
                    <th>Vence</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 


                    $dateNow = date('Y-m');
                    foreach($stockList as $sl): 
                    $xDate = strtotime($sl['stock_expiry']);
                    $xDate = date('Y-m', $xDate);
                    $class = "text-success";
                    if($xDate == $dateNow){ 
                        $class = "text-warning";
                    }


                   
                    // aqui nicia la validacion
                    $validar_dias = 0;
                    $fecha_actual = strtotime(date('Y-m-d'));
                    $fecha_entrada = strtotime($sl['stock_expiry']);
                    $validar = 0;
                    if($fecha_actual > $fecha_entrada){
                       
                    }else{
                        $validar++;
                        $fechaInicial = $sl['stock_expiry'];
                        $fechaActual = date('Y-m-d'); // la fecha del ordenador
                        
                    
                        // Obtenemos la diferencia en milisegundos
                        /*$diff = abs(strtotime($fechaActual) - strtotime($fechaInicial));
                        $years = floor($diff / (365*60*60*24));
                        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));*/


                        $fecha1= new DateTime($sl['stock_expiry']);
                        $fecha2= new DateTime(date('Y-m-d'));
                        $diff = $fecha1->diff($fecha2);

                        // El resultados sera 3 dias
                       // echo $diff->days . ' dias';
                        $validar_dias = $diff->days;
                        
                        
                         $alert = "El producto ".$sl['item_name']." esta a ".$diff->days." dias de vencer" ;
                         
                         if($diff->days > 0 && $diff->days <= 7){

                       
                          ?>

                         <script>alert('<?php echo $alert; ?>')</script>
                            <?php
                              }
                       


                    }
                    ?>
                    <tr  align="center" class="<?= $class; ?>">
                        <td><input type="checkbox" name="stock" value="<?= $sl['stock_id']; ?>"></td>
                        <td align="left"><?= $sl['item_code']; ?></td>
                        <td align="left"><?= ucwords($sl['item_name']); ?></td>
                        <td align="left"><?= $sl['item_type_desc']; ?></td>
                        <td><?= $sl['stock_manufactured']; ?></td>
                        <td><?= $sl['stock_purchased']; ?></td>
                        <td><?= "$ ".number_format($sl['item_price'],2); ?></td>
                        <td><?= $sl['stock_qty']; ?></td>
                        <td align="left" width="110px;"><?= $sl['stock_expiry']; ?>
                            <?php //if($xDate <= $dateNow): ?>
                               <!-- <span class="label label-danger" title="Este Producto ya a Vencido">!</span>-->
                            <?php //endif; ?>
                             <?php if($validar_dias > 0 && $validar_dias <= 7){  ?>
                                <span class="label label-warning" title="Este producto esta próximo a vencer">!</span>
                            <?php }elseif($fecha_actual > $fecha_entrada){
                                ?>
                                <span class="label label-danger" title="Este producto ya a Vencido">!</span>
                             <?php
                            } 
                            // aqui terina la validacion
                            ?>

                        </td>
                        <td>
                            <?php
                                $idddd = $sl['item_id'];
                                $cantidadd = $sl['stock_qty'];
                                $vencee = $sl['stock_expiry'];
                                $fabricadoo = $sl['stock_manufactured'];
                                $compradoo = $sl['stock_purchased'];
                            ?>
                        
                        <center>
                               <button type="button" class="btn btn-warning btn-xs" onclick="arra = [<?php echo $idddd.","."'$cantidadd'".','."'$vencee'".','."'$fabricadoo'".','."'$compradoo'"; ?>];editarr(arra)">Editar
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>
                           </center>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

<!-- for the datatable of employee -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-stocklist').DataTable();
    });

function editarr(arra){

    $('#modal-stock').find('.modal-title').text('Nuevo stock');
	$('#modal-stock').modal('show');
    //alert(arra[0])
    //$('#item-id').val(arra[0]);
    $('#qty').val(arra[1]);
    $('#xDate').val(arra[2]);
    $('#manu').val(arra[3]);
    $('#purc').val(arra[4]);
    $('#validarr').val("modificar");
    document.getElementById('item-id').value = arra[0];
    
    $("#boton_guardar").css("display", "none"); 
    $("#boton_modificar").css("display", "inline"); 

}
	/* Act on the event */
	

</script>

<?php 
$stock->Disconnect();
?>