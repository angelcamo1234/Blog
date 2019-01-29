<?php

function mostrarError($errores, $campo) {
    $alerta = "";
    
    if (!empty($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alert error'>". $errores[$campo] . "</div>";
    }

    return $alerta;
}

function mostrarExito($exito, $campo) {
    $alerta = "";
    
    if (!empty($exito[$campo]) && !empty($campo)) {
        $alerta = "<div class='alert exito'>". $exito[$campo] . "</div>";
    }

    return $alerta;
}

function borrarMensajes() {
    $_SESSION["errores"] = [];
    $_SESSION["erroresLog"] = [];
    $_SESSION["exito"] = [];
    unset($_SESSION["usuario"]["exito"]);
}

function listarCategorias() {
	
	GLOBAL $pdo;
	
    $sql = "SELECT * FROM categorias";

    $stmt = $pdo->prepare($sql);
    $categorias = $stmt->execute();

    return $categorias;
}
