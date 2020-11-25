<?php

include("db.php");

if (isset($_POST['registrar'])) {
    if (strlen ($_POST['usuario']) >= 1 && strlen ($_POST['contraseña']) >= 1) {
        $usuario = trim($_POST['usuario']);
        $contraseña = trim($_POST['contraseña']);
        $fechareg = date("d/m/y");
        $consulta = "INSERT INTO administrator(usuario, contraseña, fecha) VALUES ('$usuario','$contraseña','$fechareg')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado) {
            ?>
                <div class="alert alert-primary">
                    ¡Te has inscrito correctamente!
                </div>
            <?php
        } else {
            ?>
                <div class="alert alert-warning">
                    ¡Ups! Ha ocurrido un error
                </div>
            <?php
        }
    } else {
        ?>
            <div class="alert alert-warning">
                ¡Por favor complete los campos!
            </div>
        <?php
    }
}

?>