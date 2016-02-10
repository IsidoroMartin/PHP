<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Campo
 *
 * @author Daw2
 */
class Campo {

    private $nombreCampo; //String
    private $valorCampo; // String
    private $esCampoObligatorio; // Boolean
    private $estado; // Str Correcto/Erroneo/Pendiente

    function __construct($nombreCampo, $esCampoObligatorio) {
        $this->nombreCampo = $nombreCampo;
        $this->esCampoObligatorio = $esCampoObligatorio;
        $this->estado = "correcto";
    }

    function getNombreCampo() {
        return $this->nombreCampo;
    }

    function getValorCampo() {
        return $this->valorCampo;
    }

    function getEsCampoObligatorio() {
        return $this->esCampoObligatorio;
    }

    function getEstado() {
        return $this->estado;
    }

    function setNombreCampo($nombreCampo) {
        $this->nombreCampo = $nombreCampo;
    }

    function setValorCampo($valorCampo) {
        $this->valorCampo = $valorCampo;
    }

    function setEsCampoObligatorio($esCampoObligatorio) {
        $this->esCampoObligatorio = $esCampoObligatorio;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
}
