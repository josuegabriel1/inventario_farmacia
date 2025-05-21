<?php 
require_once('../class/Stock.php');
$pacientes = $stock->pacientes_lista();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listado de Pacientes</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript">
        print();
    </script>
</head>
<body>


<center>
    <h2>Listado de Pacientes</h2>
    <h3>a partir de</h3>
    <h3><?php echo date('d-m-Y'); ?></h3>
</center>

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
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>


<?php 
$stock->Disconnect();
 ?>



    <script type="text/javascript">
        print();
    </script>
</body>
</html>
