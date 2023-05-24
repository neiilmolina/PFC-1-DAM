<?php
    require_once ('database/database.php');
    $database = new Database();
    $idProducto;
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

    function pintarProducto($idProducto){
        require_once ('database/database.php');
        $database = new Database();
        $resultado = $database->getById('Producto', $idProducto);
    
        $marca = $resultado['marcas'];
        $modelo = $resultado['modelo'];
        $tipo = $resultado['tipo'];
        $precio = $resultado['precio'];
        // $favorito = false;
        // $href;
        // if($favorito){
        //     $href = "database/save.php?idUsuario='.$idUsuario.'&idProducto='.$idProducto.'&nombre=usuario_has_producto";
        //     $favorito = false;
        // } else{
        //     $href = "database/save.php?idUsuario='.$idUsuario.'&idProducto='.$idProducto.'&nombre=usuario_has_producto";
        //     $favorito = true;
        // }

        $href ="#";

        // $favoritoValue = $favorito ? 'true' : 'false';

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
                echo '<a  class="favoritos" onclick="cambiarCorazon()"><i class="fas fa-heart"></i></a>';
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
        include 'auth/header.php';
    ?>
    <main>
        <?php
        if(isset($_GET['id'])){
            $idProducto = $_GET['id'];
            pintarProducto($idProducto);
        
            echo '<h2>Más productos</h2>';
            echo '<div class="mas-productos">';
            
                for($i = 0; $i<= 3; $i++){
                    $numero = generarNumeroAleatorio(1, 13);
                    $resultados = $database->getById('Producto',$numero);
                    pintarCard($resultados);
                }
            echo '</div>';
        }
        ?>
    </main>
</body>

<script src="js\appProductos.js"></script>
</html>