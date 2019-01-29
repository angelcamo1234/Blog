<?php require_once "includes/helpers.php" ?>
<!-- BARRA LATERAL -->
<aside class="sidebar">
            <?php if (!empty($_SESSION["usuario"])):?>
                <div class="usuario bloque">
                    <h3>Hola, <?php echo $_SESSION["usuario"]["nombre"] . " " . $_SESSION["usuario"]["apellidos"]; ?></h3>
                    <a href="#" class="boton boton-azul2">Publicar</a>
                    <a href="#" class="boton boton-azul3">Agregar Categorias</a>
                    <a href="#" class="boton boton-azul4">Editar Datos</a>
                    <a href="includes/cerrar.php" class="boton boton-azul5">Cerrar Sesion</a>
                </div>
            <?php endif; ?>
            <div class="login bloque">
                <h3>Identificate</h3>
                <?php
                    if (!empty($_SESSION["usuario"])):
                        echo mostrarExito($_SESSION["usuario"], "exito");
                    endif;

                    if (!empty($_SESSION["erroresLog"])):
                        echo mostrarError($_SESSION["erroresLog"], "general");
                    endif;
                ?>
                <form action="login.php" method="POST" novalidate>
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    <input type="submit" value="Entrar">
                </form>
            </div>

            <div class="register bloque">
                <h3>Regístrate</h3>
                <?php
                    if (!empty($_SESSION["exito"])):
                        echo mostrarExito($_SESSION["exito"], "registro");
                    elseif (!empty($_SESSION["errores"])):
                        echo mostrarError($_SESSION["errores"], "general");
                    endif;
                ?>
                <form action="registro.php" method="POST" novalidate>
                    <label for="nombres">Nombres</label>
                    <?php if(!empty($_SESSION["errores"])){echo mostrarError($_SESSION["errores"], "nombres");} ?>
                    <input type="text" name="nombres">
                    <label for="apellidos">Apellidos</label>
                    <?php if(!empty($_SESSION["errores"])){echo mostrarError($_SESSION["errores"], "apellidos");} ?>
                    <input type="text" name="apellidos">
                    <label for="correo">Email</label>
                    <?php if(!empty($_SESSION["errores"])){echo mostrarError($_SESSION["errores"], "correo");} ?>
                    <input type="email" name="correo">
                    <label for="password">Contraseña</label>
                    <?php if(!empty($_SESSION["errores"])){echo mostrarError($_SESSION["errores"], "password");} ?>
                    <input type="password" name="password">
                    <input type="submit" name="submit" value="Registrarse">
                </form>
                <?php borrarMensajes();?>
            </div>
        </aside>