<?php

    class CUsuario {
        private $objUsuario;
        public $vista;

        function __construct(){
            require_once RUTA_MODELOS . 'Usuario.php'; // Asegúrate que el archivo se llame mUsuario.php
            $this->objUsuario = new MUsuario();
            $this->vista = '';
        }

        public function login(){
            $this->vista = 'login';
        }

        public function registro(){
            $this->vista = 'registro';
        }

        // Procesa el formulario de Login
        public function inicio(){
            $email = $_POST['email'] ?? '';

            if(empty($email)){
                echo "<script>alert('Introduce un email');</script>";
                $this->vista = 'login';
                return;
            }

            // Llamamos al modelo
            $usuario = $this->objUsuario->inicio(['Email' => $email]);

            if($usuario){
                // Usuario encontrado: Iniciamos sesión
                $_SESSION['usuario'] = $usuario['Nombre'];
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                
                // Redirigir al buzón
                header('Location: index.php?c=Sugerencias&m=index');
                exit();
            } else {
                // Usuario no encontrado
                echo "<script>alert('El usuario no existe. Regístrate primero.');</script>";
                $this->vista = 'login';
            }
        }

        // Procesa el formulario de Registro
        public function registrar(){
            $nombre = $_POST['nombre'] ?? '';
            $email1 = $_POST['email1'] ?? '';
            $email2 = $_POST['email2'] ?? '';

            // Validaciones básicas
            if(empty($nombre) || empty($email1) || empty($email2)){
                echo "<script>alert('Faltan datos por rellenar');</script>";
                $this->vista = 'registro';
                return;
            }

            if($email1 !== $email2){
                echo "<script>alert('Los emails no coinciden');</script>";
                $this->vista = 'registro';
                return;
            }

            if($this->objUsuario->usuarioExiste($email1)){
                echo "<script>alert('Este usuario ya está registrado');</script>";
                $this->vista = 'login'; // Le mandamos al login
                return;
            }

            // Insertar en BD
            $datos = ['Nombre' => $nombre, 'Email' => $email1];
            $registrado = $this->objUsuario->registrar($datos);

            if($registrado !== false){
                echo "<script>alert('Registro completado con éxito. Ahora inicia sesión.');</script>";
                $this->vista = 'login';
            } else {
                echo "<script>alert('Error al registrar usuario en la base de datos.');</script>";
                $this->vista = 'registro';
            }
        }

        public function cerrarSesion(){
            session_destroy();
            header('Location: index.php'); // Redirige al login
        }
    }
?>