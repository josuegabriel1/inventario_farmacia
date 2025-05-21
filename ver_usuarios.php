<?php
require_once('database/Connection.php');

$conexion = new Connection();
$db = $conexion->getConnection();

$stmt = $db->query("SELECT user_id, user_account, user_type FROM user");
$usuarios = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Usuarios Registrados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">👥 Lista de Usuarios Registrados</h3>

    <table class="table table-bordered table-striped bg-white">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Tipo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuario): ?>
          <tr>
            <td><?= $usuario['user_id'] ?></td>
            <td><?= $usuario['user_account'] ?></td>
            <td>
              <?php
                if ($usuario['user_type'] == 0) echo "Administrador";
                elseif ($usuario['user_type'] == 1) echo "Doctor";
                elseif ($usuario['user_type'] == 2) echo "Enfermera";
                else echo "Otro";
              ?>
            </td>
            <td>
              <a href="eliminar_usuario.php?id=<?= $usuario['user_id'] ?>"
                 class="btn btn-sm btn-danger"
                 onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                 Eliminar
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <a href="home.php" class="btn btn-secondary">← Volver al Panel</a>
  </div>
</body>
</html>
