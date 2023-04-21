<?php
    require_once ('database/database.php');
    $database = new Database();
    $nombre = $_GET['nombre'];
    $arrayTablas = ['Cliente', 'Producto', 'Trabajador', 'Distribuidor'];
    $arrayTitulos;


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
                    echo '<button class="resta"> <a href ="#"> <i class="fas fa-minus"></i> </a></button>';
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
            <li class="dropdown">
                <button class="dropbtn">Patinetes</button>
                <div class="dropdown-content">
                    <a href="#">Nuevos</a>
                    <a href="#">Reacondcionados</a>
                    <a href="#">Marcas</a>
                </div>
            </li>
            <li class="dropdown">
                <button class="dropbtn">Baterias</button>
                <div class="dropdown-content">
                    <a href="#">Baterias Nuevas</a>
                    <a href="#">Reacondcionadas</a>
                </div>
            </li>
            <li class="dropdown">
                <button class="dropbtn">Accesorios</button>
                <div class="dropdown-content">
                    <a href="#">Accesorios Nuevas</a>
                    <a href="#">Reacondcionadas</a>
                </div>
            </li>
            <li class="dropdown">
                <button class="dropbtn">Admin</button>
                <div class="dropdown-content">
                    <?php
                        pintarOpcionAdmin($arrayTablas);
                    ?>
                </div>
            </li>
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