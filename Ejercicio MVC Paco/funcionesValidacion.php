<?php

function validaCampos($camposObligatorios, &$camposPendientes, &$camposErroneos) {
    $expReg = "";
    $mensaje = "correcto";
    foreach ($camposObligatorios as $campoObligatorio => $type) {
        if ($type != "Imagen") {
            if (!isset($_POST[$campoObligatorio]) or $_POST[$campoObligatorio] == "") {
                $camposPendientes[] = $campoObligatorio;
            } else {
                switch ($type) {
                    case "String":
                        $expReg = "/^[a-zA-Z][a-zA-Z ]+$/";
                        break;
                    case "Email":
                        $expReg = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z0-9]{2,}$/";
                        break;
                    case "Integer":
                        $expReg = "/^[0-9]+$/";
                        break;
                }
                if (isset($_POST[$campoObligatorio]) && !preg_match($expReg, $_POST[$campoObligatorio])) {
                    $camposErroneos[] = $campoObligatorio;
                }
            }
        } else {
            if (($mensaje = validaImagen($campoObligatorio)) != "correcto")
                $camposErroneos[] = $campoObligatorio;
        }
    }
    return $mensaje;
}

function validaImagen($imagen) {
    $mensaje = "";
    if (isset($_FILES[$imagen])) {
        if ($_FILES[$imagen]["error"] == UPLOAD_ERR_OK) {
            $foto = $_FILES[$imagen];
            if (($foto["type"] != "image/pjpeg") && ($foto["type"] != "image/jpeg")
                    && ($foto["type"] != "image/png")) {
                $mensaje = "Solo se pueden subir imágenes JPG, JPEG o PNG";
            } elseif (!move_uploaded_file($foto["tmp_name"], "files/" . basename($foto["name"]))) {
                $mensaje = "Lo sentimos, hubo un problema al subir esa foto." . $foto["error"];
            } else {
                $mensaje = "correcto";
            }
        } else {
            $mensaje = "Lo sentimos, hubo un problema al subir la foto $mensaje: ";
            switch ($_FILES[$imagen]["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                    $mensaje .= "La foto es más grande de lo que permite el servidor.";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $mensaje .= "La foto es más grande de lo que permite el formulario.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $mensaje .= "No se ha subido ningún archivo.";
                    break;
                default:
                    $mensaje .= "Póngase en contacto con el administrador del servidor para
obtener ayuda.";
            }
        }
    } else {
        $mensaje = "Debe introdicir una foto";
    }
    return $mensaje;
}

?>