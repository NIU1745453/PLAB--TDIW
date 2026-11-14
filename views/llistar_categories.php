
<?php $i = 1;
foreach ($categories as $categoria): ?>
<article class="prod<?= $i ?>">
    <div class="img">
        <img src="img/img<?= $i ?>.jpg" alt="Producte <?= $i ?>">
    </div>
    <h3>
        <a class="link-categoria"
            href="index.php?accio=llistar-productes&categoria=<?= urlencode($categoria['nom']) ?>"
            data-categoria="<?= htmlspecialchars($categoria['nom']) ?>"><?= htmlspecialchars($categoria['nom']) ?></a>
    </h3>
    <p><?= $categoria['descripcio']?></p>
</article>
<?php $i +=1 ?>
<?php endforeach;?>



