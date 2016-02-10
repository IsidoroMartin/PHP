<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CampoImagen
 *
 * @author isi
 */
class CampoImagen extends Campo {

    function __construct($nombreCampo, $valorCampo, $expRegValidaCampo, $campoObligatorio, $estado) {
        parent::__construct($nombreCampo, $valorCampo, $expRegValidaCampo, $campoObligatorio, $estado);
    }

    public function validaCampo() {
        $valido = true;
        $mensaje = "";
        if (!isset($_POST[$campo->getValorCampo()]) or $_POST[$campo->getValorCampo()]
                == "") {
            $this->estado = "pendiente";
            $valido = false;
        } else {
            if (isset($_FILES[$this->getValorCampo()])) {
                if ($_FILES[$this->getValorCampo()]["error"] == UPLOAD_ERR_OK) {
                    $foto = $_FILES[$this->getValorCampo()];
                    if (($foto["type"] != "image/pjpeg") && ($foto["type"] != "image/jpeg")
                            && ($foto["type"] != "image/png")) {
                        $mensaje = "Solo se pueden subir imágenes JPG, JPEG o PNG";
                        $this->camposErroneos[] = $this->getValorCampo();
                        $valido = false;
                    } elseif (!move_uploaded_file($foto["tmp_name"], "files/" . basename($foto["name"]))) {
                        $mensaje = "Lo sentimos, hubo un problema al subir esa foto." . $foto["error"];
                        $this->camposErroneos[] = $this->getValorCampo();
                        $valido = false;
                    } else {
                        $mensaje = "correcto";
                    }
                } else {
                    $mensaje = "Lo sentimos, hubo un problema al subir la foto $mensaje: ";
                    switch ($_FILES[$this->getValorCampo()]["error"]) {
                        case UPLOAD_ERR_INI_SIZE:
                            $mensaje .= "La foto es más grande de lo que permite el servidor.";
                            $this->camposErroneos[] = $this->getValorCampo();
                            $valido = false;
                            break;
                        case UPLOAD_ERR_FORM_SIZE:
                            $mensaje .= "La foto es más grande de lo que permite el formulario.";
                            $this->camposErroneos[] = $this->getValorCampo();
                            $valido = false;
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $mensaje .= "No se ha subido ningún archivo.";
                            $this->camposPendientes[] = $this->getValorCampo();
                            $valido = false;
                            break;
                        default:
                            $mensaje .= "Póngase en contacto con el administrador del servidor para obtener ayuda.";
                            $this->camposErroneos[] = $this->getValorCampo();
                            $valido = false;
                    }
                }
            }
        }
        $mensaje.= "<br>";
        // Generar codigo mensaje error campo
        return $valido;
    }

    function validateField($camposPendientes, $camposErroneos) {
        if (array_key_exists($this->getNombreCampo(), $camposPendientes)) {
            return ' class="errorCampoPendiente"';
        }
        if (array_key_exists($this->getNombreCampo(), $camposErroneos)) {
            if (preg_match("/imagen/", $this->getNombreCampo()))
                return ' class="errorCampoErroneoImagen"';
        }
    }

}
