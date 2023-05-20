<?php

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

    <a href="database/logout.php">Cerrar Sesión</a>
    <div class="pagina-inicial">
        <main>
            <h2 class="titulo-producto">DISFRUTA DE NUESTROS SERVICIOS</h2>
            <div class="servicios">
                <section class="introduccion">
                    <i class="fas fa-coins"></i>
                    <h4>
                        PAGA DESPUÉS
                    </h4>
                    <p>
                        Elige el número de cuotas en el que dividir tu compra. Damos
                        respuesta a tu solicitud de financiación en segundos. Sin nóminas ni papeleos.
                    </p>
                </section>
                <section class="introduccion">
                    <i class="fas fa-wrench"></i>
                    <h4>
                        SEVICIO TÉCNICO
                    </h4>
                    <p>
                        Disponemos de personal técnico preparado para diagnosticar, reparar y mejorar la vida útil de
                        vuestros vehículos.
                    </p>
                </section>
                <section class="introduccion">
                    <i class="fas fa-star"></i>
                    <h4>
                        GARANTÍA
                    </h4>
                    <p>
                        Nuestros productos tienen garantía asegurada de dos (2) años, y seis (6) meses de batería.
                    </p>
                </section>
                <section class="introduccion">
                    <i class="fas fa-truck"></i>
                    <h4>
                        ENVÍO 24 - 48 HORAS
                    </h4>
                    <p>
                        Realizamos pedidos exprés, garantizamos la entrega de tu pedido en las próximas 24 - 48 horas,
                        si realizas tu pago en días laborables, y en horario comercial.
                    </p>
                </section>
                <section class="introduccion">
                    <i class="fab fa-whatsapp"></i>
                    <h4>
                        CONTACTO
                    </h4>
                    <p>
                        Puedes escribirnos WhatsApp, pulsa en el logo y re direccionara directamente a nuestro chat, te
                        daremos respuesta dentro del horario comercial.
                    </p>
                </section>
            </div>
            <h2 class="titulo-producto">REACONDICIONADOS</h2>
            <div class="secciones">
                <?php
                    $resultados = $database->get("SELECT * FROM producto WHERE estado = 'Reacondicionado'");
                    pintarCard($resultados)
                ?>
            </div>

            <h2 class="titulo-producto" id="patinetes">NUEVOS PATINETES</h2>
            <div class="secciones">
                <?php
                    $resultados = $database->get("SELECT * FROM producto WHERE estado = 'Nuevo' AND tipo = 'Patinete'");
                    pintarCard($resultados);
                ?>
            </div>

            
            <h2 class="titulo-producto" >BATERIAS</h2>
            <div class="secciones">

                <?php
                    $resultados = $database->get("SELECT * FROM producto WHERE estado = 'Nuevo' AND tipo = 'Bateria'");
                    pintarCard($resultados);
                ?>
            </div>

            <h2 class="titulo-producto">ACCESORIOS</h2>
            <div class="secciones">
                <?php
                    $resultados = $database->get("SELECT * FROM producto WHERE tipo = 'Accesorio' AND estado = 'Nuevo'");
                    pintarCard($resultados);
                ?>
            </div>
            <h2 class="titulo-producto">¡VISITA NUESTRA TIENDA!</h2>
            <div id="tienda">
                <h3>C. de Bernardino Obregón, 25, 28012 Madrid</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12153.175282627855!2d-3.6985241!3d40.4023413!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x12f6d2396a33911!2sIMF%20Smart%20Education!5e0!3m2!1ses!2ses!4v1670178916358!5m2!1ses!2ses"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </main>
    </div>
    <footer id="footer">
        <div>
            <div class="contacto">
                <p> <i class="fas fa-phone-alt"></i> 696549325 </p>
                <p><i class="fas fa-envelope"></i> contactanos@Ecoscoter.es</p>
                <p><i class="fas fa-map-marker-alt"></i> C. de Bernardino Obregón, 25, 28012 Madrid</p>
            </div>
            <div class="redes-sociales">
                <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a href="#">
                <a href="#"><i class="fab fa-facebook"></i> Facebook</a href="#">
                <a href="#"><i class="fab fa-tiktok"></i> Tik tok</a href="#">
            </div>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12153.175282627855!2d-3.6985241!3d40.4023413!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x12f6d2396a33911!2sIMF%20Smart%20Education!5e0!3m2!1ses!2ses!4v1670178916358!5m2!1ses!2ses"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </footer>
</body>
</html>