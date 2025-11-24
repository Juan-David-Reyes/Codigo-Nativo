<?php /** Login view - simple HTML form for future integration */ ?>
<section class="login-section">
    <div class="container">
        <h1>Iniciar sesión</h1>
        <form method="post" action="<?= URL_PATH ?>login">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="tu@correo.com">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>

            <div class="form-actions">
                <button type="submit">Entrar</button>
            </div>
        </form>
    </div>
</section>