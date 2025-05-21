<?php
require_once('database/Connection.php');

$conexion = new Connection();
$db = $conexion->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = md5($_POST['clave']);
    $tipo = $_POST['tipo'];

    // Verificar si ya existe el usuario
    $stmt = $db->prepare("SELECT * FROM user WHERE user_account = ?");
    $stmt->execute([$usuario]);

    if ($stmt->rowCount() > 0) {
        echo "<script>
                alert('⚠️ El usuario ya existe.');
                window.location.href='crear_usuario.php';
              </script>";
        exit;
    }

    // Insertar nuevo usuario
    $stmt = $db->prepare("INSERT INTO user (user_account, user_pass, user_type) VALUES (?, ?, ?)");
    if ($stmt->execute([$usuario, $clave, $tipo])) {
        echo "<script>
                alert('✅ Usuario creado correctamente.');
                window.location.href='home.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error al crear el usuario.');
                window.location.href='crear_usuario.php';
              </script>";
    }
}
?>
