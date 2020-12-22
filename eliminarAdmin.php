<?php
// ELIMINAR ADMINISTRADOR
include_once("db.php");

$idA= $_POST['idA'];

$eliminarAdmin = "DELETE FROM administrador WHERE id=$idA";
$resultado = mysqli_query($conexion, $eliminarAdmin);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}


?>