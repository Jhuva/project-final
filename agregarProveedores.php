<?php
// REGISTRAR PROVEEDORES
include_once("db.php");


$nombre = $_POST['nombre'];
$razonSocial = $_POST['razonSocial'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

$insertarProv = "INSERT INTO proveedores(nombre_prov, raz_social, direccion, telefono, email) VALUES ('$nombre','$razonSocial', '$direccion', '$telefono', '$correo')";
$resultado = mysqli_query($conexion, $insertarProv);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}


?>