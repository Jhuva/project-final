<?php

session_start();


// print_r($_SESSION['tablaComprasTemp']);


?>

<h4 class="mt-4">Hacer Venta</h4>
<h4><div id="nombreClienteVenta"></div></h4>

<table class="table table-bordered table-hover table-responsive-sm mt-4">
    <caption>
        <span class="btn btn-success">Generar venta</span>
    </caption>
    <thead>
        <tr class="table-primary">
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Precio</td>
            <td>Nombre cliente</td>
            <td>Quitar</td>
        </tr>
    </thead>
    <tbody>

    <?php 
    
    $total=0; // Esta variable tendra el total de la compra en dinero
    $cliente=""; // En esta se guarda el nombre del cliente

        if(isset($_SESSION['tablaComprasTemp'])):
            $i=0;
            foreach (@$_SESSION['tablaComprasTemp'] as $key) {
                
                $d=explode("||", @$key);

    ?>

        <tr>
            <td><?php echo $d[1] ?></td>
            <td><?php echo $d[2] ?></td>
            <td><?php echo $d[3] ?></td>
            <td><?php echo $d[4] ?></td>
            <td>
                <span class="btn btn-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">Quitar</span>
            </td>
        </tr>

    <?php 
            $total = $total + $d[3];
            $i++;
            }
        endif; 
    ?>    

    </tbody>
    
    <tr>
        <td><strong>Total de venta: <?php echo "S/.".$total; ?></strong></td>
    </tr>

</table>
