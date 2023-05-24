<?php
    require_once ('database/database.php');
    $database = new Database();
    $arrayTablas = ['Usuario', 'Producto', 'Distribuidor'];
    $arrayTipos = ['Patinete', 'Bateria', 'Accesorio'];
    $arrayEstados = ['Nuevo', 'Reacondicionado'];
        function pintarNav($array1, $array2, $array3){
            foreach($array1 as $row){
               echo '<li class="dropdown">';
                   echo '<button class="dropbtn">'. $row .'</button>';
                   echo '<div class="dropdown-content">';
                    foreach($array2 as $opcion){
                        echo '<a href= "filtro.php?tipo='. $row .'&estado='. $opcion.'">'. $opcion. '</a>';
                    }
                    echo '</div>';
                echo '</li>';
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
                <div class="login">
                <span><?php echo $usuarioNombre?></span> 
                    <a class="login-btn"><i class="fas fa-user"></i></a>
                    <div class ="contenido-login">
                        <?php echo '<a href="ajustes.php?nombre=Usuario&id='. $id.'">Ajustes</a>'?>
                        <a href="lista.php">Favoritos</a>
                        <a href="auth/logout.php">Cerrar Sesión</a>
                    </div>
                </div>
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