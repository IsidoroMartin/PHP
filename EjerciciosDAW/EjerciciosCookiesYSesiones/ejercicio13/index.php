<?php

require_once './autoincludes.php';
Session::startSession();

class Index {

    private $vistaPlantilla;

    public function __construct() {
        $this->vistaPlantilla = new Vista(VIEW_PLANTILLA, array());
    }

    public function run() {
        $controller = new ControllerAuth();
        $datosVista = array(
            "titulo" => TITULO,
            "encabezado" => "Autenticacion de usuario",
            "hojas_estilos" => "",
            "errorValidacion" => ""
        );
        switch (true) {
            case (isset($_GET["accion"]) && $_GET["accion"] = "eliminar") :
                $datosVista["vista"] = $controller->cerrarSesion();
                break;
            case isset($_POST["submit"]):
            case (isset($_SESSION["username"]) && ($_SESSION["username"] != "")):
                $datosVista["vista"] = $controller->processForm();
                break;
            default :
                $datosForm = $controller->getFormulario()->generarArrayDatos();
                $datosVista["vista"] = new Vista(VIEW_LOGIN, $datosForm);
        }
        $this->vistaPlantilla->generarVista($datosVista);
    }

}

$index = new Index();
$index->run();
