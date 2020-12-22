<?php
// ACTUALIZAR PROVEEDORES
include_once("db.php");

$id= $_POST['id'];
$nombre = $_POST['nombre'];
$razonSocial = $_POST['razonSocial'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$actualizarProv = "UPDATE proveedores SET nombre_prov='$nombre', raz_social='$razonSocial', direccion='$direccion', telefono='$telefono', email='$correo'
                    WHERE id_prov='$id'";
$resultado = mysqli_query($conexion, $actualizarProv);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}


?>