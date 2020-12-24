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
    }


?>
