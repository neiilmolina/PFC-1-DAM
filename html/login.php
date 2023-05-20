<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Neil Molina; Gonzalo Leiva">
    <meta name="keywords"
        content="patines electricos, patines reacondicionados, patines nuevos, accesorios para patines, baterías para patines">
    <meta name="description"
        content="Una tienda de patines eléctricos nuevos y reacondcionados que tiene servicio a domicilio y una tienda en Madrid">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/login.css">
</head>

<body>
    <main>
        <img src="../img/logo1.png" alt="">
        <h2>Inicia Sesion</h2>
        <p style="color:red;"> 
            <?php
                if(isset($_GET['mensaje'])){
                    $mensaje = $_GET['mensaje'];
                    echo $mensaje;
                }
            ?>
        </p>
        <form action="../database/comprobar.php" method="POST">
            <div>
                <label>Dirección de correo</label>
                <input name="email" type="email" class="inicio" onblur="validarEmail()" autofocus>
                <span></span>
                <br>

                <label>Contraseña</label>
                <input name="password" type="password" class="inicio" onblur="validarContraseña()">
                <span></span>
                <br>
            </div>

            <div>
                <div>
                    <input id="marcar" type="checkbox">
                    <label>Recuérdame</label>
                </div>
                <?php echo '<button onclick="validar()">Acceder</button>'?>
            </div>
        </form>

        <a href="localhost">¿Olvidaste tu contraseña?</a>
        <a href="signup.php">¿No tienes cuenta?</a>
        <a href="../index.php">Ir a EcoScoter</a>

    </main>
</body>
<script src="../js/appLogin.js"></script>
</html>