<?php
// ELIMINAR PRODUCTOS
include_once("db.php");

$id= $_POST['id'];

$eliminarProd = "DELETE FROM productos WHERE id_producto=$id";
$resultado = mysqli_query($conexion, $eliminarProd);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}


?>