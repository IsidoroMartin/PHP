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
        <link rel="stylesheet" type="text/css" href="css/cats/maths.css">
        <meta charset="ISO-8859-1">
        <title>PAGS</title>
        <script src="./js/jquery-2.1.1.js"></script>
        <script src="./js/script.js"></script>
        <?php include_once 'php/loginScript.php'; ?>
    </head>
    <body>
        <?php include_once 'php/header.php'; ?>

        <div id="div_categorias">


            <a href="examenes.php?idcat=3" class="enlaces"><img  src="categorias/mates/images/examIco.gif" alt="Mates" height="200" width="250" />
                <br/>Examenes  </a>


        </div>
    </body>
</html>
<!--  <div id="contenedor">
          


                HI
           
        </div>-->