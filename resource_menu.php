<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Veleria</title>

    <link rel="stylesheet" href="css/uab.css">
    <script src="js/functions.js" defer></script>
</head>
<body>
    <header>
        <div class="menu">
            <button
                id="menuButton"
                type="button"
                aria-label="Mostrar categorías"
                aria-expanded="false"
                aria-controls="menuCategorias"
                onclick="toggleMenu()">
                ☰
            </button>

            <div id="menuCategorias" class="menu-categorias" hidden>
                <p>Categorías</p>
                <div id="categories">
                    <ul>
                        <li><a href="index.php">Inici</a></li>
                        <li><a href="index.php?accio=registre">Registrar-se</a></li>
                        <li><a href="index.php?accio=login">Login</a></li>
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