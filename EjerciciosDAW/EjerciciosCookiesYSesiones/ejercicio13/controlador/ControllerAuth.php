<?php

/**
 * @author Isi Martín
 * Fecha= 16-dic-2015
 * Descripcion=
 * */
class ControllerAuth {

    private $formulario;

    public function __construct() {
        $this->formulario = new Formulario(
                array(
            "nombre" => new InputTypeText("nombre", true, EXP_REG_STR),
            "password" => new InputTypeText("password", true, EXP_REG_STR)
                )
        );
    }
    function getFormulario() {
        return $this->formulario;
    }

    
    public function cerrarSesion() {
        Session::closeSession();
        return new Vista(VIEW_LOGIN, $this->formulario->generarArrayDatos());
    }

    public function processForm() {
        $vista = null;
        $campos = $this->formulario->getCampos();
        $user = new Usuario($campos["nombre"]->getValorCampo(), $campos["password"]->getValorCampo());
        if (($user->login()) || (isset($_SESSION["username"]) && $_SESSION["username"] != "")) {
            $controllerPag = new ControllerPag();
            $vista = $controllerPag->displayPagina();
        } else {
            $datosForm = $this->formulario->generarArrayDatos();
            if (!$this->formulario->validaForm()) {
                $datosForm = array_merge($datosForm, $this->formulario->generarArrayDatos());
            }
            $datosForm["errorLogin"] = "El usuario o la contraseña es incorrecta<br>";
            $vista = new Vista(VIEW_LOGIN, $datosForm);
        }
        return $vista;
    }

}
