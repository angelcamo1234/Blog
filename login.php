<?php

require_once "includes/conexion.php";

if (!empty($_POST)) {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $password_hash = "";

    $sql = "SELECT * FROM usuarios WHERE email = :email";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "email" => $email
    ]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($results) > 0) {
        foreach ($results as $result) {
            $password_hash = $result["password"];
        }
    
        if (password_verify($password, $password_hash) == true) {
            $_SESSION["usuario"] = [];
            $_SESSION["usuario"]["exito"] = "Usuario Logueado con éxito";
            foreach ($results as $result) {
                $_SESSION["usuario"]["nombre"] = $result["nombre"];
                $_SESSION["usuario"]["apellidos"] = $result["apellidos"];
                $_SESSION["usuario"]["email"] = $result["email"];
            }
            sleep(1);
        } else {
            $_SESSION["erroresLog"] = [];
            $_SESSION["erroresLog"]["general"] = "Contraseña Incorrecta";
        }
    } else {
        $_SESSION["erroresLog"] = [];
        $_SESSION["erroresLog"]["general"] = "Correo no registrado";
    }

    header("Location: index.php");

}

?>