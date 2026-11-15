<?php
    require_once __DIR__ . '/../model/usuaris.php';

    $user = false;
    $errors = [];
    $old = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = get_usuari_per_email_i_password($email, $password);

        if (!$user) {
            $errors[] = "Les credencials no són correctes.";
        } else {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['user_name'] = $user['nom'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['logged_in'] = true;
        }

        if (!empty($errors)) {
            $old = ['email' => $email];
        }
    }
    require_once __DIR__ . '/../views/login.php';
?>