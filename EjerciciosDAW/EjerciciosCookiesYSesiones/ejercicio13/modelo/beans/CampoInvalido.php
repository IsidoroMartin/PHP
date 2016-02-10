<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CampoInvalido
 *
 * @author Daw2
 */
class CampoInvalido {

    private $campo;
    private $mensajeError; // Str

    function __construct($campo) {
        $this->campo = $campo;
        $this->generarMensajeError();
    }

    function getMensajeError() {
        return $this->mensajeError;
    }

    function setMensajeError($mensajeError) {
        $this->mensajeError = $mensajeError;
    }
    function getCampo() {
        return $this->campo;
    }

    function setCampo($campo) {
        $this->campo = $campo;
    }

    
    private function generarMensajeError() {
        switch ($this->campo->getEstado()) {
            case "erroneo":
                $this->mensajeError = " - El campo " . $this->campo->getNombreCampo() . " es incorrecto, ";
                switch (true) {
                    case $this->campo->getExpRegValidaCampo() == EXP_REG_EMAIL:
                        $this->mensajeError .= "El email debe cumplir con los siguientes requuerimientos: un @ y un .";
                        break;
                    case $this->campo->getExpRegValidaCampo() == EXP_REG_INTEGER:
                        $this->mensajeError .= "El campo debe contener solo numeros";
                        break;
                    case $this->campo->getExpRegValidaCampo() == EXP_REG_STR:
                        $this->mensajeError .= "El campo debe contener solo letras";
                        break;
                    case $this->campo->getExpRegValidaCampo() == EXP_REG_STR_INT:
                        $this->mensajeError .= "El campo debe contener sólo carácteres numéricos o letras";
                        break;// Casos para ficheros
                    case preg_match("/imagen/", $this->campo->getNombreCampo()):
                        $this->mensajeError = $this->campo->getMensajeError();
                        break;
                }
                break;
            case "pendiente":
                $this->mensajeError = " - El campo " . $this->campo->getNombreCampo() . " no ha sido rellenado";
                break;
        }
    }

}
