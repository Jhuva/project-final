
<?php
// INSERTAR EL FORMULARIOS DE LOS PRODUCTOS.

include_once("db.php");

$seleccion = $_POST['seleccion'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$contenido = $_POST['contenido'];
$precio = $_POST['precio'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$insertarP = "INSERT INTO productos(titulo, des_art, con_art, precio, imagen, id_det_categoria) VALUES ('$titulo','$descripcion','$contenido','$precio','$imagen','$seleccion')";
$resultado1 = mysqli_query($conexion, $insertarP);

if($resultado1) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}

?>