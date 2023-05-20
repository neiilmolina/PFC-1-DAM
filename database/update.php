<?php
    
    if(isset($_GET['nombre'])){
        require_once ('database.php');
        $database = new Database();
        $nombre = $_GET['nombre'];
        $arrayTitulos = elegirTabla($nombre);
        $valores = asignarValores($arrayTitulos);
        $database->update($nombre, $arrayTitulos, $valores);
        header('Location: ../admin.php?nombre=' . $nombre);
    } else{
        echo 'MAL';
    }
    
    // Aquí es necesario el id
    function elegirTabla($tabla){
        $arrayTitulos = [];

        switch($tabla){ 
            case 'Usuario':
                $arrayTitulos =['id', 'nombre', 'apellidos', 'dni', 'email', 'direccion', 'telefono', 'rol_id'];
                break;
            case 'Producto':
                $arrayTitulos =['id', 'tipo', 'marcas', 'modelo', 'precio', 'estado'];
                break;
            case 'Distribuidor':
                $arrayTitulos =['id', 'nombre', 'direccion', 'email', 'telefono'];
                break;
        }     
        
        return $arrayTitulos;
    }

    function asignarValores($arrayTitulos){
        $array = [];
        foreach($arrayTitulos as $row){
            array_push($array, $_POST[$row]);
            if(is_string($row)){
                echo $row . ' ';
            }
        }
        return $array;
    }

?>