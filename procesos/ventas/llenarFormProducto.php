<?php 

    require_once "../../conexion.php";
    require_once "../../ventas.php";


    $obj = new ventas();

    echo json_encode($obj->obtenDatosProducto($_POST['idproducto']))

?>