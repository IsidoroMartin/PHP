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
        <link rel="stylesheet" type="text/css" href="css/cats/ingles.css">
        <meta charset="UTF-8">
        <title>PAGS</title>
        <script src="./js/jquery-2.1.1.js"></script>
        <script src="./js/script.js"></script>
        <?php include_once 'php/loginScript.php'; ?>
    </head>
    <body>
        <?php include_once 'php/header.php'; ?>

        <div id="div_categorias">


            <a href="examenes.php?idcat=4" class="enlaces"><img class="img"  src="images/examIco.jpg" alt="Examenes Ingles" height="200" width="250" />
                <br/>Exams  </a>


        </div>
         <?php include_once 'php/footer.html'; ?>
    </body>
</html>
<!--  <div id="contenedor">
          


                HI
           
        </div>-->
