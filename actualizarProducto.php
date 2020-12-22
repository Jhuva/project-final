<?php
// ACTUALIZAR PRODUCTO
include_once("db.php");
$id = $_POST['id'];
$seleccion = $_POST['seleccion'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$contenido = $_POST['contenido'];
$precio = $_POST['precio'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$actualizarProd = "UPDATE productos SET titulo='$titulo', des_art='$descripcion', con_art='$contenido', precio='$precio', imagen='$imagen', id_det_categoria='$seleccion'
                    WHERE id_producto='$id'";
$resultado = mysqli_query($conexion, $actualizarProd);

if($resultado) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}

/*
"SELECT categoria.nombre_cat,
        det_categoria.nombre_det,
        productos.titulo,
        productos.precio,
        productos.imagen,
        productos.id_producto
                FROM categoria INNER JOIN det_categoria
                on categoria.id_cat=det_categoria.id_cat
                INNER JOIN productos on det_categoria.id_det=productos.id_det_categoria;";


*/
?>