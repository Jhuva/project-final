<?php

include_once("db.php");

if (isset($_POST['registrar'])) {
    if (strlen($_POST['usuario']) >=1 && strlen($_POST['contraseña']) >=1) {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];

        $insertar = "INSERT INTO administrador(usuario, contraseña) VALUES ('$usuario', '$contraseña')";
        $resultado = mysqli_query($conexion, $insertar);

        if($resultado) {
            header("location:principal.php");
        } else {
            return "error";
        }
    } else {
        echo "<script>alert('Debe de completar todos los campos')</script>";
    }
}

?>