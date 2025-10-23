<?php
    require "config.php";
    $conexion->select_db("los_mismos");

    // Validar que el email existe en POST
    if(!isset($_POST["email"]) || empty($_POST["email"])){
        die("Email no proporcionado");
    }

    $email = $_POST["email"];

    $sql = "SELECT Email FROM USUARIOS WHERE Email = '{$email}'";
    echo $sql;

    $resultado = $conexion->query($sql);

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_assoc();
        
        if($fila["Email"] === "aitorgomezcerrato@gmail.com"){
            header("Location: admin.php");
            exit();
        } else {
            header("Location: inicio.php");
            exit();
        }
    } else {
        echo "Usuario no válido";
    }
?>