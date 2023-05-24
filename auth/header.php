<?php
        session_start();
        $usuario;
        $usuarioNombre;
        $id;
        if(isset($_SESSION['pepito'])){
            $usario = $_SESSION['pepito'];
            $id = $_SESSION['pepito']['id']; 
            // if para asignar el nombre
            if($_SESSION['pepito']['nombre'] == null){
                $usuarioNombre = $_SESSION['pepito']['email'];
            } else{
                $usuarioNombre = $_SESSION['pepito']['nombre'];
            }

            // if para ver el header que va usar
            if($_SESSION['pepito']['rol_id'] == 1){
            include 'auth/header-admin.php';

            } else if($_SESSION['pepito']['rol_id'] == 2){
            include 'auth/header-user.php';

            } else{
                include 'auth/header-no-user.php';
            }
        }
        else {
            include 'auth/header-no-user.php';
        }
    ?>