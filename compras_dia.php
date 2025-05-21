<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('database/Connection.php');
$conexion = new Connection();
$db = $conexion->getConnection();

$fecha_consulta = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');
$stmt = $db->prepare("SELECT * FROM sales WHERE DATE(date_sold) = ?");
$stmt->execute([$fecha_consulta]);
$ventas = $stmt->fetchAll();

$fecha_actual = date('d/m/Y H:i');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Compras del Día</title>
  <link rel="icon" type="image/png" href="IMG/logo_nuevo.png">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print { display: none; }
    }
    .encabezado {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #ccc;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    .encabezado img {
      height: 90px;
    }
    .encabezado .info {
      text-align: right;
    }
    .info h4, .info p {
      margin: 0;
    }
    .table > thead > tr {
      background-color: #f5f5f5;
      font-weight: bold;
    }
    .firma {
      margin-top: 50px;
      text-align: right;
    }
    .firma-linea {
      width: 250px;
      border-top: 1px solid #000;
      margin-top: 40px;
      margin-left: auto;
    }
  </style>
</head>
<body>
  <div class="container mt-4">

    <!-- ENCABEZADO -->
    <div class="encabezado">
      <div>
        <img src="IMG/logo_nuevo.png" alt="Logo">
        <form method="get" class="form-inline mt-3" style="margin-top: 15px;">
          <label for="fecha" style="font-weight: bold; font-size: 16px;">
            📅 Seleccione la fecha que desea consultar:
          </label>
          <input type="date" name="fecha" id="fecha" class="form-control" value="<?= $fecha_consulta ?>" required onchange="this.form.submit();">
        </form>
      </div>
      <div class="info">
        <h4>Centro Médico Familiar</h4>
        <p>Reporte de Compras del Día</p>
        <p><strong>Fecha:</strong> <?= $fecha_actual ?></p>
      </div>
    </div>

    <!-- TABLA -->
    <table class="table table-bordered table-hover" id="tabla_ventas">
      <thead>
        <tr>
          <th>ID</th>
          <th>Código</th>
          <th>Nombre</th>
          <th>Marca</th>
          <th class="text-center">Cantidad</th>
          <th class="text-center">Precio</th>
          <th class="text-center">Subtotal</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $total_dia = 0;
        foreach ($ventas as $venta): 
          $subtotal = $venta['qty'] * $venta['price'];
          $total_dia += $subtotal;
        ?>
        <tr>
          <td><?= $venta['sales_id'] ?></td>
          <td><?= $venta['item_code'] ?></td>
          <td><?= $venta['generic_name'] ?></td>
          <td><?= $venta['brand'] ?></td>
          <td class="text-center"><?= $venta['qty'] ?></td>
          <td class="text-center">$<?= number_format($venta['price'], 2) ?></td>
          <td class="text-center">$<?= number_format($subtotal, 2) ?></td>
          <td><?= $venta['date_sold'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- TOTAL -->
    <div class="alert alert-info text-right">
      <strong>Total del día:</strong> $<?= number_format($total_dia, 2) ?>
    </div>

    <!-- FIRMA -->
    <div class="firma">
      <div class="firma-linea"></div>
      <p><strong>Firma Responsable</strong></p>
    </div>
    <p class="text-right"><em>Generado por: Administrador</em></p>

    <!-- BOTONES -->
    <div class="no-print mb-4">
      <a href="home.php" class="btn btn-default">← Volver al Panel</a>
      <button onclick="window.print();" class="btn btn-primary">🖨️ Imprimir</button>
      <button onclick="generarPDF()" class="btn btn-danger">📄 Exportar a PDF</button>
    </div>
  </div>

  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

  <script>
    function generarPDF() {
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();
      const logo = new Image();
      logo.src = "IMG/logo_nuevo.png";
      logo.onload = function () {
        doc.addImage(logo, 'PNG', 14, 10, 30, 30);
        doc.setFontSize(14);
        doc.text("Centro Médico Familiar", 50, 20);
        doc.setFontSize(12);
        doc.text("Reporte de Compras del Día", 50, 28);
        doc.text("Fecha: <?= $fecha_actual ?>", 50, 36);

        doc.autoTable({
          html: '#tabla_ventas',
          startY: 45,
          styles: { fontSize: 10 },
          headStyles: { fillColor: [40, 167, 69] }
        });

        const finalY = doc.lastAutoTable.finalY + 10;
        doc.setFontSize(12);
        doc.text("Total del día: $<?= number_format($total_dia, 2) ?>", 14, finalY);

        doc.save("compras_dia_<?= date('Ymd_His') ?>.pdf");
      };
    }
  </script>
</body>
</html>
