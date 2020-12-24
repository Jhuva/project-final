<?php 

    session_start();

    require_once "conexion.php";
    require_once "ventas.php";

    $obj = new ventas();

    if(count($_SESSION['tablaComprasTemp'])==0) {
        echo 0;
    } else {
        $result = $obj->crearVenta();
        unset($_SESSION['tablaComprasTemp']);
        echo $result;
    }


?>