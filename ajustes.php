<?php
    require_once ('database/database.php');
    $database = new Database();
    $id;
    $elemento;
    $arrayTitulos =['id', 'nombre', 'apellidos', 'dni', 'email', 'direccion', 'telefono','rol_id', 'password'];
    // Cambiar formulario 
    function pintarFormulario($array, $nombre, $elemento){
        echo '<form action="database/update.php?nombre='.$nombre.'&guardar=ajustes" method="POST">';
                 foreach($array as $campo){
                    if($campo != 'id' && $campo != 'rol_id'&& $campo != 'password'){
                        echo '<label>'.strtoupper(substr($campo, 0, 1)). substr($campo, 1,strlen($campo)).'</label>';
                    } else if($campo == 'password'){
                        echo '<label>Contraseña</label>';
                    }
                     switch($campo){
                         case 'password':
                            echo '<input type="password" name="'. $campo .'" placeholder= "'.$campo.'" value="'. $elemento[$campo].'">';
                            break;
                         case 'rol_id':
                         case 'id':
                             echo '<input type="hidden" name="'. $campo .'" placeholder= "'.$campo.'" value="'. $elemento[$campo].'">';
                             break;
                         default:
                             echo '<input type="text" name="'. $campo .'" placeholder= "'.$campo.'" value="'. $elemento[$campo].'">';
                         break;
                     }
                 }
             echo '<button class="enviar">Enviar</button>';
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
    <link rel="stylesheet" href="style/formulario.css">
</head>
<body>
<?php
        include 'auth/header.php';
    ?>
    <main>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $elemento = $database->getById('Usuario',$id);
                pintarFormulario($arrayTitulos,'Usuario', $elemento);
            }
        ?>

    </main> 
</body>
</html>