<?php
    require_once ('database/database.php');
    $database = new Database();
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
                            echo '<a href= "filtro.php?tipo='. $row .'&estado='. $opcion.'">'. $opcion. '</a>';
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet" href="style/style.css">
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
            <a href="index.php"><img src="img/logo.png" alt=""></a>

            <div class="navegador">
                <input type="text">
                <button class="lupa"><i class="fas fa-search"></i></button>
            </div>

            <div id="usario-incio">
                <a href="html/login.php"><i class="fas fa-user"></i></a>
                <a href="html/carrito.php"><i class="fas fa-shopping-cart"></i></a>
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
    
</body>