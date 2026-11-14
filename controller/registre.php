<?php
    require_once __DIR__ . '/../model/usuaris.php';

    $errors = [];
    $old = [];
    $registrat = false;

    // Només processem el formulari quan s'envia (POST); amb GET només es mostra
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = trim($_POST['nom'] ?? '');
        $cognoms = trim($_POST['cognoms'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $codi_postal = trim($_POST['codi_postal'] ?? '');
        $direccio = trim($_POST['direccio'] ?? '');
        $aniversari = $_POST['aniversari'] ?? '';

        // Validació al servidor (el "required" de l'HTML es pot saltar fàcilment)
        if ($nom === '' || $cognoms === '' || $codi_postal === '' || $direccio === '' || $aniversari === '') {
            $errors[] = "Omple tots els camps.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "El correu no és vàlid.";
        }
        if (strlen($password) < 8) {
            $errors[] = "La contrasenya ha de tenir almenys 8 caràcters.";
        }

        // Només consultem la BD si les dades són correctes
        if (empty($errors)) {
            $usuari = get_usuari_per_email($email);
            if ($usuari === null) {
                $errors[] = "Error al registrar usuari.";
            } elseif ($usuari) {
                $errors[] = "L'usuari ja existeix.";
            } elseif (registrar_usuari($nom, $cognoms, $email, password_hash($password, PASSWORD_DEFAULT), $codi_postal, $direccio, $aniversari)) {
                $registrat = true;
            } else {
                $errors[] = "Error al registrar usuari.";
            }
        }

        // Si hi ha errors, tornem a omplir el formulari (sense la contrasenya)
        if (!$registrat) {
            $old = $_POST;
            unset($old['password']);
        }
    }

    require __DIR__ . '/../views/registre.php';
