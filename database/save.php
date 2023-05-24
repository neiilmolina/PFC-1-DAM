<?php
    
    if(isset($_GET['nombre'])){
        $guardar = $_GET['guardar'];
        require_once ('database.php');
        $database = new Database();
        $nombre = $_GET['nombre'];
        $arrayTitulos = elegirTabla($nombre);
        $valores = asignarValores($arrayTitulos);
        
        $database->save($nombre, $arrayTitulos, $valores);

        if($guardar == 'admin'){
            header('Location: ../admin.php?nombre=' . $nombre);
        } else if($guardar == 'signup'){
            $mensaje = 'Usuario registrado';
            header('Location: ../auth/login.php?mensaje=' . $mensaje .'&color=green');
        }
        echo 'lo has conseguido';   
        exit();
    } else{
        echo 'MAL';
    }
    
    function elegirTabla($tabla){
        $arrayTitulos = [];

        switch($tabla){ 
            case 'Usuario':
                $arrayTitulos =['nombre', 'apellidos', 'dni', 'email', 'direccion', 'telefono','rol_id', 'password'];
                break;
            case 'Producto':
                $arrayTitulos =['tipo', 'marcas', 'modelo', 'precio', 'estado'];
                break;
            case 'Distribuidor':
                $arrayTitulos =['nombre', 'direccion', 'email', 'telefono'];
                break;
            case 'Trabajador':
                $arrayTitulos =['nombre', 'apellidos', 'dni', 'email', 'direccion', 'telefono'];
                break;
        }    
        
        return $arrayTitulos;
    }

    function asignarValores($arrayTitulos){
        $array = [];
        foreach($arrayTitulos as $row){
            array_push($array, $_POST[$row]);
            echo $row .' ';
        }
        return $array;
        exit();
    }

?>