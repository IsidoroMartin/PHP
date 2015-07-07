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
        <link rel="stylesheet" type="text/css" href="css/cats/recursos.css">
        <meta charset="UTF-8">
        <title>PAGS</title>
        <script src="./js/jquery-2.1.1.js"></script>
        <script src="./js/script.js"></script>

        <?php include_once 'php/loginScript.php'; ?>
    </head>
    <body>
        <?php include_once 'php/header.php'; ?>
       
        <div id="div_categorias">
             
            <div class="img" id="recurso1"><a href="recursos/Examenes.zip" class="enlaces"><img src="images/winrar.png" height="250" width="250"/> <br/>Todos los Exámenes</a></div>
            <div class="img" id="recurso2"><a href="recursos/Literatura.odt" class="enlaces"><img src="images/odt.png "height="200" width="250"/> <br/>Literatura.odt</a></div>
            <div class="img" id="recurso3"><a href="recursos/Literatura.pdf" class="enlaces"><img src="images/pdf.png "height="200" width="200"/> <br/>Literatura.pdf</a></div>
            <div class="img" id="recurso4"> <a href="recursos/OracionSimple.pdf" class="enlaces"><img src="images/pdf.png "height="200" width="200"/><br/>Oración Simple</a></div>
            <div class="img" id="recurso5"><a href="recursos/OracionCompuesta.pdf" class="enlaces"><img src="images/pdf.png "height="200" width="200"/><br/>Oración Compuesta</a></div>
        </div>
        
        <?php include_once 'php/footer.html'; ?>
    </body>
</html>
