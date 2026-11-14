<?php if (!empty($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form id="formLogin" class="login-form">
    <h2>Registra't</h2>
    <p>Introdueix les teves daddes per crear el teu compte.</p>

    <label for="email">Correu:</label>
    <input
        type="email"
        id="email"
        name="email"
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
        required>

    <label for="cognoms">Cognoms:</label>
    <input
        type="text"
        id="cognoms"
        name="cognoms"
        required>

    <label for="codi_postal">Codi Postal:</label>
    <input
        type="text"
        id="codi_postal"
        name="codi_postal"
        required>
        
    <label for="direccio">Direcció:</label>
    <input
        type="text"
        id="direccio"
        name="direccio"
        required>

    <label for="aniversari">Data de naixement:</label>
    <input
        type="date"
        id="aniversari"
        name="aniversari"
        required>   

    
    <button type="submit">Registra't</button>

    <p id="missatgeLogin" role="status"></p>

    <a href="index.php">Tornar a la botiga</a>
</form>