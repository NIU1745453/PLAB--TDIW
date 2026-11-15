<?php if ($user): ?>
    <div class="login-form">
        <h2>Has iniciat correctament</h2>
        <a href="index.php">Torna a la botiga</a>
    </div>
<?php else: ?>

<?php if (!empty($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form id="formLogin" class="login-form" method="post" action="index.php?accio=login">
    <h2>Inicia sessió</h2>
    <p>Introdueix les teves dades per iniciar sessió.</p>

    <label for="email">Correu:</label>
    <input
        type="email"
        id="email"
        name="email"
        value="<?= htmlspecialchars($old['email'] ?? '') ?>"
        required
    >

    <label for="password">Contrasenya:</label>
    <input
        type="password"
        id="password"
        name="password"
        required
    >
    <button type="submit">Inicia sessió</button>

    <a href="index.php">Tornar a la botiga</a>
</form>

<?php endif; ?>