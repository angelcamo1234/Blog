<?php 
require_once "conexion.php";
require_once "helpers.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/style.css">
    <?php if(!empty($_SESSION["usuario"])): ?>
    <link rel="stylesheet" href="./assets/css/styleLog.css">
    <?php endif; ?>
    <title>Blog de Videojuegos</title>
</head>
<body>
    <!-- CABECERA -->
    <header class="cabecera">
        <!-- LOGO -->
        <div class="logo">
            <a href="index.php">Blog de Videojuegos</a>
        </div>

        <!-- MENU -->
        <nav class="menu" id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <?php
                    $categorias = listarCategorias();
                    foreach ($categorias as $categoria):
                ?>
                <li><a href="#"><?php echo $categoria["nombre"]; ?></a></li>
                <?php endforeach; ?>
                <li><a href="#">Sobre mí</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <div class="contenedor">