<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shorcut icon" href="sitio/source/image001.jpg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <title>AP-Biotech</title>
</head>

<body>

    <div class="header">
        <a href="index.php"><img src="source\image001.jpg" alt="logo" id="logo" width="auto" height="100px" /></a>
        <!--buscador-->
        <form class="buscador" action="#">
            <input type="text" placeholder="Buscar Productos.." name="search" />
            <button type="submit" class="fa fa-search"></button>
        </form>
        <!--buscador boostrap2-->
        <form class="form-inline my-2 my-lg-0">
            <input type="text" class="form-control mr-sm-2" type="Buscar Productos..." placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="iconoscuenta">
            <ul>
                <li class="fas fa-user"><span>Mi cuenta</span></li>
                <li class="fas fa-shopping-cart"><span>Carrito</span></li>
                <li class="fas fa-heart"><span>Favoritos</span></li>
            </ul>
        </div>
    </div>

    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="productos.php" target="_blank" rel="noopener noreferrer">
                    <img src="source\banners\BANNERS WEB-02.jpg" style="width: 1345px;height: 300px;" alt="First slide">
                </a>
            </div>
            <div class="carousel-item">
                <img src="source\banners\BANNERS WEB-01.jpg" style="width: 1345px;height: 300px;" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="source\banners\BANNERS WEB-05.jpg" style="width: 1345px;height: 300px;" alt="Third slide">
            </div>
        </div>

    </div>


    <!-- Nav tabs -->
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
        </li>
        <li class=" nav-item">
            <a class="nav-link" href="promociones.php">Promociones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="productos.php">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="lineadiagnostico.php">Linea Diagnostico</a>
        </li>
        <li class=" nav-item">
            <a class="nav-link" href="postventa.php">Post Venta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="quienessomos.php">Quienes Somos?</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="trabajaconnosotros.php">Trabaja con nosotros</a>
        </li>
    </ul>