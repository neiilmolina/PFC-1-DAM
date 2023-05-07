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
    <link rel="stylesheet" href="../style/productos.css">
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.min.css">

</head>
<body>
<?php
    require_once ('../database/database.php');
    $database = new Database();
    $arrayTablas = ['Cliente', 'Producto', 'Trabajador', 'Distribuidor'];
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
    <link rel="stylesheet" href="style/style.css">
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
            <img src="img/logo.png" alt="">

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
</body>