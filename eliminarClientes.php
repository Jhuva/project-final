<?php
// ELIMINAR CLIENTES
include_once("db.php");

$id= $_POST['idC'];

$eliminarCli = "DELETE FROM clientes WHERE id_cliente=$id";
$resultado = mysqli_query($conexion, $eliminarCli);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}


?>