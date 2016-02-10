<?php
session_start();
include_once 'php/sesion.php';
include_once './controller/gestorBBDD.php';
$idcat = $_GET['idcat'];
$examenes = getExamenes($idcat);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/cats/examenes.css">
        <meta charset="ISO-8859-1">
        <title>PAGS</title>
        <script src="./js/jquery-2.1.1.js"></script>
        <script src="./js/script.js"></script>
        <?php include_once 'php/loginScript.php'; ?>
    </head>
    <body>
        <?php include_once 'php/header.php'; ?>
        <div id="contenedor">
            <table>
                <?php
                while ($examen = mysqli_fetch_array($examenes)) {
                    $examenFecha = $examen['fecha_examen'];
                    $examenUrl = $examen['url'];
                    ?>

                    <tr>
                        <th><a href="<?php echo $examenUrl ?>" class="enlacesblack">Examen <?php echo $examenFecha; ?></a></th>
                    </tr>

                    <?php
                }
                ?>
            </table>
        </div>

    </body>
</html>
