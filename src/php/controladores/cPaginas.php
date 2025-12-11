<?php

    class CPaginas{

        public $vista;

        public function __construct(){
            $this->vista = '';
        }

        public function login(){
            $this->vista = 'login';
        }

        public function registro(){
            $this->vista = 'registro';
        }   
        public function inicio(){
            $this->vista = 'inicio';
        }
    }


?>