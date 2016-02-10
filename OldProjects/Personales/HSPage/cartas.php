<?php
if (isset($_GET['season']) && isset($_GET['type'])) {
    $seasonJSON = $_GET['season'];
    $type = $_GET['type'];
    $str_datos = file_get_contents($seasonJSON);
    $datos = json_decode($str_datos, true);
}
?>
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
        <link href="css/modal.css" rel="stylesheet" type="text/css"/>
        <link href="css/Style.css" rel="stylesheet" type="text/css"/>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
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
        <div id="contenedorImagenes">

            <?php
            foreach ($datos as $arr) {
                if ($arr['type'] == $type) {
                    foreach ($arr as $campo => $valor) {
                        if (gettype($valor) != 'array') {
//                            echo $campo . " : " . $valor;
//                            echo '<br>';
                            if ($campo == 'id') {
//                                echo $valor;
                                echo '<a href"#"><img class="imagen" src="img/cards/eses/' . $valor . '.png" alt=""/></a>';
                            }
                        }
                    }
//                    echo '-----------------------------------------';
//                    echo '<br>';
                }
            }
            ?>

        </div>
        <div id="bg">
            <img src="img/hearthstone-deck.jpg" alt="">
        </div>
        <audio id="audio" preload="auto" controls="controls" hidden="">
            <source src="audio/button-29.mp3" type="audio/mpeg"></source>
        </audio>

    </body>
</html>
