<?php if (empty($productes)): ?>
    <p>No hi ha productes en aquesta categoria.</p>
<?php else: ?>
    <?php foreach ($productes as $producte): ?>
        <div class="producte" data-id="<?= (int)$producte['id_producte'] ?>">
            <img src="<?= htmlspecialchars($producte['imatge']) ?>" alt="Imatge de <?= htmlspecialchars($producte['nom']) ?>" class="imatge-producte"/>
            <h3><?= htmlspecialchars($producte['nom']) ?></h3>
            <p><?= htmlspecialchars($producte['descripcio'] ?? '') ?></p>
            <p>Preu: <?= htmlspecialchars($producte['preu']) ?> €</p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


