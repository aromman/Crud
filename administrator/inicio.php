<?php include('seccion/template/seccionheader.php'); ?>


<div class="col-md-12">
    <div class="jumbotron">
        <h1 class="display-3">Bienvenido <?php echo $nombreUsuario ?></h1>
        <p class="lead">Administrador</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Administrar Productos</a>
        </p>
    </div>
</div>

<?php include('seccion/template/seccionfooter.php'); ?>