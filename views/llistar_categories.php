
<?php $i = 1;
foreach ($categories as $categoria): ?>
<article class="prod<?= $i ?>">
    <div class="img">
        <img src="img/img<?= $i ?>.jpg" alt="Producte <?= $i ?>">
    </div>
    <h3><a href="llistar_productes.php?id_categoria=<?= $categoria['id_categoria'] ?>"><?= $categoria['nom'] ?></a></h3>
    <p><?= $categoria['descripcio']?></p>
</article>
<?php $i +=1 ?>
<?php endforeach;?>



