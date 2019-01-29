<?php

require_once "includes/conexion.php";

//session_start();

if (!empty($_POST)) {
    
    //RECOGER VALORES DEL FORMULARIO
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $errores = [];

    if (!empty($nombres) && !is_numeric($nombres) && !preg_match("/[0-9]/", $nombres)) { 
    } else if (empty($nombres)){
        $errores["nombres"] = "Ingrese su nombre";
    } else {
        $errores["nombres"] = "Nombre inválido";
    }

    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
    } else if (empty($apellidos)){
        $errores["apellidos"] = "Ingrese sus apellidos";
    } else {
        $errores["apellidos"] = "Apellidos inválidos";
    }

    if (!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    } else if (empty($correo)){
        $errores["correo"] = "Ingrese su correo";
    } else {
        $errores["correo"] = "Correo inválido";
    }

    if (!empty($password)) {
    } else {
        $errores["password"] = "Ingrese una contraseña";
    }

    $guardar = false;
    if (count($errores) == 0) { 
        $guardar = true;
        $_SESSION["errores"] = [];
        $_SESSION["exito"] = [];

        $password_segura = password_hash($password, PASSWORD_BCRYPT, ["cost" => 4]);
        
        $sql = "INSERT INTO usuarios VALUES (null, :nombres, :apellidos, :correo, :password_segura, CURDATE())";

        try {
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                "nombres" => $nombres,
                "apellidos" => $apellidos,
                "correo" => $correo,
                "password_segura" => $password_segura
            ]);

            if ($result) {
                $_SESSION["exito"]["registro"] = "Registro Completado con éxito";
            } else {
                $_SESSION["errores"]["general"] = "El email ya se encuentra registrado";
            }

        } catch (PDOException $e) {
            $_SESSION["errores"]["general"] = "El email ya se encuentra registrado";
        }

    } else {
        $_SESSION["errores"] = [];
        $_SESSION["errores"] = $errores;
    }

    header("Location: index.php");
}