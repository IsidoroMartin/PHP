<?php
include_once './gestorBBDD.php';
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];
    $validacion = validarUsuario($usuario, $pass);
    $status;
    $notifMsg = "OFF";
    while ($val = mysqli_fetch_array($validacion)) {
        $resultado = $val[0];
        switch ($resultado) {
            case 0:
                $status = "wrongUser";
                $notifMsg = "El usuario o la contraseña no existe";
                $notificacion = "ON";
                if ((strlen($usuario)) > 50) {
                    $notifMsg = "FUU";
                    $notificacion = "ON";
                }
                session_start();
                break;
            case 1:
                $status = "conectado";
                $userData = getUsuario($usuario);
                while ($data = mysqli_fetch_array($userData)) {
                    $userName = $data['nombre'];
                    $user = $data['usuario'];
                    $userAdminLvl = $data['admin_lvl'];
                }
                session_start();
                $_SESSION['userAdminLvl'] = $userAdminLvl;
                $_SESSION['status'] = $status;
                $_SESSION['userName'] = $userName;
                $_SESSION['inputUser'] = $usuario;
                break;
        }
        if (($resultado != 0) && ($resultado != 1)) {

            $status = "errorBBDD";
            $notifMsg = "Hay un problema con la base de datos, vuelva mas tarde";
            $notificacion = "ON";
            session_start();
        }
        $_SESSION['status'] = $status;
        if ($notifMsg != "") {
            $_SESSION['notifMsg'] = $notifMsg;
            $_SESSION['notificacion'] = $notificacion;
        }
        header("Location:" . $_SERVER['HTTP_REFERER'] . " ");
        ?>
        <!--<script>history.go(-1);</script>-->
        <?php
    }
}
exit;



