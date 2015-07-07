<?php
session_start();
include_once 'php/sesion.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="ISO-8859-1">
        <title>PAGS</title>
        <script src="./js/jquery-2.1.1.js"></script>
        <script src="./js/script.js"></script>
        <?php include_once 'php/loginScript.php'; ?>
    </head>

    <body>
        <?php include_once 'php/header.php'; ?>
        
        <div id="div_categorias">
            <div id="img1">
                <a href="./lenguaylit.php" class="enlaces"><img  src="images/lenguaIcon.png" alt="Lengua" height="200" width="300" />
                    <br/>Lengua y Literatura</a>
            </div>
            <div id="img2">
                <a href="./maths.php" class="enlaces"><img  src="images/mathsIcon.png" alt="Mates" height="200" width="200" />
                    <br/>Maths</a>
            </div>
            <div id="img3">
                <a href="./ingles.php" class="enlaces"><img src="images/inglesIcon.png" alt="Ingles" height="200"/>
                    <br/> Ingles</a>
            </div>
        </div>
        <div id="vacio"></div>
    </body>
</html>
<!--  <div id="contenedor">
          


                HI
           
        </div>-->