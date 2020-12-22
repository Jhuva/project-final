<?php
// ELIMINAR PROVEEDORES
include_once("db.php");

$id= $_POST['id'];

$eliminarProv = "DELETE FROM proveedores WHERE id_prov=$id";
$resultado = mysqli_query($conexion, $eliminarProv);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}


?>