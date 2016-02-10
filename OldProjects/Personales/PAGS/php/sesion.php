<?php
$status = "desconectado";
if ($status == "desconectado") {
    $userName = "";
    $errorMsg = "";
    $userAdminLvl = 9;
    $notificacion = "";
    $notifMsg="";
    $notifMsgAdminLvl="";
}
if (isset($_SESSION['status'])) {

    if ($_SESSION['status'] == "conectado") {
        $status = $_SESSION['status'];
        $inputUser = $_SESSION['inputUser'];
        $userName = $_SESSION['userName'];
        $userAdminLvl = $_SESSION['userAdminLvl'];
    }
    if ($_SESSION['status'] == "errorBBDD") {
        $status = $_SESSION['status'];
        $errorMsg = $_SESSION['errorMsg'];
        $username = "";
    }
    if ($_SESSION['status'] == "wrongUser") {
        $status = $_SESSION['status'];
        $notifMsg = $_SESSION['notifMsg'];
        $username = "";
        session_destroy();
    }
}
if (isset($_SESSION['notificacion'])) {
$notificacion =$_SESSION['notificacion'];
    if ($notificacion=="OFF"){
        $_SESSION['notifMsg'] ="";
        $_SESSION['notificacion']="OFF";
    }
    if ($notificacion=="ON"){
        $notifMsg =$_SESSION['notifMsg'];
        $_SESSION['notificacion']="OFF";
    }
}

