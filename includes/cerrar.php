<?php

session_start();

if (!empty($_SESSION["usuario"])) {
    session_destroy();
    sleep(1);
    header("Location: ../index.php"); 
} else {
    echo "<script>alert('La sesión ya fue cerrada')</script>";
    header("Location: ../index.php"); 
}

?>