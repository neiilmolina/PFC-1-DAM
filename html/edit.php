<?php
    require_once ('../database/database.php');
    $database = new Database();
    $id = $_GET['id'];
    $nombre = $_GET['tabla'];
    $elemento = $database->getById($nombre,$id);

    // Aquí es necesario el id
    function elegirTabla($tabla){
        $arrayTitulos = [];

        switch($tabla){ 
            case 'Usuario':
                $arrayTitulos =['id', 'nombre', 'apellidos', 'dni', 'email', 'direccion', 'telefono','rol_id'];
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

    function pintarFormulario($array, $nombre, $elemento){
       echo '<form action="../database/update.php?nombre='.$nombre.'" method="POST">';
                foreach($array as $campo){

                    switch($campo){
                        case 'precio':
                        case 'rol_id':
                            echo '<input type="number" name="'. $campo .'" placeholder= "'.$campo.'" value="'. $elemento[$campo].'">';
                            break;
                        case 'estado':
                            echo '<select name="'.$campo.'">';
                                echo '<option value="Reacondicionado">Reacondicionado</option>';
                                echo '<option value="Nuevo">Nuevo</option>';
                            echo '</select>';
                            break;
                        case 'tipo':
                            echo '<select name="'.$campo.'">';
                                echo '<option value="Patinete">Patinete</option>';
                                echo '<option value="Bateria">Bateria</option>';
                                echo '<option value="Accesorio">Accesorio</option>';
                            echo '</select>';
                            break;
                        case 'id':
                            echo '<input type="hidden" name="'. $campo .'" placeholder= "'.$campo.'" value="'. $elemento[$campo].'">';
                            break;
                        default:
                            echo '<input type="text" name="'. $campo .'" placeholder= "'.$campo.'" value="'. $elemento[$campo].'">';
                        break;
                    }
                }
            echo '<button>Enviar</button>';
        echo '</form>';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <?php 
            $array = elegirTabla($nombre);
            pintarFormulario($array,$nombre, $elemento);
        ?>
    </main> 
</body>
</html>