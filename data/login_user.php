<?php
require_once('../class/User.php');

if (isset($_POST['un'])) {
    $un = $_POST['un'];
    $up = md5($_POST['up']);
    $tipo = $_POST['tipo'];

    $result = $user->user_login($un, $up);

    if ($result > 0 && $result['user_type'] == $tipo) {
        $return['logged'] = true;

        // Redirigir según tipo
        if ($tipo == 1) {
            $return['url'] = "home.php";
        } elseif ($tipo == 2) {
            $return['url'] = "citas.php";
        }

        $_SESSION['logged_id'] = $result['user_id'];
        $_SESSION['logged_type'] = $result['user_type'];
        $_SESSION['uniqid'] = uniqid();

    } else {
        $return['logged'] = false;
        $return['msg'] = "Usuario, contraseña o tipo inválido.";
    }

    echo json_encode($return);
}

$user->Disconnect();
