<?php
require_once __DIR__ . '/mConexion.php';

class MAdmin extends Conexion {

    public function obtenerSugerencias() {
        try {
            // Unimos las tablas para mostrar los nombres en lugar de los IDs
            $sql = "SELECT 
                        S.idSugerencia, 
                        S.Texto, 
                        S.Fecha, 
                        T.Nombre AS Tema, 
                        G.Nombre AS Grupo
                    FROM sugerencias S
                    INNER JOIN temas T ON S.idTema = T.idTema
                    INNER JOIN grupos G ON S.idGrupo = G.idGrupo
                    ORDER BY S.Fecha DESC";
            
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            
            // Retorna un array asociativo (compatible con PDO)
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            error_log("Error en Admin: " . $e->getMessage());
            return [];
        }
    }
}
?>