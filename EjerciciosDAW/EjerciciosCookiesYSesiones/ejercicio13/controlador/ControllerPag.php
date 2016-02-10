<?php

/**
 * @author Isi Martín
 * Fecha= 16-dic-2015
 * Descripcion= 
 * */
class ControllerPag {

    public function displayPagina() {
        $carro = new Carro();
        $datosVista = array();
        if (isset($_GET["addItem"])) {
            $carro->addItem((int) $_GET["addItem"]);
        }
        if (isset($_GET["removeItem"])) {
            $carro->removeItem((int) $_GET["removeItem"]);
        }
        $datosVista["hojas_estilos"] = '<link rel="stylesheet" type="text/css" href="vistas/css/common.css" />';
        $datosVista["totalPrecio"] = $carro->obtenerTotalPrecioCarro();
        $datosVista["lista_platos"] = $carro->obtenerListaProductos();
        $datosVista["productos_carro"] = $carro->obtenerProductosCarro();
        return new Vista(VIEW_PAG_RESTAURANTE, $datosVista);
    }

}
