<?php
// 1. Recoger los elementos del formulario de login.php
$email = $_POST['email'];
$password = $_POST['password'];

// 2. Importar clase Database.php
require_once ('../database/database.php');

// 3. Invocar funcion login de Database.php
$database = new Database();
$respuesta = $database->login($email, $password);
$mensaje;

// 4. Comprobar contenido de la respuesta
if($respuesta == null){
    $color = 'red';
    $mensaje = "No exite usuario con este email y contraseña";
    // Ir al login
    header('Location: login.php?mensaje='. $mensaje. '&color='.$color );
}else{
    // Comprobamos rol: si es admin te mando a admin y si es usuario te mando a usuario.
    if($respuesta['rol_id'] != null){
        session_start();
        $_SESSION['pepito'] = $respuesta;
        header('Location: ../index.php');
    }
}
?>