<?php
require_once __DIR__ . '/mConexion.php';

class MSugerencias extends Conexion {

    public function temas() {
        try {
            $sql = "SELECT * FROM temas";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); // Devuelve todas las filas en un array
        } catch (PDOException $e) {
            error_log("Error al obtener temas: " . $e->getMessage());
            return [];
        }
    }

    public function grupos() {
        try {
            $sql = "SELECT * FROM grupos";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error al obtener grupos: " . $e->getMessage());
            return [];
        }
    }

    public function insertarSugerencia($datos) {
        try {
            $sql = "INSERT INTO sugerencias (Texto, idTema, idGrupo, Fecha) 
                    VALUES (:texto, :idTema, :idGrupo, NOW())";
            
            $stmt = $this->conexion->prepare($sql);
            
            $stmt->bindValue(':texto', $datos['mensaje'], PDO::PARAM_STR);
            $stmt->bindValue(':idTema', $datos['tema'], PDO::PARAM_INT);
            $stmt->bindValue(':idGrupo', $datos['grupo'], PDO::PARAM_INT);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            error_log("Error al insertar sugerencia: " . $e->getMessage());
            return false;
        }
    }
}
?>