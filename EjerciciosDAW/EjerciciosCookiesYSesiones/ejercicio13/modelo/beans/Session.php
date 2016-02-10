<?php

/**
 * Class Session
 *
 * Clase que gestiona la variable suplerglobal $_SESSION
 */
class Session {

    static public function startSession() {
        if (!self::isOpen()) {
            session_start();
            $_SESSION["on"] = true;
        }
    }

    static public function closeSession() {
        if (self::isOpen()) {
// si no eliminamos la cookie de sesion, la aplicación seguirá funcionando con el mismo valor en la cookie PHPSESSID
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), "", time() - 3600, "/");
            }
            session_unset();
            session_destroy();
        }
    }

    static public function isOpen() {
        return isset($_SESSION["on"]);
    }

}
