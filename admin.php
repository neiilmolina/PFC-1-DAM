<?php
    require_once ('database/database.php');
    $database = new Database();
    $nombre = $_GET['nombre'];
    $arrayTablas = ['Cliente', 'Producto', 'Trabajador', 'Distribuidor'];
    $arrayTipos = ['Patinete', 'Bateria', 'Accesorio', 'Admin'];
    $arrayEstados = ['Nuevo', 'Reacondicionado'];

    function pintarNav($array1, $array2, $array3){
        foreach($array1 as $row){
           echo '<li class="dropdown">';
               echo '<button class="dropbtn">'. $row .'</button>';
               echo '<div class="dropdown-content">';
                   if($row == 'Admin'){
                    pintarOpcionAdmin($array3);
                   } else{
                    foreach($array2 as $opcion){
                        echo '<a href= ".php?tipo='. $row .'&estado='. $opcion.'">'. $opcion. '</a>';
                    }
                   }
                echo '</div>';
            echo '</li>';
        }
    }


    function pintarOpcionAdmin($array){
        foreach($array as $row ){
            echo '<a href= "admin.php?nombre='. $row .'">'. $row. '</a>';
        }
    }

    function elegirTabla($tabla){
        $arrayTitulos = [];

        switch($tabla){ 
            case 'Cliente':
                $arrayTitulos =['id', 'nombre', 'apellidos', 'dni'];
                break;
            case 'Producto':
                $arrayTitulos =['id', 'tipo', 'marcas', 'modelo'];
                break;
            case 'Distribuidor':
                $arrayTitulos =['id', 'nombre', 'telefono'];
                break;
            case 'Trabajador':
                $arrayTitulos =['id', 'nombre', 'apellidos', 'dni'];
                break;
        }     
        
        return $arrayTitulos;
    }

    function pintarTabla($array, $tabla){
        $database = new Database();
        $resultados = $database->getAll($tabla);
        echo '<thead>';
            foreach($array as $row){
                echo '<th>' . $row . '</th>';
            }
            echo '<th>Opción</th>';
        echo '</thead>';
        echo '<tbody>';
        foreach($resultados as $row){
            echo '<tr>';
            foreach($array as $campo){
                echo '<td>' . $row[$campo] . '</td>';
            }
                echo '<td class = opciones> ';
                    echo '<button class="suma"> <a href ="#"> <i class="fas fa-plus"></i> </a></button>';
                    echo '<button class="resta"> <a href ="database/delete.php?id='.$row['id'].'&tabla='. $tabla.'"> <i class="fas fa-minus"></i> </a></button>';
                    echo '<button class="edit"> <a href ="#"> <i class="fas fa-edit"></i> </a></button>';
                echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
    }
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
    <title>Ecscooter</title>
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div id="arriba">
            <div>
                <a href=""><i class="fas fa-phone-alt"></i></a>
                <a href="#footer" class="direccion">C. de Bernardino Obregón, 25, 28012 Madrid</a>
            </div>

            <div>
                <a href=""><i class="fab fa-whatsapp"></i></a>
                <a href="#footer" class="direccion">C. de Bernardino Obregón, 25, 28012 Madrid</a>
            </div>
        </div>

        <div id="abajo">
            <img src="img/logo.png" alt="">

            <div class="navegador">
                <input type="text">
                <button class="lupa"><i class="fas fa-search"></i></button>
            </div>

            <div id="usario-incio">
                <a href="login.html"><i class="fas fa-user"></i></a>
                <a href="carrito.html"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </header>
    <nav>
        <ul>
        <?php
                pintarNav($arrayTipos, $arrayEstados, $arrayTablas);
            ?>  
        </ul>
    </nav>
    <main>
        <table>
            <?php
                $arrayTitulos = elegirTabla($nombre);
                pintarTabla($arrayTitulos,$nombre);
            ?>
        </table>
    </main>
</body>

</html>