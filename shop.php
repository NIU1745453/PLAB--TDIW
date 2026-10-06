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
                <button>Menu</button> <!--vincularlo a la img q toca-->
            </div>
            <h1>
                <a href="#">Nom de l'empresa</a>
            </h1>

            <div class="buscador">
                <button>Search</button>
                <input type="text">
                <button>log in</button>
            </div>
        </header>
            <?php
                require_once __DIR__.'/php/connectaDb.php'; // el __DIR__ és una constant que retorna la ruta absoluta del directori on es troba el fitxer actual.

                // Aquí va el codi PHP per mostar per html cada producte.
                $conn = conectaDb();
                $sql = "SELECT * FROM producte"; // Consulta sql dels productes
                $result = pg_query($conn, $sql);
                $products = pg_fetch_all($result);
                foreach ($products as $product) 
                {
                    $nom_producte = $product['nom']; 
                    $descripcio = $product['descripcio'];
                    $img = $product['img']; // Ruta de la imatge del producte
                    echo "
                    <div class='producte'>
                        <img src='$img' alt='imagen $nom_producte'/>
                        <h5>$nom_producte</h5>
                        <p>$descripcio</p>
                        <a href=''>
                            <img src='carrito.png'/>
                        </a>
                    </div>";
                }
            ?>
        <footer>
            <p>
                links a xx + img.logo
            </p>
        </footer>
    </body>
</html>