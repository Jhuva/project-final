<?php

    require_once "conexion.php";
    require_once "ventas.php";

    $objv = new ventas();


    $c = new conectar();
    $conexion = $c->conexion();

    $idventa = $_GET['idventa'];

    $sql = "SELECT  ventas.id_ventas,
                    ventas.fechaCompra,
                    clientes.id_cliente,
                    clientes.nombre,
                    clientes.apellido,
                    productos.id_producto,
                    productos.titulo,
                    productos.des_art,
                    productos.precio,
                    productos.imagen
            FROM clientes INNER JOIN  ventas
            ON   clientes.id_cliente=ventas.id_clientes
            INNER JOIN detalle_ventas
            ON   ventas.id_ventas=detalle_ventas.id_ventas
            INNER JOIN productos
            ON   detalle_ventas.id_producto=productos.id_producto
            AND detalle_ventas.id_ventas='$idventa'";
    $result = mysqli_query($conexion, $sql);
    $ver = mysqli_fetch_row($result);
    $codigo = $ver[0];
    $fecha = $ver[1];
    $idclientev = $ver[2];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Reporte de venta</title>
</head>
<body>
    <h2>Reporte de venta</h2>
    <br>

    <table class="table table-bordered table-hover table-responsive-sm">
        <thead>
            <tr class="table-white">
                <td>Fecha: <?php echo $fecha ?></td>
            </tr>
            <tr class="table-white">
                <td>Codigo: <?php echo $codigo ?></td>
            </tr>
            <tr class="table-white">
                <td>Cliente: <?php echo $objv->nombreCliente($idclientev); ?></td>
            </tr>
        </thead>
    </table>

    <table class="table table-bordered table-hover table-responsive-sm">
        <thead>
            <tr class="table-primary">
                <td>Nombre producto</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td>Cantidad</td>
                <td>Imagen</td>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql = "SELECT  ventas.id_ventas,
                ventas.fechaCompra,
                clientes.id_cliente,
                clientes.nombre,
                clientes.apellido,
                productos.id_producto,
                productos.titulo,
                productos.des_art,
                productos.precio,
                productos.imagen
                FROM clientes INNER JOIN  ventas
                ON   clientes.id_cliente=ventas.id_clientes
                INNER JOIN detalle_ventas
                ON   ventas.id_ventas=detalle_ventas.id_ventas
                INNER JOIN productos
                ON   detalle_ventas.id_producto=productos.id_producto
                AND detalle_ventas.id_ventas='$idventa'";
            $result = mysqli_query($conexion, $sql);
            $total=0;
            while($mostrar = mysqli_fetch_row($result)):
            ?>
            <tr>
                <td><?php echo $ver[6]?></td>
                <td><?php echo $ver[7]?></td>
                <td><?php echo $ver[8]?></td>
                <td>1</td>
                <td><img width="70px" src="data:image/jpg;base64, <?php echo base64_encode($ver[9]);?>"></td>
            </tr>
            <?php
                $total = $total + $ver[8];
                endwhile;
            ?>
        </tbody>
            
            <tr class="table-white">
                <td>Total(S/.)= <?php echo $total; ?></td>
            </tr>
    </table>







    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
</body>
</html>