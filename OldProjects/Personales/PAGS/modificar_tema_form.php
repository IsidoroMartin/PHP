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
        <meta charset="UTF-8">
        <title>PAGS</title>
        <script src="./js/jquery-2.1.1.js"></script>
        <script src="./js/script.js"></script>
        <?php include_once 'php/loginScript.php'; ?>
        <script>
            $(document).ready(function() {
                $("#categoria").change(function(event) {
                    var id = $("#categoria").find(':selected').val();
                    $("#tema").load('php/getTemasSelect.php?id=' + id + '&val=id');
                });
                $("#tema").change(function(event) {
                    var nombreTema = $("#tema").find(':selected').val();
                    nombreTema = nombreTema.attr("nombre_tema").val();
                    $("#old_nombre").val('"'nombreTema'"');
                });
            });
        </script>
    </head>
    <body>
        <?php include_once 'php/header.php'; ?>
        <div id="contenedor">

            <form method="POST" action="controller/modificar/modificar_tema_c.php">
                <table name="insertar_tema">
                    <tr>Modificar Tema</tr>
                    <tr>
                        <td>
                            <select id="categoria" name="categoria" required>
                                <option value="default" selected="">Seleccionar Categoria</option>
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
                            <select id="tema" name="tema" required>
                                <option value="default" selected="">Seleccionar ID del Tema a modificar</option>
                                <option value="default">Debe seleccionar primero una categoria</option>
                            </select>

                            <input type="text" name="old_nombre" id="old_nombre" placeholder="introduzca el anterior nombre" required/>
                            <input type="text" name="tema_nombre" placeholder="Nuevo nombre del tema" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Modificar Tema"/>
                        </td>
                    </tr>
                </table>
            </form>

        </div>
 <?php include_once 'php/footer.html'; ?>
    </body>
</html>


