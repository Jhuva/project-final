<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    if($varsesion == null || $varsesion = '') {
        header("location:login.php");
        die();
    }

    include("db.php");

    $productos = "SELECT * FROM productos";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Panel de Control</title>
</head>
<body>

    

    <div class="container">
        <div class="row mt-4 pt-4 pl-4 mb-4 pb-4 bg-danger text-light">
            <div class="col-12 col-md-9 col-lg-10">
                <h1>Panel de Control</h1>
            </div>
            <div class="col-12 col-md-3 col-lg-2 mt-2">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                    </button>                 
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#contenidoModalR">Crear nuevo</a>
                        <a class="dropdown-item" href="cerrarSesion.php">Salir</a>
                    </div>
                
                </div>
            </div>
        </div>
    </div>

    <!--MODAL REGISTRAR USUARIO-->

    <div class="modal fade" id="contenidoModalR" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crea a un Nuevo administrador</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="registrar.php" method="POST">
                        <div class="form-group">
                            <p>Nombre de usuario</p>
                            <input type="text" class="form-control" name="usuario">
                        </div>
                        <div class="form-group">
                            <p>Contraseña</p>
                            <input type="password" class="form-control" name="contraseña">
                        </div>
                        <small class="form-text text-muted">Recuerde en no estar compartiendo su clave</small>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--MENU-->

    <section class="container">
        <div class="row">
            <div class="col col-md-3">
                <div class="productos mt-5 mb-4">
                    <ul class="nav flex-column nav-pills" id="myTab" role="tablist" aria-orientation="vertical" name="lista1">
                        <li class="nav-item">
                            <a href="#computadoras" id="computadoras-tab" class="nav-link active" data-toggle="tab" value="1">Computadoras</a>
                        </li>

                        <li class="nav-item">
                            <a href="#portatiles" id="portatiles-tab" class="nav-link" data-toggle="tab" value="2">Portátiles</a>
                        </li>

                        <li class="nav-item">
                            <a href="#impresoras" id="impresoras-tab" class="nav-link" data-toggle="tab" value="3">Impresoras</a>
                        </li>

                        <li class="nav-item">
                            <a href="#monitores" id="monitores-tab" class="nav-link" data-toggle="tab" value="4">Monitores</a>
                        </li>

                        <li class="nav-item">
                            <a href="#cpu" id="cpu-tab" class="nav-link" data-toggle="tab" value="5">CPU</a>
                        </li>

                        <li class="nav-item">
                            <a href="#blog" id="blog-tab" class="nav-link" data-toggle="tab">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a href="#banner" id="banner-tab" class="nav-link" data-toggle="tab">Banner</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col col-md-9">
                <div class="list-product mt-5 mb-4">
                    <div class="tab-content ml-4 mr-4">

                        <!--FORMULARIO-->

                        <div class="tab-pane fade show active" id="computadoras">
                            <h2>Computadoras</h2>
                            <form action="registrar.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group mt-4 pt-2">
                                    <label for="seleccion">Categoría</label>
                                    <select name="seleccionlista2" id="seleccionlista2" class="form-control">
                                    <option value="">Core i3</option>
                                    <option value="">Core i5</option>
                                    <option value="">Core i7</option>
                                    <option value="">Dual Core</option>
                                    <option value="">Penitum 4</option>
                                
                                    <?php
                                    // CODIGO INVALIDOS
                                        /*$consulta = "SELECT * FROM categoria";
                                        $ejecutar = mysqli_query($conexion,$consulta) or die (mysqli_error($conexion));
                                    ?>

                                    <?php foreach ($ejecutar as $opciones): ?>

                                        <option value="<?php echo $opciones ['nombre_cat'] ?>"><?php echo $opciones ['nombre_cat'] ?></option>

                                     <?php endforeach */ ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input class="form-control form-control-sm" type="text" id="titulo" name="titulo" placeholder="Escribe el título...">
                                </div>
                                <div class="form-group">
                                    <label for="mensaje">Descripción del Artículo</label>
                                    <textarea class="form-control" type="text" id="descripción" name="descripcion" placeholder="Escriba la descripción..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="mensaje">Contenido del Artículo</label>
                                    <textarea class="form-control" type="text" id="contenido" name="contenido" placeholder="Escriba el contenido..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input class="form-control form-control-sm" type="number" id="precio" name="precio" placeholder="Escribe el precio...">
                                </div>
                                <p>Seleccione imagen<p>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="elegirArchivo" lang="es" name="imagen">
                                    <label class="custom-file-label" for="elegirArchivo">Seleccionar Archivo</label>
                                </div>
                                <input type="submit" class="btn btn-primary mt-4" value="Agregar" name="guardar">
                            </form>
                            <!--TABLE-->

                            <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Categoría</th>
                                        <th>Título</th>
                                        <th>Galería</th>
                                        <th>Precio</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $resultado = mysqli_query($conexion, $productos) or die (mysqli_error($conexion));
                                        while($mostrar=mysqli_fetch_assoc($resultado)){
                                    ?>

                                    <tr>
                                        <td><?php echo $mostrar["categoria"]?></td>
                                        <td><?php echo $mostrar["titulo"]?></td>
                                        <td>
                                            <img width="70px" src="data:image/jpg;base64, <?php echo base64_encode($mostrar["imagen"]);?>">
                                        </td>
                                        <td><?php echo $mostrar["precio"]?></td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>

                                        <?php 
                                            } mysqli_free_result($resultado);
                                        ?>

                                    </tr>
                                    
                                </tbody>
                            </table>

                        </div>

                        <div class="tab-pane fade" id="portatiles">
                            <h2>Portatiles</h2>
                            <div class="form-group mt-4 pt-2">
                                <label for="seleccion">Categoría</label>
                                <select name="seleccion" id="seleccion" class="form-control">
                                    <option value="">Laptops Core i3</option>
                                    <option value="">Laptops Core i5</option>
                                    <option value="">Laptops Core i7</option>
                                    <option value="">Laptops Dual Core</option>
                                    <option value="">Laptops Penitum 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input class="form-control form-control-sm" type="text" id="titulo" name="titulo" placeholder="Escribe el título...">
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Descripción del Artículo</label>
                                <textarea class="form-control" type="text" id="descripción" name="descripción" placeholder="Escriba la descripción..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Contenido del Artículo</label>
                                <textarea class="form-control" type="text" id="contenido" name="contenido" placeholder="Escriba el contenido..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input class="form-control form-control-sm" type="text" id="precio" name="precio" placeholder="Escribe el precio...">
                            </div>
                            <p>Seleccione imagen<p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="elegirArchivo" lang="es">
                                <label class="custom-file-label" for="elegirArchivo">Seleccionar Archivo</label>
                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Agregar">

                            <!--TABLE-->

                            <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Categoría</th>
                                        <th>Título</th>
                                        <th>Galería</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Laptops Core i3</td>
                                        <td>LAPTOP EPIK ELL1201T INTEL ATOM 32GB</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Laptops Core i5</td>
                                        <td>NOTEBOOK HP 15 - DY1005LA</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Laptops Core i7</td>
                                        <td>NOTEBOOK HP HP PAVILION 15</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Laptops Core i5</td>
                                        <td>Dell Latitude e6320 Core I5</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Laptops Core i3</td>
                                        <td>LAPTOP HP Probook 4430s Core i3 2.3GHZ</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="impresoras">
                            <h2>Impresoras</h2>
                            <div class="form-group mt-4 pt-2">
                                <label for="seleccion">Categoría</label>
                                <select name="seleccion" id="seleccion" class="form-control">
                                    <option value="">Impresoras Laser</option>
                                    <option value="">Impresoras Tinta</option>
                                    <option value="">Impresoras Multifuncion</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input class="form-control form-control-sm" type="text" id="titulo" name="titulo" placeholder="Escribe el título...">
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Descripción del Artículo</label>
                                <textarea class="form-control" type="text" id="descripción" name="descripción" placeholder="Escriba la descripción..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Contenido del Artículo</label>
                                <textarea class="form-control" type="text" id="contenido" name="contenido" placeholder="Escriba el contenido..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input class="form-control form-control-sm" type="text" id="precio" name="precio" placeholder="Escribe el precio...">
                            </div>
                            <p>Seleccione imagen<p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="elegirArchivo" lang="es">
                                <label class="custom-file-label" for="elegirArchivo">Seleccionar Archivo</label>
                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Agregar">

                            <!--TABLE-->

                            <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Categoría</th>
                                        <th>Título</th>
                                        <th>Galería</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Impresora Laser</td>
                                        <td>IMPRESORA CANON PIXMA MG2410</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Impresoras Tinta</td>
                                        <td>impresora multifuncional EPSON l220</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Impresoras Multifuncion</td>
                                        <td>Impresora multifuncional EPSON l220</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Impresoras Multifuncion</td>
                                        <td>Impresora Multifuncional CANON 3610 WIFI</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="monitores">
                            <h2>Monitores</h2>
                            <div class="form-group mt-4 pt-2">
                                <label for="seleccion">Categoría</label>
                                <select name="seleccion" id="seleccion" class="form-control">
                                    <option value="">Monitores LCD</option>
                                    <option value="">Monitores LED</option>
                                    <option value="">Monitores DLP</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input class="form-control form-control-sm" type="text" id="titulo" name="titulo" placeholder="Escribe el título...">
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Descripción del Artículo</label>
                                <textarea class="form-control" type="text" id="descripción" name="descripción" placeholder="Escriba la descripción..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Contenido del Artículo</label>
                                <textarea class="form-control" type="text" id="contenido" name="contenido" placeholder="Escriba el contenido..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input class="form-control form-control-sm" type="text" id="precio" name="precio" placeholder="Escribe el precio...">
                            </div>
                            <p>Seleccione imagen<p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="elegirArchivo" lang="es">
                                <label class="custom-file-label" for="elegirArchivo">Seleccionar Archivo</label>
                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Agregar">

                            <!--TABLE-->

                            <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Categoría</th>
                                        <th>Título</th>
                                        <th>Galería</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Monitor LED</td>
                                        <td>MONITOR DELL - 17 PULGADAS</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Monitor LED</td>
                                        <td>MONITOR HP LED 24" V241P FULL HD 1080p</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Monitor LCD</td>
                                        <td>MONITOR LCD HP S1933 DE 18.5" WIDESCREEN</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Monitor DLP</td>
                                        <td>MONITOR NUEVO HP PRODISPLAY DE 20" DLP</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="cpu">
                            <h2>CPU</h2>
                            <div class="form-group mt-4 pt-2">
                                <label for="seleccion">Categoría</label>
                                <select name="seleccion" id="seleccion" class="form-control">
                                    <option value="">CPU 1 Nucleo</option>
                                    <option value="">CPU 2 Nucleos</option>
                                    <option value="">CPU 3 Nucleos</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input class="form-control form-control-sm" type="text" id="titulo" name="titulo" placeholder="Escribe el título...">
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Descripción del Artículo</label>
                                <textarea class="form-control" type="text" id="descripción" name="descripción" placeholder="Escriba la descripción..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Contenido del Artículo</label>
                                <textarea class="form-control" type="text" id="contenido" name="contenido" placeholder="Escriba el contenido..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input class="form-control form-control-sm" type="text" id="precio" name="precio" placeholder="Escribe el precio...">
                            </div>
                            <p>Seleccione imagen<p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="elegirArchivo" lang="es">
                                <label class="custom-file-label" for="elegirArchivo">Seleccionar Archivo</label>
                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Agregar">

                            <!--TABLE-->

                            <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Categoría</th>
                                        <th>Título</th>
                                        <th>Galería</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CPU 2 Nucleos</td>
                                        <td>CPU i5 4ta Generación - Lenovo tiny</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>CPU 1 Nucleo</td>
                                        <td>PC TOWER HP 3500 PRO Core I5 - 3ra.GEN.</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>CPU 1 Nucleo</td>
                                        <td>PC Core i5 3.2GHZ HP 8300 Elite (3ra.Gen)</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>CPU 3 Nucleos</td>
                                        <td>HP 6000 PRO – 8000 PRO C2D 3.0 GHZ DESKTOP</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>CPU 2 Nucleos</td>
                                        <td>PC DELL TOWER GX745 C2D 2.1 GHZ</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!--<div class="tab-pane fade" id="blog">
                            <h2>Administra tus Blogs</h2>
                            <div class="form-group mt-4 pt-2">
                                <label for="titulo">Título</label>
                                <input class="form-control form-control-sm" type="text" id="titulo" name="titulo" placeholder="Escribe el título...">
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Descripción del Artículo</label>
                                <textarea class="form-control" type="text" id="descripción" name="descripción" placeholder="Escriba la descripción..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Contenido del Artículo</label>
                                <textarea class="form-control" type="text" id="contenido" name="contenido" placeholder="Escriba el contenido..."></textarea>
                            </div>
                            <p>Seleccione imagen<p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="elegirArchivo" lang="es">
                                <label class="custom-file-label" for="elegirArchivo">Seleccionar Archivo</label>
                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="Agregar">

                            TABLE

                            <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm">
                                <thead>
                                    <tr class="table-primary">
                                        <th>Título</th>
                                        <th>Imagen</th>
                                        <th>Descripción</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>¿CÓMO USAR EL TEAMVIEWER?</td>
                                        <td>Imagen</td>
                                        <td>TeamViewer es una de las mejores aplicaciones de acceso remoto del mercado, y sus usuarios la utilizan para poder conectarse en escasos segundos con cualquier computadora o servidor, 
                                            independientemente de la ubicación geográfica en la que éstos se encuentren, para poder controlar estos dispositivos de forma remota, compartir escritorios y trasferir todo tipo de archivos, 
                                            en forma trasparente, sencilla y rápida.</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>ALERTA: LO QUE NO DEBEMOS HACER CON NUESTRA PC</td>
                                        <td>Imagen</td>
                                        <td>Cuando comenzamos por primera vez en nuestra vida a utilizar una computadora, no sólo debemos aprender sacarle el máximo provecho, sino también debemos tomar ciertos recaudos para evitar tener que enfrentarnos a problemas en el futuro.</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>COMO LIMPIAR TU PC DE SOBREMESA PASO A PASO</td>
                                        <td>Imagen</td>
                                        <td>¿Has limpiado alguna vez tu ordenador por dentro? Si no lo has hecho nunca, da por seguro que estará lleno de suciedad. Te enseñamos el mejor método y todos los trucos que necesitas saber para limpiar a fondo tu ordenador y mejorar las temperaturas de funcionamiento</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>COMO RESTAURAR WINDOWS 10 PARA QUE FUNCIONE MÁS RAPIDO</td>
                                        <td>Imagen</td>
                                        <td>Windows 10 es el sistema operativo mayoritario en todo el mundo. Sin embargo, gran parte de sus usuarios registra lentitud en su PC con el paso del tiempo. Si quieres acelerar el funcionamiento de tu ordenador con W10, puedes hacerlo gracias a la herramienta de limpieza de software del sistema.</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>-->
                        <!--<div class="tab-pane fade" id="banner">
                            <h2>Banners</h2>
                        </div>-->
                        


                        <!--MODAL UPDATE-->
                        <div class="modal fade" id="contenidoModalU" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Actualizar</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-primary">Guardar</a>
                                        <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--MODAL DELETE-->
                        <div class="modal fade" id="contenidoModalD" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">¿Deseas Borrar?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-primary">Borrar</a>
                                        <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <a href="">Terminos de uso</a>
        <a href="">Declaracion de privacidad</a>
        <a href="">Centro de ayuda</a>
        <a href="">Copyright 2020 InfoData | Todos los derechos reservados</a>
    </footer>




    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            recargarLista();

            $('#myTab').change(function(){
                recargarLista();
            });
        })
    </script>
    <script type="text/javascript">
        function recargarLista(){
            $.ajax({
                type:"POST",
                url: "principal.php",
                data: "categoria=" + $('#myTab').val(),
                succes:function(r){
                    $('#seleccionlista2').html(r);
                }
            });
        }
    </script>

</body>
</html>