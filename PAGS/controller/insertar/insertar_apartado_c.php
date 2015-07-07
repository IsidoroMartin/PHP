<?php

session_start();
include_once '../gestorBBDD.php';
if (isset($_POST['categoria']) && isset($_POST['nombre_tema']) && isset($_POST['id_apartado']) && isset($_POST['apartado_nombre']) && isset($_POST['contenido'])) {
    $idCategoria = $_POST['categoria'];
    $nombreTema = $_POST['nombre_tema'];
    $idApartado = $_POST['id_apartado'];
    $nombreApartado = $_POST['apartado_nombre'];
    $contenido = $_POST['contenido'];
    if ($idCategoria == "default") {
        $notifMsg = "Debes introducir una categoria";
        $notificacion = "ON";
        $_SESSION['notifMsg'] = $notifMsg;
        $_SESSION['notificacion'] = $notificacion;
        header("Location:" . $_SERVER['HTTP_REFERER'] . " ");
        exit;
    }
    $validacion = validarApartado($idCategoria, $idApartado, $nombreTema);
    while ($val = mysqli_fetch_array($validacion)) {
        $resultado = $val[0];
    }
    if ($resultado >= 1) {
        $notifMsg = "El apartado introducido ya existe";
        $notificacion = "ON";
        $_SESSION['notifMsg'] = $notifMsg;
        $_SESSION['notificacion'] = $notificacion;
        header("Location:" . $_SERVER['HTTP_REFERER'] . " ");
        exit;
    }
    insertarApartado($idCategoria, $nombreTema, $idApartado, $nombreApartado, $contenido);
    $notifMsg = "El apartado se ha creado correctamente";
    $notificacion = "ON";
    $_SESSION['notifMsg'] = $notifMsg;
    $_SESSION['notificacion'] = $notificacion;
    header("Location:" . $_SERVER['HTTP_REFERER'] . " ");
}
exit;
