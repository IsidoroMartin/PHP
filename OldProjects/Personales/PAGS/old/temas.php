<?php
session_start();
include_once 'php/sesion.php';
include_once './controller/gestorBBDD.php';
$idcat = $_GET['id'];
$temas = getTemasByCat($idcat);
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
                while ($tema = mysqli_fetch_array($temas)) {
                    $temaid = $tema['id'];
                    $nombre = $tema['nombre'];
                    $apartados = getApartado($nombre, $idcat);
                    ?>

                    <tr>
                        <th><a href="contenido_lengua.php?idcat=<?php echo $idcat ?>&tema_nombre=<?php echo $nombre; ?>" class="enlacesblack"><?php echo $temaid; ?></a></th>
                        <td><a href="contenido_lengua.php?idcat=<?php echo $idcat ?>&tema_nombre=<?php echo $nombre; ?>" class="enlacesblack"> <?php echo $nombre; ?></a></td>
                    </tr>
                    <?php
                    while ($apartado = mysqli_fetch_array($apartados)) {
                        $apartadoId = $apartado['id'];
                        $apartadoNombre = $apartado['nombre'];
                        ?>
                        <tr>
                            <th><a href="#" class="enlacesblack"><?php echo $temaid . "." . $apartadoId; ?></a></th>
                            <td><a href="#" class="enlacesblack"> <?php echo $apartadoNombre; ?></a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>

    </body>
</html>
