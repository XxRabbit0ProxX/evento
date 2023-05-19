<?php
require_once("cn.php");

$ema = $_GET['email'];
$con = $_GET['contrasena'];

$sentencia = "SELECT categoria FROM visitante WHERE email = '$ema' AND contrasena = '$con'";

$result = mysqli_query($cn, $sentencia);

if ($tupla = mysqli_fetch_array($result)) {

    $ses = $tupla['categoria'];

    session_start();

    $_SESSION['rol'] = $ses;
    
    echo json_encode([

        'message' => 'Usuario encontrado',
        'status' => '200',
        'value' => $ses
    ]);
} else{

    echo json_encode([

        'message' => 'Usuario inexistente',
        'status' => '404',
        'value' => 'null'
    ]);
}
?>