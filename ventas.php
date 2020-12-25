<?php    

    class ventas {
        public function obtenDatosProducto($idproducto){

            $c = new conectar();
            $conexion = $c->conexion();

            $sql = "SELECT categoria.nombre_cat,
                    det_categoria.nombre_det,
                    productos.titulo,
                    productos.des_art,
                    productos.precio,
                    productos.imagen,
                    productos.id_producto
                    FROM categoria INNER JOIN det_categoria
                    on categoria.id_cat=det_categoria.id_cat
                    INNER JOIN productos on det_categoria.id_det=productos.id_det_categoria
                    AND productos.id_producto='$idproducto'";
            
            $result = mysqli_query($conexion,$sql);

            $ver = mysqli_fetch_row($result);

            $datos = array(
                'titulo' => $ver[2],
                'des_art' => $ver[3],
                'precio' => $ver[4]
            );
            return $datos;
        }

        public function crearVenta(){
            $c = new conectar();
            $conexion = $c->conexion();

            $fecha=date('y-m-d');
            $idventa=self::creaFolio();
            $datos=$_SESSION['tablaComprasTemp'];
            $r=0;

            for($i=0; $i < count($datos); $i++) {
                $d=explode("||", $datos[$i]);

                $sql = "INSERT INTO ventas(id_ventas,
                                            id_clientes,
                                            costoTotal,
                                            fechaCompra)
                        VALUES ('$idventa',
                                '$d[5]',
                                '$d[3]',
                                '$fecha')";
                
                $sql1 = "INSERT INTO detalle_ventas(id_producto,
                                                    id_ventas,
                                                    subTotal) 
                        VALUES ('$d[0]',
                                '$idventa',
                                '$d[3]')";
                
                $r = $r + $result=mysqli_query($conexion,$sql);
                $r = $r + $result1=mysqli_query($conexion,$sql1);
            }

            return $r;

        }

        public function creaFolio(){

            $c = new conectar();
            $conexion = $c->conexion();

            $sql = "SELECT id_ventas FROM ventas GROUP BY id_ventas DESC";

            $resul = mysqli_query($conexion,$sql);
            $id=mysqli_fetch_row($resul)[0];

            if($id == "" or $id == null or $id == 0) {
                return 1;
            } else {
                return $id + 1;
            }

        }

        public function nombreCliente($idCliente) {
            
            $c = new conectar();
            $conexion = $c->conexion();

            $sql = "SELECT nombre, apellido
                    FROM clientes
                    WHERE id_cliente = '$idCliente'";
            
            $result = mysqli_query($conexion, $sql);

            $ver = mysqli_fetch_row($result);

            return $ver[1]." ".$ver[0];
        }

        public function obtenerTotal($idventa) {
            $c = new conectar();
            $conexion = $c->conexion();

            $sql = "SELECT subTotal
                    FROM detalle_ventas
                    WHERE id_ventas='$idventa'";
            $result = mysqli_query($conexion, $sql);

            $total = 0;

            while($ver=mysqli_fetch_row($result)) {
                $total = $total + $ver[0];
            }

            return $total;

        }

    }


?>
