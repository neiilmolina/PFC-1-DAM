<?php
    require_once ('database/database.php');
    $database = new Database();
    $id = $_GET['id'];

    function generarNumeroAleatorio($min, $max) {
        return rand($min, $max);
    }

    function pintarCard($resultados){
            echo '<a href="productos.php?id='. $resultados['id'].'">';
            echo '<div class = productos>';
                echo '<img src="img/'. $resultados['tipo']. ' '. $resultados['modelo'] .'.JPG">';
                echo '<p>' .  $resultados['tipo'] . '</p>';
                echo '<p>' .  $resultados['marcas'] . '</p>';
                echo '<p>' .  $resultados['modelo'] . '</p>';
                echo '<p>' .  $resultados['precio'] .'€' . '</p>';
            echo '</div>';
            echo '</a>';
    }

    function pintarProducto($id){
        require_once ('database/database.php');
        $database = new Database();
        $resultado = $database->getById('Producto', $id);
    
        $marca = $resultado['marcas'];
        $modelo = $resultado['modelo'];
        $tipo = $resultado['tipo'];
        $precio = $resultado['precio'];
    
        echo '<div class="venta">';
            echo '<img  src="img/'. $tipo. ' '. $modelo.'.JPG" class="imagen-producto">';
        echo '<div class="opciones">';
                echo '<h2 class="titulo">'. $tipo .' '.$marca .' '. $modelo .'</h2>';
                echo '<h1 class="precio">'.$precio .' €</h1>';
            echo '<div class="cantidad">';
                    echo '<p>Cantidad</p>';
                echo '<div class="cantidad-opciones">';
                    echo '<div class="restar">-</div>';
                    echo '<div class="numero">1</div>';
                    echo '<div class="sumar">+</div>';
                    echo '</div>';
                echo '</div>';
            echo '<div class="botones">';
                echo '<div class="favoritos"><3</div>';
                    echo '<a href="" class="carrito">';
                       echo '<i class="fas fa-shopping-cart"></i><span>Añadir al carrito</span>';
                    echo '</a>';
                    echo '<a href="" class="comprar">Comprar</a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
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
    <link rel="stylesheet" href="style/productos.css">
    <link rel="stylesheet" href="fontawesome/fontawesome/css/all.min.css">
</head>
<body>
<?php
        session_start();
        $usuarioNombre;
        if(isset($_SESSION['pepito'])){
        $usuarioNombre = $_SESSION['pepito']['nombre'];

        if($_SESSION['pepito']['rol_id'] == 1){
        include 'html/header-admin.php';

        } else if($_SESSION['pepito']['rol_id'] == 2){
        include 'html/header-user.php';

        }else{
        header('Location: ../html/login.php');
        }
        }
        else{
          header('Location: ../html/login.php');
        }
    ?>
    <main>
        <?php
        pintarProducto($id);
        ?>
        <h2>Más productos</h2>
        <div class="mas-productos">
            <?php
                for($i = 0; $i<= 3; $i++){
                    $numero = generarNumeroAleatorio(1, 13);
                    $resultados = $database->getById('Producto',$numero);
                    pintarCard($resultados);
                }
            ?>
        </div>
    </main>
</body>
</html>