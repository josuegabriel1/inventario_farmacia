<?php
require_once('database/Connection.php');

$conexion = new Connection();
$db = $conexion->getConnection(); // ✅ forma correcta
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Crear Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">👤 Crear Nuevo Usuario</h3>

    <form action="guardar_usuario.php" method="POST" class="border p-4 bg-white rounded">
      <div class="mb-3">
        <label>Nombre de usuario</label>
        <input type="text" name="usuario" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Contraseña</label>
        <input type="password" name="clave" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tipo de usuario</label>
        <select name="tipo" class="form-select" required>
          <option value="1">Doctor</option>
          <option value="2">Enfermera</option>
        
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <!-- Botón volver al panel -->
    <a href="home.php" class="btn btn-secondary mt-3">← Volver al Panel</a>
  </div>
</body>
</html>
