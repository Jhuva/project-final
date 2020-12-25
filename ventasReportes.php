<?php

require_once "ventas.php";
require_once "conexion.php";

$c = new conectar();
$conexion = $c->conexion();

$obj = new ventas();

$sql = "SELECT id_ventas,
                fechaCompra,
                id_clientes
        FROM ventas GROUP BY id_ventas";
$result = mysqli_query($conexion,$sql);


?>

<div class="row">
    <div class="col">
        <h4 class="mt-4">Reportes y Ventas</h4>
            <table class="table table-bordered table-hover table-responsive-sm mt-4">
                <caption>
                                            
                </caption>
                <thead>
                <tr class="table-primary">
                    <td>Codigo</td>
                    <td>Fecha</td>
                    <td>Cliente</td>
                    <td>Total de compra</td>
                    <!--<td>Ticket</td>-->
                    <td>Reporte</td>
                </tr>
                </thead>
                <tbody>
                <?php while($ver=mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $ver[0] ?></td>
                        <td><?php echo $ver[1] ?></td>
                        <td>
                            <?php if($obj->nombreCliente($ver[2]) == " "){
                                echo "S/C";
                                } else {
                                    echo $obj->nombreCliente($ver[2]);
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                echo "S/.".$obj->obtenerTotal($ver[0]);
                            ?>
                        </td>
                        <!--<td>
                            <a href="#" class="btn btn-outline-danger btn-sm">Ticket</a>
                        </td>-->
                        <td>
                            <a href="crearReportePdf.php?idventa=<?php echo $ver[0] ?>" class="btn btn-outline-danger btn-sm">Reporte</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
    </div>
</div>
