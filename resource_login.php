<main class="login-container">
    <form id="formLogin" class="login-form">
        <h2>Inicia sessió</h2>
        <p>Introdueix les teves dades per accedir al teu compte.</p>

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

        <button type="button" onclick="window.location.href='index.php'">
            Login
        </button>

        <p id="missatgeLogin" role="status"></p>

        <a href="index.php">Tornar a la botiga</a>
    </form>
</main>