<?php
// REGISTRAR CLIENTES
include_once("db.php");


$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$dni = $_POST['dni'];

$insertarCli = "INSERT INTO clientes(nombre, apellido, direccion, email, telefono, dni) VALUES ('$nombre','$apellidos', '$direccion', '$correo', '$telefono', '$dni')";
$resultado = mysqli_query($conexion, $insertarCli);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}


?>