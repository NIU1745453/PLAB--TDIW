<?php if ($registrat): ?>
    <div class="login-form">
        <h2>Compte creat</h2>
        <p>T'has registrat correctament. Ja pots iniciar sessió.</p>
        <a href="index.php?accio=login">Inicia sessió</a>
    </div>
<?php else: ?>

<?php if (!empty($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form id="formRegistre" class="login-form" method="post" action="index.php?accio=registre">
    <h2>Registra't</h2>
    <p>Introdueix les teves dades per crear el teu compte.</p>

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

    <label for="nom">Nom:</label>
    <input 
        type="text"
        id="nom"
        name="nom"
        value="<?= htmlspecialchars($old['nom'] ?? '') ?>"
        required>

    <label for="cognoms">Cognoms:</label>
    <input
        type="text"
        id="cognoms"
        name="cognoms"
        value="<?= htmlspecialchars($old['cognoms'] ?? '') ?>"
        required>

    <label for="codi_postal">Codi Postal:</label>
    <input
        type="text"
        id="codi_postal"
        name="codi_postal"
        value="<?= htmlspecialchars($old['codi_postal'] ?? '') ?>"
        required>
        
    <label for="direccio">Direcció:</label>
    <input
        type="text"
        id="direccio"
        name="direccio"
        value="<?= htmlspecialchars($old['direccio'] ?? '') ?>"
        required>

    <label for="aniversari">Data de naixement:</label>
    <input
        type="date"
        id="aniversari"
        name="aniversari"
        value="<?= htmlspecialchars($old['aniversari'] ?? '') ?>"
        required>   

    
    <button type="submit">Registra't</button>

    <a href="index.php">Tornar a la botiga</a>
</form>

<?php endif; ?>