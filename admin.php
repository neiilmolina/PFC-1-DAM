<?php
    require_once ('database/database.php');
    $database = new Database();
    $nombre = $_GET['nombre'];

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
    <?php
        include 'header.php';
    ?>
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