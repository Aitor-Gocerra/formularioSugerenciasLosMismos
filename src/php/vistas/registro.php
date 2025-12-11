<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <img src="imagenes/logo.jpeg" alt="Logo Comparsa"><br>
        <form action="index.php?c=Usuario&m=registrar" method="POST">
            <!-- EMAIL -->
            <label id="email">Introduce tu nombre</label>
            <br>
            <input type="text" name="nombre" placeholder="Aitor" required><br>

            <label id="email">Introduce tu email</label>
            <br>
            <input type="email" name="email1" placeholder="aitor@gmail.com" required><br>

            <label id="email">Introduce tu email nuevamente</label>
            <br>
            <input type="email" name="email2" placeholder="aitor@gmail.com" required><br>
            <!-- Botones -->
            <button type="submit">Enviar</button>
            <!-- <button type="reset">Borrar</button> -->
        </form>
        <footer>
            <p>&copy; 2025 Aitor Gómez Cerrato - Todos los derechos reservados.</p>
        </footer>
    </body>
</html>