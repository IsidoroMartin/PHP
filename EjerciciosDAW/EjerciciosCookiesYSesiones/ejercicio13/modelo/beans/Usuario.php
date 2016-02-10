<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuarioç
 *
 * @author Daw2
 */
class Usuario {

    private $nombreUsuario;
    private $passUsuario;

    function __construct($nombreUsuario, $passUsuario) {
        $this->nombreUsuario = $nombreUsuario;
        $this->passUsuario = $passUsuario;
        
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getPassUsuario() {
        return $this->passUsuario;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setPassUsuario($passUsuario) {
        $this->passUsuario = $passUsuario;
    }

    function login() {
        $usuarios = unserialize(USUARIOS);
        $valido = false;
        foreach ($usuarios as $usuario => $password) {
            $valido = (($this->nombreUsuario == $usuario) &&
                    ($this->passUsuario == $password));
            if ($valido) {
                $_SESSION["username"] = $this->nombreUsuario;
                break;
            }
        }
        return $valido;
    }

    function logout() {
        Session::closeSession();
    }

}
