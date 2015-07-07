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
if (($notifMsg != "") || ($notifMsgAdminLvl != "")){
    $_SESSION['notifMsg'] = $notifMsg."<br/>".$notifMsgAdminLvl;
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
    </head>
    <body>
        <?php include_once 'php/header.php'; ?>
        <div id="contenedor">

            <form method="POST" action="controller/insertar/insertar_tema_c.php">
                <table name="insertar_tema">
                    <tr>Insertar Tema</tr>
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
                            <input type="number" name="id_tema" placeholder="Id del tema" required/>
                            <input type="text" name="tema_nombre" placeholder="Nombre del tema" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Insertar Tema"/>
                        </td>
                    </tr>
                </table>
            </form>

        </div>

    </body>
</html>


