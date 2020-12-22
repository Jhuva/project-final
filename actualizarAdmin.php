<?php
// ACTUALIZAR AMINISTRADORES
include_once("db.php");

$idA= $_POST['idA'];
$nombreA = $_POST['nombreA'];
$passwordA = $_POST['passwordA'];

$actualizarAdmin = "UPDATE administrador SET usuario='$nombreA', contraseña='$passwordA' WHERE id='$idA'";
$resultado = mysqli_query($conexion, $actualizarAdmin);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo realizar";
}


?>