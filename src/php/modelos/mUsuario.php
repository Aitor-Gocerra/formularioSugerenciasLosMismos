<?php

    require_once __DIR__ . '/mConexion.php';

    class MUsuario extends Conexion {
        public $error;

        public function registrar($datos){

            try {
                
                $sql = "
                    INSERT INTO usuarios (Nombre, Email)
                    VALUES (:nombre, :email);
                ";

                $stmt = $this->conexion->prepare($sql);

                $stmt->bindValue(':nombre', $datos['Nombre'], PDO::PARAM_STR);
                $stmt->bindValue(':email', $datos['Email'], PDO::PARAM_STR);

                $stmt->execute();
            }catch (PDOException $error) {
                error_log($error->getMessage());
                if($error->errorInfo[1] == 1062){
                $this->error = "1062";
            }
            else{
                $this->error = "9998";
            }
            return false;
            }
        }

        public function inicio($datos){

            try{

                $sql = "
                    SELECT idUsuario, Nombre, Email, Tipo
                    FROM usuarios
                    WHERE Email = :email;
                ";

                $stmt = $this->conexion->prepare($sql);
                $stmt->bindValue(':email', $datos['Email'], PDO::PARAM_STR);
                $stmt->execute();

                // Verifica si encontró una fila y la devuelve
                return $stmt->fetch();
                
            } catch (PDOException $error){
                error_log("Error BD en login: " . $error->getMessage()); 
                $this->error = "ErrorInternoBD";
                return false;
            }
        }

        public function usuarioExiste($email){

            try{
                $sql = "
                    SELECT *
                    FROM usuarios
                    WHERE Email = :email;
                ";

                $stmt = $this->conexion->prepare($sql);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->fetchColumn() > 0;
            }catch (PDOException $e) {
                error_log($e->getMessage());
                $this->error = "ErrorConsultaBD";
                return true;
            }
        }
    }
