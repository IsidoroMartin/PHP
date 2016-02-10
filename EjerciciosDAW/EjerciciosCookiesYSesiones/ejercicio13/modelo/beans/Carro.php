<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carro
 *
 * @author Daw2
 */
class Carro {

    private $productos_disponibles;

    public function __construct() {
        $this->productos_disponibles = array(
            1 => new Producto(1, "Samosas de Verduras", 8),
            2 => new Producto(2, "Croquetas de Espinacas", 9),
            3 => new Producto(3, "Pakoras", 10),
            4 => new Producto(4, "Rollitoso de Queso", 10),
            5 => new Producto(5, "Keema Samosa", 11),
        );
    }

    function getProductos_disponibles() {
        return $this->productos_disponibles;
    }

    function setProductos_disponibles($productos_disponibles) {
        $this->productos_disponibles = $productos_disponibles;
    }

    function addItem($id_producto) {
        if (!isset($_SESSION["carro"][$id_producto])) {
            $_SESSION["carro"][$id_producto] = $this->productos_disponibles[$id_producto];
        }
    }

    function removeItem($id_producto) {
        if (isset($_SESSION["carro"][$id_producto]))
            unset($_SESSION["carro"][$id_producto]);
    }

    function obtenerTotalPrecioCarro() {
        $total = 0;
        if (isset($_SESSION["carro"])) {
            foreach ($_SESSION["carro"] as $producto) {
                $total+=$producto->getPrecio();
            }
        }
        return number_format($total, 2);
    }

    function obtenerListaProductos() {
        $productosDisponibles = "<dl>";
        $prod_datos = array();
            foreach ($this->productos_disponibles as $producto) {
                $prod_datos["nomProd"] = $producto->getNomProd();
                $prod_datos["precio"] = number_format($producto->getPrecio(), 2);
                $prod_datos["enlace"] = "<a href='index.php?addItem=" . $producto->getCodProd() . "'>Añadir plato al carro</a>";
                $view_prod = new Vista(VIEW_PRODUCTO_CARRO, $prod_datos);
                $productosDisponibles.=$view_prod->parsearEtiquetasVista();
            }
        $productosDisponibles.="</dl>";
        return $productosDisponibles;
    }

    function obtenerProductosCarro() {
        $productosDisponibles = "<dl>";
        $prod_datos = array();
        if (isset($_SESSION["carro"])) {
            foreach ($_SESSION["carro"] as $producto) {
                $prod_datos["nomProd"] = $producto->getNomProd();
                $prod_datos["precio"] = number_format($producto->getPrecio(), 2);
                $prod_datos["enlace"] = "<a href='index.php?removeItem=" . $producto->getCodProd() . "'>Eliminar plato al carro</a>";
                $view_prod = new Vista(VIEW_PRODUCTO_CARRO, $prod_datos);
                $productosDisponibles.=$view_prod->parsearEtiquetasVista();
            }
        }
        $productosDisponibles.="</dl>";
        return $productosDisponibles;
    }

}
