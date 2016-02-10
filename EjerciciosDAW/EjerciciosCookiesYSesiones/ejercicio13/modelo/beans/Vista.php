<?php

/**
 * @author Isi Martín
 * Fecha= 16-dic-2015
 * Descripcion=
 * */

class Vista {

    private $vista;
    private $datos;
    private $html;

    function __construct($vista, $datos) {
        $this->vista = $vista;
        $this->datos = $datos;
    }

    function getHtml() {
        return $this->html;
    }

    function setHtml($html) {
        $this->html = $html;
    }

    function getVista() {
        return $this->vista;
    }

    function getDatos() {
        return $this->datos;
    }

    function setVista($vista) {
        $this->vista = $vista;
    }

    function setDatos($datos) {
        $this->datos = $datos;
    }

    function parsearEtiquetasVista() {
        $this->html = file_get_contents($this->vista);
        foreach ($this->datos as $key1 => $valor1) {
            if ($valor1 instanceof Vista) {
                $valor1->parsearEtiquetasVista();
                $this->datos[$key1] = $valor1->getHtml();
            }
            $cadena = '{' . $key1 . '}';
            $this->html = str_replace($cadena, $this->datos[$key1], $this->html);
        }
        return $this->html;
    }

    public function generarVista($datosVista) {
        $this->datos = $datosVista;
        $this->parsearEtiquetasVista();
        print($this->html);
    }

}


