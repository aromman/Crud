<?php
$host = "localhost";
$db = "ap.new";
$usuario = "ap.new";
$contraseña = "";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db", $usuario, $contraseña);
    if ($conexion) {
        echo "conectado correctamente al sistema";
    }
} catch (Exception $ex) {

    echo $ex->getMessage();
}
