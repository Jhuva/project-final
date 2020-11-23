<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    if($varsesion == null || $varsesion = '') {
        header("location:login.php");
        die();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Panel de Control</title>
</head>
<body>

    

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="mt-4 pt-4 pl-4 mb-4 pb-4 bg-danger text-light">
                    <h1 class="">Panel de Control</h1>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Crear nuevo</a>
                            <a class="dropdown-item" href="cerrarSesion.php">Salir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="row">
            <div class="col col-md-3">
                <div class="productos mt-5 mb-4">
                    <ul class="nav flex-column nav-pills" id="myTab" role="tablist" aria-orientation="vertical">
                        <li class="nav-item">
                            <a href="#computadoras" id="computadoras-tab" class="nav-link active" data-toggle="tab">Computadoras</a>
                        </li>

                        <li class="nav-item">
                            <a href="#portatiles" id="portatiles-tab" class="nav-link" data-toggle="tab">Portátiles</a>
                        </li>

                        <li class="nav-item">
                            <a href="#impresoras" id="impresoras-tab" class="nav-link" data-toggle="tab">Impresoras</a>
                        </li>

                        <li class="nav-item">
                            <a href="#monitores" id="monitores-tab" class="nav-link" data-toggle="tab">Monitores</a>
                        </li>

                        <li class="nav-item">
                            <a href="#cpu" id="cpu-tab" class="nav-link" data-toggle="tab">CPU</a>
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
                            <div class="form-group mt-4 pt-2">
                                <label for="seleccion">Categoría</label>
                                <select name="seleccion" id="seleccion" class="form-control">
                                    <option value="">Core i3</option>
                                    <option value="">Core i5</option>
                                    <option value="">Core i7</option>
                                    <option value="">Dual Core</option>
                                    <option value="">Penitum 4</option>
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
                                        <td>Core i3</td>
                                        <td>PC Core i3 3.2GHZ HP 8300 Elite (5ta.Gen)</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Core i3</td>
                                        <td>PC HP 6300 PRO Core I3 (3ºGen) + LED DE 19" HP</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Core i3</td>
                                        <td>PC Core i3 3.2GHZ HP 8300 Elite (5ta.Gen)</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Core i5</td>
                                        <td>AIO Lenovo E72Z core i5 - 3° Gen</td>
                                        <td>imagen</td>
                                        <td>
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Core i3</td>
                                        <td>AIO Lenovo M70z Core i3 3.2Ghz</td>
                                        <td>imagen</td>
                                        <td>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalU">Actualizar</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalD">Eliminar</a>
                                        </td>
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

                        <div class="tab-pane fade" id="blog">
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

                            <!--TABLE-->

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
                        </div>
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





    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>