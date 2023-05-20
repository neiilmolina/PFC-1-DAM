<?php
// 1. Recoger los elementos del formulario de login.php
$email = $_POST['email'];
$password = $_POST['password'];

// 2. Importar clase Database.php
require_once ('../database/database.php');

// 3. Invocar funcion login de Database.php
$database = new Database();
$respuesta = $database->login($email, $password);
$mensaje = "No exite usuario con ese email y contraseña";

// 4. Comprobar contenido de la respuesta
if($respuesta == null){
    // Ir al login
        header('Location: ../html/login.php?mensaje='. $mensaje);
}else{
    // Comprobamos rol: si es admin te mando a admin y si es usuario te mando a usuario.
    if($respuesta['rol_id'] == 1 || $respuesta['rol_id'] == 2){
        session_start();
        $_SESSION['pepito'] = $respuesta;
        header('Location: ../index.php');
    }
}
?>