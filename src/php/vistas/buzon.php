<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOS MISMOS</title>
        <link rel="stylesheet" href="css/estilo.css"> </head>
    <body>
        <img src="imagenes/logo.jpeg" alt="Logo Comparsa"><br>
        
        <form action="index.php?c=Sugerencias&m=enviar" method="POST">
            <h1>BUZON DE SUGERENCIAS</h1>
            
            <label>Elige una:</label><br>
            <?php
                if (!empty($grupos)) {
                    foreach ($grupos as $grupo) {
                        echo '<input type="radio" id="g'. $grupo['idGrupo'] . '" name="grupo" value="' . $grupo['idGrupo'] . '">';
                        echo '<label for="g'. $grupo['idGrupo'] . '">' . $grupo['Nombre'] . '</label>&nbsp;&nbsp;';
                    }
                }
            ?>
            <br><br>

            <label for="tema">Elige el tema a tratar:</label>
            <select id="tema" name="tema">
                <option value="">Selecciona...</option>
                <?php
                    if (!empty($temas)) {
                        foreach ($temas as $tema) {
                            echo '<option value="' . $tema['idTema'] . '">' . $tema['Nombre'] . '</option>';
                        }
                    } else {
                        echo '<option value="">No hay temas disponibles</option>';
                    }
                ?>
            </select>
            <br>

            <label for="mensaje">Sugerencia:</label><br>
            <textarea id="mensaje" name="mensaje" rows="4"></textarea>
            <br>

            <input type="checkbox" id="acepto" name="acepto" required>
            <label for="acepto">Acepto términos y condiciones.</label>
            <p id="terminos">*La comparsa tratará sus datos de manera interna, protegiéndolos y solo para uso informativo.</p>
            <br>

            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
            
            <br><br>
            <a href="index.php?c=Usuario&m=cerrarSesion" style="font-size:12px; color: grey;">Cerrar Sesión</a>
        </form>

        <footer>
            <p>&copy; 2025 Aitor Gómez Cerrato - Todos los derechos reservados.</p>
        </footer>
    </body>
</html>