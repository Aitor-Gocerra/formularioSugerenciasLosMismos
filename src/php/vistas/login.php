<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <img src="imagenes/logo.jpeg" alt="Logo Comparsa">
        
        <form action="index.php?c=Usuario&m=inicio" method="POST" class="formulario-izquierda">
            <h1>Iniciar Sesión</h1>
            
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@gmail.com" required>

            <button type="submit">Entrar</button>

            <div class="pie-form">
                <p>¿Aún no tienes cuenta?</p>
                <a href="index.php?c=Usuario&m=registro" class="boton-enlace">Crear una cuenta</a>
            </div>
        </form>

        <footer>
            <p>&copy; 2025 Aitor Gómez Cerrato - Todos los derechos reservados.</p>
        </footer>
    </body>
</html>