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
        <link rel="stylesheet" type="text/css" href="css/cats/lengua.css">
       <meta charset="UTF-8">
        <title>PAGS</title>
        <script src="./js/jquery-2.1.1.js"></script>
        <script src="./js/script.js"></script>
        <?php include_once 'php/loginScript.php'; ?>
    </head>
    <body>
        <?php include_once 'php/header.php'; ?>

        <div id="div_categorias">
            <div id="img1" class="img">
                <a href="temas.php?id=1" class="enlaces"><img   src="images/lenguaIco.jpg" alt="Lengua" height="200" width="300" />
                    <br/>Lengua</a>
            </div>
            <div id="img2" class="img">
                <a href="temas.php?id=2" class="enlaces"><img   src="images/litIco.jpg" alt="Literatura" height="200" width="300" />
                    <br/>Literatura</a>
            </div>
            <div id="img3" class="img">
                <a href="examenes.php?idcat=1" class="enlaces"><img  src="images/examIco.jpg" alt="Examenes" height="200" width="250"/>
                    <br/> Examenes</a>
            </div>
        </div>
         <?php include_once 'php/footer.html'; ?>
    </body>
</html>
<!--  <div id="contenedor">
          


                HI
           
        </div>-->