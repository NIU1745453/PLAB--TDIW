<?php
    require_once __DIR__ . '/../model/usuaris.php';

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = get_usuari_per_email($email);
    if (!$user) {
        echo 'Usuari no trobat';
    } else {
        if (password_verify($password, $user['password'])) {
            echo 'Login correcte';
        } else {
            echo 'Contrasenya incorrecta';
        }
    }
?>