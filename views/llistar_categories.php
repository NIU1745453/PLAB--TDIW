<ul>
<?php foreach ($categories as $categoria): ?>
    <li>
        <h3><a href="llistar_productes.php?id_categoria=<?php echo $categoria['id_categoria'] ?>"><?php echo $categoria['nom'] ?></a></h3>
        <p><?php echo $categoria['descripcio'] ?></p>
    </li>
    <?php endforeach; ?>
</ul>