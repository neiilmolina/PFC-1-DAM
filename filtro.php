<?php
    $tipo = $_GET['tipo'];
    $estado = $_GET['estado'];

    function pintarCard($resultados){
        foreach($resultados as $row){
            echo '<a href="productos.php?id='. $row['id'].'">';
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

    <?php
        include 'auth/header.php';
    ?>
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