<?php if (!$producte): ?>
    <p>Producte no trobat.</p>
<?php else: ?>
    <article class="detall-producte">
        <button type="button" class="tornar">← Tornar</button>
        <img src="<?= htmlspecialchars($producte['imatge']) ?>" alt="<?= htmlspecialchars($producte['nom']) ?>">
        <h2><?= htmlspecialchars($producte['nom']) ?></h2>
        <p><?= htmlspecialchars($producte['descripcio'] ?? '') ?></p>
        <p class="preu"><?= htmlspecialchars($producte['preu']) ?> €</p>
        <button type="button" class="afegir-cistella" data-id="<?= (int)$producte['id_producte'] ?>">
            Afegir a la cistella
        </button>
    </article>
<?php endif; ?>