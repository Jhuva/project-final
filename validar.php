
<?php

// Login 
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost", "root", "", "ecommerce_db");

$consulta="SELECT*FROM administrator where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if($filas){
    header("location:principal.php");
}else{
    ?>
    <?php
    include("login.php");
    ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);