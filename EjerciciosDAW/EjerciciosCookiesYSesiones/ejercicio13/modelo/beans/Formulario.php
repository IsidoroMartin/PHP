<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fomulario
 *
 * @author Daw2
 */
class Formulario {

    private $campos; // Campo[] nombreCampo => valorCampo 
    private $camposErroneos; // Campo[]
    private $camposPendientes; // Campo[]
    private $estado;

    function __construct($campos) {
        $this->campos = $campos;
        $this->camposPendientes = array();
        $this->camposErroneos = array();
        $this->estado = "sin validar";
    }

    function getCampos() {
        return $this->campos;
    }

    function getCamposErroneos() {
        return $this->camposErroneos;
    }

    function getCamposPendientes() {
        return $this->camposPendientes;
    }

    function setCampos($campos) {
        $this->campos = $campos;
    }

    public function tieneCamposErroneos() {
        return (count($this->camposErroneos) > 0);
    }

    public function tieneCamposPendientes() {
        return (count($this->camposPendientes) > 0);
    }

    function getEstado() {
        return $this->estado;
    }

    // Implementar correctamente
    public function validaForm() {
        $this->validaCampos();
        $this->estado = "validado";
        return (!$this->tieneCamposErroneos() && !$this->tieneCamposPendientes());
    }

    private function validaCampos() {
        foreach ($this->campos as $campo) {
            if ((($campo instanceof InputTypeText) ||
                    ($campo instanceof CampoImagen)) &&
                    (!$campo->validaCampo())) {
                switch ($campo->getEstado()) {
                    case "erroneo":
                        $this->camposErroneos[$campo->getNombreCampo()] = new CampoInvalido($campo);
                        break;
                    case "pendiente":
                        $this->camposPendientes[$campo->getNombreCampo()] = new CampoInvalido($campo);
                        break;
                }
            }
        }
    }

    public function generarArrayDatos() {
        $datos = array();
        foreach ($this->campos as $campo) {
            switch (true) {
                case $campo instanceof InputTypeText:
                    $datos["setValue" . ucfirst($campo->getNombreCampo())] = 
                            (($this->estado == "validado") ? $campo->setValue() : "");
                    $datos["validateField" . ucfirst($campo->getNombreCampo())] = 
                            (($this->estado == "validado") ? ($campo->validateField($this->camposPendientes, $this->camposErroneos)) : "");
                    break;
            }
        }
        if ($this->tieneCamposErroneos() || $this->tieneCamposPendientes()) {
            $datos["erroresValidacion"] = $this->generarMensajeErrorForm();
        }else{
            $datos["erroresValidacion"] = "";
        }
        $datos["errorLogin"] = "";
        return $datos;
    }

    public function generarMensajeErrorForm() {
        $mensajeErrorForm = "";
        if ($this->tieneCamposErroneos()) {
            $mensajeErrorForm.= "<span class='errorCampoErroneo'>El formulario contiene errores:</span> <br>";
            foreach ($this->camposErroneos as $campoErroneo) {
                $mensajeErrorForm.=$campoErroneo->getMensajeError() . "<br>";
            }
        }
        if ($this->tieneCamposPendientes()) {
            $mensajeErrorForm.= "<span class='errorCampoPendiente'>Faltan campos obligatorios por rellenar: </span><br>";
            foreach ($this->camposPendientes as $campoPendiente) {
                $mensajeErrorForm.=$campoPendiente->getMensajeError() . "<br>";
            }
        }
        return $mensajeErrorForm;
    }

}
