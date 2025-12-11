<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <img src="imagenes/logo.jpeg" alt="Logo Comparsa">

        <form action="index.php?c=Usuario&m=registrar" method="POST" class="formulario-izquierda">
            <h1>Crear Cuenta</h1>

            <label for="nombre">Nombre Completo</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>

            <label for="email1">Correo Electrónico</label>
            <input type="email" id="email1" name="email1" placeholder="tu@email.com" required>

            <label for="email2">Confirma tu Correo</label>
            <input type="email" id="email2" name="email2" placeholder="Repite tu email" required>

            <button type="submit">Registrarse</button>

            <div class="pie-form">
                <p>¿Ya tienes cuenta?</p>
                <a href="index.php?c=Usuario&m=login" class="boton-enlace">Inicia sesión aquí</a>
            </div>
        </form>

        <footer>
            <p>&copy; 2025 Aitor Gómez Cerrato - Todos los derechos reservados.</p>
        </footer>
    </body>
</html>