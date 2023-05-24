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
    <link rel="stylesheet" href="../style/signup.css">
</head>

<body onmouseover="validar()">
    <main>
        <img src="../img/logo1.png" alt="">
        <h2>Registrate</h2>
        <form action="../database/save.php?nombre=Usuario&guardar=signup" method="POST">
            <div>
                <label>Dirección de correo</label>
                <input type="email" class="inicio" name="email" autofocus>
                <span></span>
                <br>

                <label>Contraseña</label>
                <input type="password" class="inicio" name="">
                <span></span>
                <br>

                <label>Confirmar Contraseña</label>
                <input type="hidden" class="incio" value="2" name="rol_id">
                <input type="password" class="inicio" name="password" >
                <span></span>
                <br>
            </div>

            <button disabled>Acceder</button>
        </form>

        <a href="localhost">¿Olvidaste tu contraseña?</a>
        <a href="login.php">¿Tienes cuenta?</a>
        <a href="../index.php">Volver a EcoScoter</a>

    </main>
</body>
<script src="../js/appSignUp.js"></script>
</html>