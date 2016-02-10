<?php
session_start();
include_once 'php/sesion.php';
include_once './controller/gestorBBDD.php';
if ($status != "conectado") {
    header("Location:index.php");
    $notifMsg = "Debes estar logueado para poder acceder a esa pagina";
    $notificacion = "ON";
    $_SESSION['notificacion'] = $notificacion;
}
if ($userAdminLvl >= 5) {
    header("Location:index.php");
    $notifMsgAdminLvl = "Debes tener al menos un nivel de administracion 4";
    $notificacion = "ON";
    $_SESSION['notificacion'] = $notificacion;
}
if (($notifMsg != "") || ($notifMsgAdminLvl != "")) {
    $_SESSION['notifMsg'] = $notifMsg . "<br/>" . $notifMsgAdminLvl;
}

$getCategorias = getCategorias();


//if (isset($_GET['idcat'])){
//    $idCat = $_GET['idcat'];
//}
//if (isset($_GET['idcat'])){
//    $nombreTema = $_GET['tema_nombre'];   
//}
//$apartados = getApartado($nombreTema, $idCat);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="ISO-8859-1">
        <title>PAGS</title>
        <script src="./js/jquery-2.1.1.js"></script>
        <script src="./js/script.js"></script>
        <?php include_once 'php/loginScript.php'; ?>
        <script>
            $(document).ready(function() {
                $("#categoria").change(function(event) {
                    var id = $("#categoria").find(':selected').val();
                    $("#nombre_tema").load('php/getTemasSelect.php?id=' + id+'&val=id');
                });
            });
        </script>
    </head>
    <body>
        <?php include_once 'php/header.php'; ?>
        <div id="contenedor">

            <form method="POST" action="controller/insertar/insertar_apartado_c.php">
                <table name="insertar_tema">
                    <tr>Insertar Apartado</tr>
                    <tr>
                        <td>
                            <select id="categoria" name="categoria" required>
                                <option value="default">Seleccionar Categoria</option>
                                <?php
                                while ($getCategoria = mysqli_fetch_array($getCategorias)) {
                                    $nombreCategoria = $getCategoria['nombre'];
                                    $idCategoria = $getCategoria['id'];
                                    ?>
                                    <option value="<?php echo $idCategoria; ?>"><?php echo $nombreCategoria; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select id="nombre_tema" name="nombre_tema" required>
                                <option value="default" selected="">Seleccionar Tema</option>
                                <option value="default">Debe seleccionar primero una categoria</option>
                            </select>
                            <input type="number" name="id_apartado" placeholder="Id del Apartado" required/>
                            <input type="text" name="apartado_nombre" placeholder="Nombre del Apartado" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="contenido" rows="5" cols="100" placeholder="Contenido del Apartado" required></textarea> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Insertar Apartado"/>
                        </td>
                    </tr>
                </table>
            </form>

        </div>

    </body>
</html>


