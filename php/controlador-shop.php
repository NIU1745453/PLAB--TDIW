<?php
    require_once __DIR__ . '/conectaDb.php';
    function show_shop() {
        $conn = conectaDb();
        $sql = "SELECT * FROM producte"; // Consulta sql dels productes
        $result = pg_query($conn, $sql);
        $products = pg_fetch_all($result);
        foreach ($products as $product) 
        {
            $nom_producte = $product['nom']; 
            $descripcio = $product['descripcio'];
            $img = $product['imatge']; // Ruta de la imatge del producte
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
    }
?>