<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
  Función que muestra el contenido de los campos de texto ya rellenados cuando el formulario se muestra de nuevo por faltar campos obligatorios por rellenar
 */

function setValue($nombreCampo) {
    if (isset($_POST[$nombreCampo]) and ( $_POST[$nombreCampo] != "")) {
        if (gettype($_POST[$nombreCampo]) == "array") {
            $valorCampo = func_get_arg(1);
            foreach ($_POST[$nombreCampo] as $campoRequest) {
                if ($campoRequest == $valorCampo) {
                    return $campoRequest;
                }
            }
        } else {
            return $_POST[$nombreCampo];
        }
    }
}

/*
  Función que muestra el contenido de los campos de casilla de verificación o select ya rellenados cuando el formulario se muestra de nuevo por faltar campos obligatorios por rellenar
 */

function checkSelectedOrChecked($nombreCampo, $valorCampoAValidar, $type) {
    if (isset($_POST[$nombreCampo])) {
        if (gettype($_POST[$nombreCampo]) == "array") {
            foreach ($_POST[$nombreCampo] as $campoRequest) {
                if ($campoRequest == $valorCampoAValidar) {
                    return " $type='$type'";
                }
            }
        } else {
            if ($_POST[$nombreCampo] == $valorCampoAValidar) {
                return " $type='$type'";
            }
        }
    }
}

//Función que remarca en rojo los campos obligatorios no rellenados
function validateField($nombreCampo, $camposPendientes, $camposErroneos, $mensajeErrorImagen = "correcto") {
    if ($mensajeErrorImagen != "correcto") {
        return ' class="error3"';
    }
    if (in_array($nombreCampo, $camposPendientes)) {
        return ' class="error2"';
    }
    if (in_array($nombreCampo, $camposErroneos)) {
        return ' class="error1"';
    }
}
