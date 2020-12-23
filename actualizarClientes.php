<?php
// ACTUALIZAR PROVEEDORES
include_once("db.php");

$id= $_POST['idC'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$dni = $_POST['dni'];

$actualizarCli = "UPDATE clientes SET nombre='$nombre', apellido='$apellidos', direccion='$direccion', email='$correo', telefono='$telefono', dni='$dni'
                    WHERE id_cliente='$id'";
$resultado = mysqli_query($conexion, $actualizarCli);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}


?>