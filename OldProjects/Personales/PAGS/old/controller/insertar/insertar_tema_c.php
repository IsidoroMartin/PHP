<?php

session_start();
include_once '../gestorBBDD.php';
if (isset($_POST['categoria']) && isset($_POST['tema_nombre']) && isset($_POST['id_tema'])) {
    $idCategoria = $_POST['categoria'];
    $nombreTema = $_POST['tema_nombre'];
    $idTema = $_POST['id_tema'];
    $validacion = getTemasById($idTema, $idCategoria);
    while ($val = mysqli_fetch_array($validacion)) {
        $resultado = $val[0];
    }
    if ($resultado >= 1) {
        $notifMsg = "El tema introducido ya existe";
        $notificacion = "ON";
        $_SESSION['notifMsg'] = $notifMsg;
        $_SESSION['notificacion'] = $notificacion;
        header("Location:" . $_SERVER['HTTP_REFERER'] . " ");
        exit;
    }
    if ($idCategoria== "default") {
        $notifMsg = "Debes introducir una categoria";
        $notificacion = "ON";
        $_SESSION['notifMsg'] = $notifMsg;
        $_SESSION['notificacion'] = $notificacion;
        header("Location:" . $_SERVER['HTTP_REFERER'] . " ");
        exit;
    }
    insertarTema($idCategoria, $idTema, $nombreTema);
    $notifMsg = "El tema se ha creado correctamente";
    $notificacion = "ON";
    $_SESSION['notifMsg'] = $notifMsg;
    $_SESSION['notificacion'] = $notificacion;
    header("Location:" . $_SERVER['HTTP_REFERER'] . " ");
}
exit;
