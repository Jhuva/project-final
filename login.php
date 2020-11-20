<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css?1.0">
    <title>Infodata | Login</title>
</head>
<body>
    
    <form action="validar.php" method="post" class="login">
        <div class="login__container">
            <h2>Administrador</h2>
            <form class="login__container--form">
                <input class="input" type="text" placeholder="Usuario" name="usuario">
                <input class="input" type="password" placeholder="Contraseña" name="contraseña">
                <button class="button btn btn-danger">Ingresar</button>
            </form>
            
        </div>
    </form>

    <footer class="footer">
        <a href="">Terminos de uso</a>
        <a href="">Declaracion de privacidad</a>
        <a href="">Centro de ayuda</a>
    </footer>


    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>