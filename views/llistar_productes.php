<ul>
<?php foreach ($productes as $producte): ?>
    <li>
        <h3><?php echo $producte['nom'] ?></h3>
        <p><?php echo $producte['descripcio'] ?></p>
        <p>Preu: <?php echo $producte['preu'] ?> €</p>
        <img src="<?= $producte['imatge'] ?>" alt="Imatge de <?= $producte['nom'] ?>">
    </li>
    <?php endforeach; ?>
</ul>