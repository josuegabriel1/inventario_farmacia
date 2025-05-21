<?php
require_once('database/Connection.php');

$conexion = new Connection();
$db = $conexion->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM user WHERE user_id = ?");
    if ($stmt->execute([$id])) {
        echo "<script>alert('✅ Usuario eliminado correctamente.'); window.location.href='ver_usuarios.php';</script>";
    } else {
        echo "<script>alert('❌ Error al eliminar el usuario.'); window.location.href='ver_usuarios.php';</script>";
    }
} else {
    echo "<script>alert('⚠️ No se especificó ningún ID.'); window.location.href='ver_usuarios.php';</script>";
}
?>
