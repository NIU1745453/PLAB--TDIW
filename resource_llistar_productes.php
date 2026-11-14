<!-- resource_llistar_productes.php -->
<section class="contingut">
    <h2 id="tituloProductos"><?= htmlspecialchars($_GET['categoria'] ?? '') ?></h2>
    <div id="product-list" class="productes">
        <?php require __DIR__.'/controller/llistar_productes.php' ?>
    </div>
</section>