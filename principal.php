<?php
    session_start();
    $varsesion = $_SESSION['usuario'];
    if($varsesion == null || $varsesion = '') {
        header("location:login.php");
        die();
    }

    include("db.php");

    //Variables para las tablas 

    $productos = "SELECT categoria.nombre_cat,
                        det_categoria.nombre_det,
                        productos.titulo,
                        productos.precio,
                        productos.imagen
                FROM categoria INNER JOIN det_categoria
                on categoria.id_cat=det_categoria.id_cat
                INNER JOIN productos on det_categoria.id_det=productos.id_det_categoria;";
    
    $proveedores = "SELECT * FROM proveedores";
    $administradores = "SELECT * FROM administrador";
    
    // Codigo para hacer el menu dinamico con php
    
    $categoria = "SELECT * FROM categoria";
    $consulta1 = mysqli_query($conexion,$categoria);
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Panel de Control</title>
</head>
<body>

    

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-12 col-md-9 col-lg-10">
            <h1 class="text-secondary">Panel de Administración</h1>
        </div>
        <div class="col-12 col-md-3 col-lg-2 mt-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuario
                </button>                 
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#contenidoModalR">Crear nuevo</a>
                    <a class="dropdown-item" href="cerrarSesion.php">Salir</a>
                </div>
                
            </div>
        </div>
    </nav>

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

    <section class="container mt-3">
        <div class="row mb-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active text-uppercase" href="#agregar" data-toggle="tab">Agregar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#productos" data-toggle="tab">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#proveedores" data-toggle="tab">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="#administradores" data-toggle="tab">Administradores</a>
                </li>
            </ul>
        </div>
    

        <!--MENU-->

        <div class="tab-content">
            <div class="tab-pane fade show active" id="agregar">
                <div class="row">
                    <div class="col col-md-3">
                        <div class="ariculos mt-5 mb-4">

                            <ul class="nav flex-column nav-pills" id="myTab" role="tablist" aria-orientation="vertical">

                            <?php while($fila = mysqli_fetch_array($consulta1)){?>

                                <li class="nav-item mt-1">
                                    <a href="principal.php?codigo=<?php echo $fila['id_cat'] ?>" title=" <?php echo $fila['nombre_cat']?>" id="computadoras-tab" class="nav-link"><?php echo $fila['nombre_cat']?></a>

                                </li>
                        
                            <?php } ?>




                                <!--
                                <li class="nav-item">
                                <a href="#blog" id="blog-tab" class="nav-link" data-toggle="tab">Blog</a>
                                </li>

                                <li class="nav-item">
                                <a href="#banner" id="banner-tab" class="nav-link" data-toggle="tab">Banner</a>
                                </li>-->
                            </ul>
                        </div>
                    </div>    

                    <div class="col col-md-9">
                        <div class="list-product mt-5 mb-5">
                        

                            <!--FORMULARIO-->

                                <h2>Agregar Artículo</h2>
                                <form action="agregarProducto.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mt-4 pt-2">
                                        <label for="seleccion">Categoría</label>

                                        <?php

                                        if(isset($_GET['codigo'])){
                                            $codigo = $_GET['codigo'];
                                        } else {
                                            $codigo=1;
                                        }
                                    
                                        $detCategoria = "SELECT * FROM det_categoria WHERE id_cat=$codigo";
                                        $consulta2=mysqli_query($conexion,$detCategoria);

                                        ?>


                                        <select name="seleccion" id="seleccion" class="form-control">

                                        <?php while($fila1 = mysqli_fetch_array($consulta2)) {?>

                                            <option value="<?php echo $fila1['id_det']; ?>"><?php echo utf8_encode($fila1['nombre_det'])?></option>


                                        <?php } ?>    
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

                        
                        
                        </div>
                    </div>
                </div>
            </div>
            
            <!--TABLE-->

            <div class="tab-pane fade pt-5 mb-5" id="productos">
                <div class="col">
            
                    <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm display" id="table_id">
                        <thead>
                            <tr class="table-primary">
                                <th>Categoría</th>
                                <th>Detalle</th>
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
                                <td><?php echo $mostrar["nombre_cat"]?></td>
                                <td><?php echo $mostrar["nombre_det"]?></td>
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
                                <form action="editarProducto.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="update_id">
                                    <div class="form-group">
                                        <label for="seleccion" id="categoria">Categoría</label>

                                        <?php

                                        if(isset($_GET['codigo'])){
                                            $codigo = $_GET['codigo'];
                                        } else {
                                            $codigo=1;
                                        }
                                    
                                        $detCategoria = "SELECT * FROM det_categoria WHERE id_cat=$codigo";
                                        $consulta2=mysqli_query($conexion,$detCategoria);

                                        ?>


                                        <select name="seleccion" id="seleccion" class="form-control">

                                        <?php while($fila1 = mysqli_fetch_array($consulta2)) {?>

                                            <option value="<?php echo $fila1['id_det']; ?>"><?php echo utf8_encode($fila1['nombre_det'])?></option>


                                        <?php } ?>    
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
                                    <div class="modal-footer">
                                    <a href="#" class="btn btn-primary">Guardar</a>
                                    <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                                    </div>
                                </form>
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
            <div class="tab-pane fade pt-5 mb-5" id="proveedores">
                <div class="col">
                    <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm display" id="table_idpr">
                    
                    <a href="#" class="btn btn-outline-secondary btn-md mb-4" role="button" data-toggle="modal" data-target="#agregarProveedor">Agregar</a>
                        
                        <thead>
                            <tr class="table-primary">
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Razon social</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>email</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $resultado1 = mysqli_query($conexion, $proveedores) or die (mysqli_error($conexion));
                                while($mostrar=mysqli_fetch_assoc($resultado1)){
                            ?>

                            <tr>
                                <td><?php echo $mostrar["id_prov"]?></td>
                                <td><?php echo $mostrar["nombre_prov"]?></td>
                                <td><?php echo $mostrar["raz_social"]?></td>
                                <td><?php echo $mostrar["direccion"]?></td>
                                <td><?php echo $mostrar["telefono"]?></td>
                                <td><?php echo $mostrar["email"]?></td>
                                <td>
                                    <a href="#" class="btn btn-outline-danger btn-sm editbtn" role="button" data-toggle="modal" data-target="#contenidoModalUpr">Actualizar</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalDpr">Eliminar</a>
                                </td>

                                <?php 
                                    } mysqli_free_result($resultado1);
                                ?>

                            </tr>
                            
                        </tbody>
                    </table>

                    <!--MODAL UPDATE-->
                    <div class="modal fade" id="contenidoModalUpr" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">¿Quieres modificar algún dato?</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="actualizarProveedores.php" method="POST">

                                        <input type="hidden" name="id" id="updateid">

                                        <div class="form-group">
                                            <p>Nombre del Proveedor</p>
                                            <input type="text" class="form-control" name="nombre" id="nombre">
                                        </div>
                                        <div class="form-group">
                                            <p>Razón Social</p>
                                            <input type="text" class="form-control" name="razonSocial" id="razonSocial">
                                        </div>
                                        <div class="form-group">
                                            <p>Dirección o Ubicación</p>
                                            <input type="text" class="form-control" name="direccion" id="direccion">
                                        </div>
                                        <div class="form-group">
                                            <p>Teléfono de contacto</p>
                                            <input type="number" class="form-control" name="telefono" id="telefono">
                                        </div>
                                        <div class="form-group">
                                            <p>Correo electrónico</p>
                                            <input type="text" class="form-control" name="correo" id="correo">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="registrar">Guardar cambios</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--MODAL DELETE-->
                    <div class="modal fade" id="contenidoModalDpr" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">¿Deseas Eliminarlo?</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="body">
                                    <form action="eliminarProveedores.php" method="POST">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="registrar">Guardar cambios</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--MODAL AGREGAR PROVEEDOR-->

                    <div class="modal fade" id="agregarProveedor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">¿Un miembro más al grupo?</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="agregarProveedores.php" method="POST">
                                    <div class="form-group">
                                        <p>Nombre del Proveedor</p>
                                        <input type="text" class="form-control" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <p>Razón Social</p>
                                        <input type="text" class="form-control" name="razonSocial">
                                    </div>
                                    <div class="form-group">
                                        <p>Dirección o Ubicación</p>
                                        <input type="text" class="form-control" name="direccion">
                                    </div>
                                    <div class="form-group">
                                        <p>Teléfono de contacto</p>
                                        <input type="number" class="form-control" name="telefono">
                                    </div>
                                    <div class="form-group">
                                        <p>Correo electrónico</p>
                                        <input type="text" class="form-control" name="correo">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                                
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade pt-5 mb-5" id="administradores">
                <div class="col">
                    <table class="table table-bordered table-hover table-responsive-sm mt-5 mb-5 btn-sm display" id="table_idad">                    
                        
                        <thead>
                            <tr class="table-primary">
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $resultado2 = mysqli_query($conexion, $administradores) or die (mysqli_error($conexion));
                                while($mostrar=mysqli_fetch_assoc($resultado2)){
                            ?>

                            <tr>
                                <td><?php echo $mostrar["usuario"]?></td>
                                <td><?php echo $mostrar["contraseña"]?></td>
                                <td>
                                    <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalUad">Actualizar</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" role="button" data-toggle="modal" data-target="#contenidoModalDad">Eliminar</a>
                                </td>

                                <?php 
                                    } mysqli_free_result($resultado2);
                                ?>

                            </tr>
                            
                        </tbody>
                    </table>

                    <!--MODAL UPDATE-->
                    <div class="modal fade" id="contenidoModalUad" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">¿Quieres modificar algún dato?</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-primary">Guardar</a>
                                        <a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--MODAL DELETE-->
                    <div class="modal fade" id="contenidoModalDad" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">¿Deseas Eliminarlo?</h4>
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
        $('#table_id').DataTable();
        } );
    </script>

    <script>
        $(document).ready( function () {
        $('#table_idpr').DataTable();
        } );
    </script>

    <script>
        $(document).ready( function () {
        $('#table_idad').DataTable();
        } );
    </script>

    <script>
        $('.editbtn').on('click',function() {
            $tr = $(this).closest('tr');
            var datos = $tr.children('td').map(function(){
                return $(this).text();
            });
            $('#updateid').val(datos[0]);
            $('#nombre').val(datos[1]);
            $('#razonSocial').val(datos[2]);
            $('#direccion').val(datos[3]);
            $('#telefono').val(datos[4]);
            $('#correo').val(datos[5]);
        });
    </script>

</body>
</html>