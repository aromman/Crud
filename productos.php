<?php include("template/header.php"); ?>
<?php include("template/breadcrumbs.php") ?>
<?php
include("administrator/config/database.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="row">
    <?php foreach ($listaProductos as $producto) { ?>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <a href="equipos.html"><img src="./source/productos/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="..." /></a>
                <span> <?php echo $producto['nombre']; ?> </span>
            </div>
        </div>
    <?php } ?>
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <a href="automatizados.html"><img src="https://apbiotech.com.ar/pub/media/catalog/category/bioer_-_genepure_pro__hd__1_.jpg" class="card-img-top" alt="..." /></a>
            <span> Automizado </span>
        </div>
    </div>
</div>






<?php include("template/footer.php"); ?>