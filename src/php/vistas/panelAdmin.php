<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - Los Mismos</title>
    <link rel="stylesheet" href="css/estiloAdmin.css"> </head>
<body>
    <div class="contenedor">
        <div id="cabecera">
            <h1>Panel de Administración</h1>
            <h3><?php echo $numFilas ?? 0; ?> sugerencias</h3>
            
            <a href="index.php?c=Usuario&m=cerrarSesion" class="btn-volver" style="background:#e74c3c; float:right; margin-left:10px;">Salir</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Sugerencia</th>
                    <th>Tema</th>
                    <th>Grupo</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // Verificamos si hay datos en el array $sugerencias
                    if (!empty($sugerencias)) {
                        foreach ($sugerencias as $fila) {
                            echo "<tr>";
                            echo "<td><strong>#" . $fila['idSugerencia'] . "</strong></td>";
                            echo "<td>" . $fila['Fecha'] . "</td>";
                            echo "<td>" . $fila['Texto'] . "</td>";
                            echo "<td><span class='tema'>" . $fila['Tema'] . "</span></td>";
                            echo "<td><span class='grupo'>" . $fila['Grupo'] . "</span></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align:center; padding:20px;'>
                              No hay sugerencias todavía</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>