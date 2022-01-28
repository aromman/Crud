<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../index.php");
} else {
    if ($_SESSION['usuario'] == "ok") {
        $nombreUsuario = $_SESSION["nombreUsuario"];
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <link rel="shorcut icon" href="sitio\source\image001.jpg">
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php $urladmin = "http://" . $_SERVER['HTTP_HOST'] . "/sitio/administrator/inicio.php" ?>
    <?php $urlcerrarsesion = "http://" . $_SERVER['HTTP_HOST'] . "/sitio/administrator/seccion/cerrarsesion.php" ?>
    <?php $urlproductos = "http://" . $_SERVER['HTTP_HOST'] . "/sitio/administrator/seccion/productos.php" ?>
    <?php $urlsitio = "http://" . $_SERVER['HTTP_HOST'] . "/sitio/index.php" ?>


    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo $urladmin; ?>">Administrador <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $urladmin; ?>">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $urlproductos; ?>">Productos</a>
            <a class="nav-item nav-link" href="<?php echo $urlcerrarsesion; ?>">Cerrar sesion</a>
            <a class="nav-item nav-link" href="<?php echo $urlsitio; ?>" target="_blank">Ver Sitio</a>
        </div>
    </nav>


    <div class="container">
        <br>
        <div class="row">