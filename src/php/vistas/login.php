<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <img src="imagenes/logo.jpeg" alt="Logo Comparsa"><br>
        <form action="index.php?c=Usuario&m=inicio" method="POST">
            <!-- EMAIL -->
            <label id="email">Introduce tu email</label>
            <br>
            <input type="email" name="email" placeholder="aitor@gmail.com" required><br>
            <!-- Botones -->
            <button type="submit">Enviar</button>
            <!-- <button type="reset">Borrar</button> -->
        </form>
        <a href="index.php?c=Usuario&m=registro">¿Aun no te has registrado? Hazlo aqui</a>
        <footer>
            <p>&copy; 2025 Aitor Gómez Cerrato - Todos los derechos reservados.</p>
        </footer>
    </body>
</html>