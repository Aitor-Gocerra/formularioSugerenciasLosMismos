<?php

    class CUsuarios {
        private $objUsuario;
        public $vista;

        function __construct(){
            require_once RUTA_MODELOS . 'Usuario.php';
            $this->objUsuario = new MUsuario();
        }

        public function login(){
            $this->vista = 'login';
        }

        public function registro(){
            $this->vista = 'registro';
        }

        private function comprobarDatosRegistro(){
            if(empty($_POST['nombre']) || empty($_POST['email1']) || empty($_POST["email2"])){
                return false;
            }else{
                return true;
            }
        }

        private function comprobarDatosInicio(){
            if(empty($_POST['email']))
                return false;
            else
                return true;
        }

        public function registrar(){

            $nombre = $_POST['nombre'] ?? '';
            $email1 = $_POST['email1'] ?? '';
            $email2 = $_POST['email2'] ?? '';
            
            if(!$this->comprobarDatosRegistro()){
                $this->vista = '';
                echo 'Datos incompletos';
                return false;
            }

            if($this->objUsuario->usuarioExiste($email1)){
                $this->vista = '';
                echo 'Usuario ya esta registrado';
                return false;
            }

            if($email1 !== $email2){
                $this->vista = '';
                echo 'Email no coincide';
                return false;
            }
        }
    }