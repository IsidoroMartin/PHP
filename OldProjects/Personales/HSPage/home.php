<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>HearthStone</title>
        <link href="css/Style.css" rel="stylesheet" type="text/css"/>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
        <link href="css/modal.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/Modal.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <?php
            include './php/menu.php';
            include './html/ventanaLogin.html';
            ?>
        </header>
        <div id="contenedor">
            <div class="título">
                <h1>¡Bienvenido a HEARTSTONE!</h1>
            </div>
            <div class="cuerpo">
                <!--<iframe src="https://player.vimeo.com/video/91599263" width="800" height="481" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
            </div>
            <div class="título">
                <h2>Enfunda tu espada,</h2>
            </div>
            <div class="cuerpo">
                saca tu baraja y prepárate para disfrutar con Hearthstone, un trepidante juego de cartas de estrategia, fácil de aprender y salvajemente divertido. Inicia una partida gratuita en Battle.net y utiliza tus mejores cartas para lanzar hechizos, invocar criaturas y dar órdenes a los héroes de Warcraft en épicos y estratégicos duelos.

            </div>
            <div class="título">
                <h2>  Con poderosos mazos de cartas estándar</h2>
            </div>
            <div class="cuerpo">
                y cientos de cartas adicionales para ganar, fabricar o comprar, tu colección nunca dejará de mejorar.
            </div>
            <div class="título">
                <h2>  Desafía a jugadores de todos los niveles</h2>
            </div>
            <div class="cuerpo">
                en Battle.net o perfecciona tu juego en partidas de práctica contra algunos de los mejores estrategas de Azeroth, como Thrall, Uther o Gul'dan, entre muchos otros.
            </div>

            <div class="cuerpo">
                <a href="https://eu.battle.net/account/download/?show=hearthstone&style=hearthstone"><img src="img/jugarButton.png" alt=""/></a>
            </div>

        </div>

    </body>
</html>
