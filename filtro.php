<?php
    require_once ('database/database.php');
    $database = new Database();
    $tipo = $_GET['tipo'];
    $estado = $_GET['estado'];
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
    function pintarCard($resultados){
        foreach($resultados as $row){
            echo '<a href=#>';
            echo '<div class = productos>';
                echo '<img src="img/'. $row['tipo']. ' '. $row['modelo'] .'.JPG">';
                echo '<p>' .  $row['tipo'] . '</p>';
                echo '<p>' .  $row['marcas'] . '</p>';
                echo '<p>' .  $row['modelo'] . '</p>';
                echo '<p>' .  $row['precio'] .'€' . '</p>';
            echo '</div>';
            echo '</a>';
        }
    }

    function pintarH1($tipo, $estado){
        if ($tipo == 'Bateria'){
            echo '<h1>'. $tipo . 's ' . strtolower(substr($estado, 0, strlen($estado) - 1)) . 'as'.'</h1>';
           
        } else{
            echo '<h1>'. $tipo . 's ' . strtolower($estado) . 's'.'</h1>';
        }
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
    <link rel="stylesheet" href="style/filtro.css">
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.min.css">

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
    <main>
        <?php 
           pintarH1($tipo, $estado);
        ?>
        <div class="secciones">
            <?php
                $resultados = $database->get("SELECT * FROM producto WHERE tipo = '$tipo' AND estado = '$estado'");
                pintarCard($resultados);
            ?>
        </div>
    </main>
</body>
</html>