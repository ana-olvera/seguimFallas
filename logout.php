<?php
    session_start();
    //destruye toda la información registrada de una variable de sesión
    unset($_SESSION["nombre"]); 
    unset($_SESSION["area"]);
    session_destroy();
    //redireccionara al usuario al default.php 
    header('location:default.php');
?>
