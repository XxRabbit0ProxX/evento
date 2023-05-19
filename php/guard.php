<?php

session_start();

$rol = $_SESSION['rol'];
$uri = $_SERVER['REQUEST_URI'];


if (!isset($_SESSION['rol'])) {

    header("location:../index.php");
    die();
}

if ($rol != 'Administrador' && $rol != 'General') {
    
    header("location:../index.php");
    die();
}

if ($rol == "Administrador" && $uri == "/evento/general/") {
    
    header("location:../admin");
    die();
}

if ($rol == "General" && $uri == "/evento/admin/") {
    
    header("location:../general");
    die();
}
?>