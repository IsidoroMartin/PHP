<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Daw2
 */
class Producto {
    private $codProd;
    private $nomProd;
    private $precio;
    
    
    function __construct($codProd, $nomProd, $precio) {
        $this->codProd = $codProd;
        $this->nomProd = $nomProd;
        $this->precio = $precio;
    }

    function getCodProd() {
        return $this->codProd;
    }

    function getNomProd() {
        return $this->nomProd;
    }

    function getPrecio() {
        return $this->precio;
    }

    function setCodProd($codProd) {
        $this->codProd = $codProd;
    }

    function setNomProd($nomProd) {
        $this->nomProd = $nomProd;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }


}
