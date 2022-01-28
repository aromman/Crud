<?php include("../seccion/template/seccionheader.php"); ?>
<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";

$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";

$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";

$txtStock = (isset($_POST['txtStock'])) ? $_POST['txtStock'] : "";

$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../config/database.php");


switch ($accion) {
    case "agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO productos (nombre, imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";

        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "../../source/productos/" . $nombreArchivo);
        }


        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();
        header("Location:productos.php");

        break;
    case "modificar":

        $sentenciaSQL = $conexion->prepare("UPDATE productos SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if ($txtImagen != "") {

            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "../../source/productos/" . $nombreArchivo);


            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($producto["imagen"]) && ($producto["imagen"] != "imagen.jpg")) {

                if (file_exists("../../source/productos/" . $producto["imagen"])) {
                    unlink("../../source/productos/" . $producto["imagen"]);
                }
            }


            $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            header("Location:productos.php");
            break;
        }
    case "cancelar":
        header("Location:productos.php");
        break;
    case "Seleccionar":

        $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre = $producto['nombre'];
        $txtImagen = $producto['imagen'];
        // echo "Presiono boton seleccionar";
        break;
    case "Borrar":

        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($producto["imagen"]) && ($producto["imagen"] != "imagen.jpg")) {

            if (file_exists("../../source/productos/" . $producto["imagen"])) {
                unlink("../../source/productos/" . $producto["imagen"]);
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        header("Location:/sitio/administrator/seccion/productos.php");
        // echo "Presiono boton borrar";
        break;
};

$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<br>
<br>


<div class="row">


    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Productos
            </div>
            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="txtID">ID:</label>
                        <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <label for="txtNombre">Nombre:</label>

                        <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del Producto">
                    </div>
                    <div class="form-group">
                        <label for="txtPrecio">Precio:</label>

                        <input type="text" required class="form-control" value="<?php echo $txtPrecio; ?>" name="txtPrecio" id="txtPrecio" placeholder="Precio del Producto">
                    </div>
                    <div class="form-group">
                        <label for="txtStock">Stock:</label>

                        <input type="text" required class="form-control" value="<?php echo $txtStock; ?>" name="txtStock" id="txtStock" placeholder="Cantidad de Producto">
                    </div>
                    <div class="form-group">
                        <label for="txtNombre">Imagen:</label>
                        <?php echo $txtImagen; ?><br>
                        <?php
                        if ($txtImagen != "") {

                        ?>
                            <img class="img-thumbnail rounded" src="../../source/productos/<?php echo $txtImagen ?>" width="200" alt="" srcset="">

                        <?php } ?>


                        <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre de la Imagen">
                    </div>

                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" name="accion" <?php echo ($accion == "Seleccionar") ? "disabled" : "" ?> value="agregar" class="btn btn-success">Agregar</button>
                        <button type="submit" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : "" ?> value="modificar" class="btn btn-warning">Modificar</button>
                        <button type="submit" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : "" ?> value="cancelar" class="btn btn-danger">Cancelar</button>
                    </div>


                </form>
            </div>

        </div>
    </div>
    <div class="col-md-7">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaProductos as $productos) { ?>
                    <tr>
                        <td scope="row"><?php echo $productos['id']; ?></td>
                        <td><?php echo $productos['nombre']; ?></td>
                        <td>
                            <img class="img-thumbnail rounded" src="../../source/productos/<?php echo $productos['imagen']; ?>" width="50" alt="" srcset="">
                        </td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $productos['id']; ?>" />

                                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />

                                <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                            </form>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>
</div>





<?php include("../seccion/template/seccionfooter.php") ?>