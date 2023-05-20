<?php
    require_once ('../database/database.php');
    $database = new Database();
    $nombre = $_GET['nombre'];

    function elegirTabla($tabla){
        $arrayTitulos = [];

        switch($tabla){ 
            case 'Usuario':
                $arrayTitulos =['nombre', 'apellidos', 'dni', 'email', 'direccion', 'telefono','rol_id'];
                break;
            case 'Producto':
                $arrayTitulos =['tipo', 'marcas', 'modelo', 'precio', 'estado'];
                break;
            case 'Distribuidor':
                $arrayTitulos =['nombre', 'direccion', 'email', 'telefono'];
                break;
        }     
        
        return $arrayTitulos;
    }

    function pintarFormulario($array, $nombre){
       echo '<form action="../database/save.php?nombre='.$nombre.'" method="POST">';
                foreach($array as $campo){

                    switch($campo){
                        case 'precio':
                        case 'rol_id':
                            echo '<input type="number" name="'. $campo .'" placeholder= "'.$campo.'">';
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
                        default:
                            echo '<input type="text" name="'. $campo .'" placeholder= "'.$campo.'">';
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
            pintarFormulario($array,$nombre);
        ?>
    </main> 
</body>
</html>