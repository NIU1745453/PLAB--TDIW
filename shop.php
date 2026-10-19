<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Veleria </title> 
        <link rel="stylesheet" type="text/css" href="css/uab.css">
        <script src="js/funcions.js"></script>
    </head>
    <body>
        <header>
            <div class="menu">
                <button
                    id="menuButton"
                    type="button"
                    aria-label="Mostrar categorías"
                    aria-expanded="false"
                    aria-controls="menuCategorias">
                    ☰
                </button>

                <div id="menuCategorias" class="menu-categorias" hidden>
                    <p>Categorías</p>
                    <div id="categories">
                        <span>Cargando categorías...</span>
                    </div>
                </div>
            </div>

            <h1>
                <a href="index.html">Veleria</a>
            </h1>

            <div class="buscador">
                <button type="button">Search</button>
                <input type="text" aria-label="Buscar productos">

                <button type="button" id="botonLogin">
                    Log in
                </button>
            </div>
        </header>
        <main>
            <?php
                require_once __DIR__.'/php/controlador-shop.php'; // el __DIR__ és una constant que retorna la ruta absoluta del directori on es troba el fitxer actual.
                show_shop();
                // Aquí va el codi PHP per mostar per html cada producte.
                
            ?>
        </main>
        <footer>
            <p>
                links a xx + img.logo
            </p>
        </footer>
    </body>
</html>