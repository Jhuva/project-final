<?php

session_start();

include_once("db.php");

$idcliente=$_POST['clienteVenta'];
$idproducto=$_POST['productoVenta'];
$descripcion=$_POST['descripcionVenta'];
$cantidad=$_POST['cantidadVenta'];
$precio=$_POST['precioVenta'];

$sql="SELECT nombre,apellido
        FROM clientes
        WHERE id_cliente='$idcliente'";

$result = mysqli_query($conexion, $sql);

$c=mysqli_fetch_row($result);

$ncliente=$c[1]." ".$c[0];

$sql="SELECT titulo
        FROM productos
        WHERE id_producto='$idproducto'";

$result= mysqli_query($conexion, $sql);

$nombreProducto=mysqli_fetch_row($result)[0];

$articulo = $idproducto."||".
            $nombreProducto."||".
            $descripcion."||".
            $precio."||".
            $ncliente."||".
            $idcliente;

$_SESSION['tablaComprasTemp'][]=$articulo;



?>