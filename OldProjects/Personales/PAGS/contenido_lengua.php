<?php
session_start();
include_once 'php/sesion.php';
include_once './controller/gestorBBDD.php';
$idCat = $_GET['idcat'];
$nombreTema = $_GET['tema_nombre'];
$apartados = getApartado($nombreTema, $idCat);
?>
<!DOCTYPE html>
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
        <div id="contenedor">
            <span id="titulo"><?php echo $nombreTema; ?></span>
            <?php
            while ($apartado = mysqli_fetch_array($apartados)) {
                $tema_nombre = $apartado['tema_nombre'];
                $apartado_id = $apartado['id'];
                $apartado_nombre = $apartado['nombre'];
                $apartado_contenido = $apartado['contenido'];
                ?>

                <br/><span id="apartado"><?php echo $apartado_id . ". " . $apartado_nombre; ?></span>
                <br/><span id="contenido"><?php echo $apartado_contenido; ?></span><br/>
                <?php
            }
            ?>
        </div>
 <?php include_once 'php/footer.html'; ?>
    </body>
</html>


