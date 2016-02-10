<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InputTypeText
 *
 * @author Daw2
 */
class InputTypeText extends Campo {

    private $expRegValidaCampo; // String de Expresion regular que valida el campo de el formulario

    function __construct($nombreCampo, $esCampoObligatorio, $expRegValidaCampo) {
        parent::__construct($nombreCampo, $esCampoObligatorio);
        $this->expRegValidaCampo = $expRegValidaCampo;
          if (isset($_POST[$this->getNombreCampo()])) {
            $this->setValorCampo($_POST[$this->getNombreCampo()]);
        }
    }

    function getExpRegValidaCampo() {
        return $this->expRegValidaCampo;
    }

    function setExpRegValidaCampo($expRegValidaCampo) {
        $this->expRegValidaCampo = $expRegValidaCampo;
    }

    public function validaCampo() {
        $valido = true;
        switch (true) {
            case ((!isset($_POST[$this->getNombreCampo()]) ||
            $_POST[$this->getNombreCampo()] == "") &&
            $this->getEsCampoObligatorio()):
                $this->setEstado("pendiente");
                $valido = false;
                break;
            case (!preg_match($this->expRegValidaCampo, $this->getValorCampo())):
                $this->setEstado("erroneo");
                $valido = false;
                break;
            default :
                $this->setEstado("correcto");
        }
        return $valido;
    }

    /*
      Función que muestra el contenido de los campos de texto ya rellenados cuando el formulario se muestra de nuevo por faltar campos obligatorios por rellenar
     */

    function setValue() {
        if (isset($_POST[$this->getNombreCampo()]) &&
                ($_POST[$this->getNombreCampo()] != "")) {
            return $_POST[$this->getNombreCampo()];
        }
    }

//Función que remarca en rojo los campos obligatorios no rellenados
    function validateField($camposPendientes, $camposErroneos) {
        if (array_key_exists($this->getNombreCampo(), $camposPendientes)) {
            return ' class="errorCampoPendiente"';
        }
        if (array_key_exists($this->getNombreCampo(), $camposErroneos)) {
            return ' class="errorCampoErroneo"';
        }
    }

}
