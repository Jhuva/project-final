<?php

include_once("db.php");

if (isset($_POST['registrar'])) {
    if (strlen($_POST['usuario']) >=1 && strlen($_POST['contraseña']) >=1) {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        //fechareg = date("d/m/y")
        $insertar = "INSERT INTO administrador(usuario, contraseña) VALUES ('$usuario', '$contraseña')";
        $resultado = mysqli_query($conexion, $insertar);

        if($resultado) {
            header("location:principal.php");
        } else {
            return "error";
        }
    } else {
        echo "<script>
              alert('Debe de completar todos los campos');
              window.history.go(-1);
              </script>";
    }
}

?>

<?php
// INSERTAR EL FORMULARIOS DE LOS PRODUCTOS.

$seleccionlista2 = $_POST['seleccion'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$contenido = $_POST['contenido'];
$precio = $_POST['precio'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$insertarP = "INSERT INTO productos(categoria, titulo, des_art, cont_art, precio, imagen) VALUES ('$seleccion','$titulo','$descripcion','$contenido','$precio','$imagen')";
$resultado1 = mysqli_query($conexion, $insertarP);

if($result) {
    header("Location:principal.php");
} else {
    echo "No se pudo enviar";
}

?>