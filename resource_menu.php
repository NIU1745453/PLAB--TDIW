<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Veleria</title>

    <link rel="stylesheet" href="css/uab.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/functions.js" defer></script>
</head>
<body>
    <header>
        <div class="menu">
            <button
                id="menuButton"
                type="button"
                aria-label="Mostrar menú d'usuario"
                aria-expanded="false"
                aria-controls="menuCategorias">
                ☰
            </button>

            <div id="menuCategorias" class="menu-categorias" hidden>
                <p><?= !empty($_SESSION['logged_in']) ? 'El meu compte' : 'Menú' ?></p>
                <div id="categories">
                    <ul>
                        <li><a href="index.php">Inici</a></li>
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                            <li><a href="index.php?accio=perfil">Perfil</a></li>
                            <li><a href="index.php?accio=logout">Tancar sessió</a></li>
                        <?php else: ?>
                            <li><a href="index.php?accio=registre">Registrar-se</a></li>
                            <li><a href="index.php?accio=login">Login</a></li>
                        <?php endif; ?>
                    </ul>
                    <!--<span>Cargando categorías...</span>-->
                </div>
            </div>
        </div>

        <h1>
            <a href="index.php">Veleria</a>
        </h1>

        <!--<div class="buscador">
            <button type="button">Search</button>
            <input type="text" aria-label="Buscar productos">

            <button type="button" id="botonLogin">
                Log in
            </button>
        </div>-->
    </header>