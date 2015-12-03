<?php

require_once './funcionesValidacion.php';
require_once("funciones.php");
require_once("constantes.php");

function veriForm1() {
    $camposObligatorios = array("nombre" => "String", "apellidos" => "String", "direccion" => "String", "email" => "Email", "telefono" => "Integer", "foto1" => "Imagen");
    $camposPendientes = array();
    $camposErroneos = array();
    $mensajeErrorImagen = validaCampos($camposObligatorios, $camposPendientes, $camposErroneos);
    if ($camposPendientes || $camposErroneos) {
        displayForm1($camposPendientes, $camposErroneos, $mensajeErrorImagen);
    } else {
        procesForm1();
    }
}

function procesForm1() {
    //rellenar datos del segundo formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $nombreImagen = $_FILES["foto1"]["name"];
    $datos = array(
        "scriptUrl" => "index.php",
        "valorNombre" => $nombre,
        "valorApellidos" => $apellidos,
        "valorDireccion" => $direccion,
        "valorTelefono" => $telefono,
        "valorEmail" => $email,
        "valorFoto" => $nombreImagen,
        "checkSelectedOrCheckedCiudad Roma" => checkSelectedOrChecked("ciudades", "Roma", "selected"),
        "checkSelectedOrCheckedCiudad Paris" => checkSelectedOrChecked("ciudades", "Paris", "selected"),
        "checkSelectedOrCheckedCiudad NuevaYork" => checkSelectedOrChecked("ciudades", "Nueva York", "selected"),
        "checkSelectedOrCheckedCiudad Londres" => checkSelectedOrChecked("ciudades", "Londres", "selected"),
        "checkSelectedOrCheckedCiudad Berlin" => checkSelectedOrChecked("ciudades", "Berlin", "selected"),
        "checkSelectedOrCheckedCiudad Atenas" => checkSelectedOrChecked("ciudades", "Atenas", "selected"),
        "checkSelectedOrChecked correoPostal" => checkSelectedOrChecked("medios", "correoPostal", "checked"),
        "checkSelectedOrChecked email" => checkSelectedOrChecked("medios", "email", "checked")
    );
    $plantilla = 'plantillas/formulario2.html';
    $salida = vista($datos, $plantilla);
    $datos = array(
        "titulo" => TITULO,
        "formulario" => $salida
    );
    $plantilla = "plantillas/plantilla.html";
    $html = vista($datos, $plantilla);
    print ($html);
}

function displayForm1($camposPendientes = array(), $camposErroneos = array(), $mensajeErrorImagen = "correcto") {
    if ($camposPendientes || $camposErroneos || $mensajeErrorImagen != "correcto") {
        $error = '<p class="error1">Hubo algunos problemas con el formulario que usted presentó. Por favor, complete correctamente los campos remarcados de abajo y haga clic en Enviar para volver a enviar el formulario.</p>';
    } else {
        $error = '<p>por favor, rellene sus datos a continuación y haga clic en Enviar.
Los campos marcados con un asterisco (*) son obligatorios.</p>';
    }
    if (count($camposPendientes) > 0) {
        $error .= "<p class='error2'>Faltan por rellenar campos en el formulario:";
        foreach ($camposPendientes as $campo) {
            $error.=$campo . ", ";
        }
        $error = preg_replace("/, $/", "", $error);
        $error.="</p>";
    }
    if (count($camposErroneos) > 0) {
        $error .= "<p class='error1'>Hay campos mal rellenados en el formulario:";
        foreach ($camposErroneos as $campo) {
            $error.=$campo . ", ";
        }
        $error = preg_replace("/, $/", "", $error);
        $error.="</p>";
    }
    if ($mensajeErrorImagen != "correcto") {
        $error .= "<p class='error3'>$mensajeErrorImagen</p>";
    }
    $ciudades = array("Roma", "Paris", "Nueva York", "Londres", "Berlin", "Atenas");
    $medios = array("correoPostal", "email");
    $ocultosCiudades = "";
    foreach ($ciudades as $ciudad) {
        $ocultosCiudades.='<input type="hidden" name="ciudades[]" value="' . setValue("ciudades", $ciudad) . "\"/>\n";
    }
    $ocultosMedios = "";
    foreach ($medios as $medio) {
        $ocultosMedios.='<input type="hidden" name="medios[]" value="' . setValue("medios", $medio) . "\"/>\n";
    }
    $datos = array(
        "error" => $error,
        "scriptUrl" => "index.php",
        "ocultosCiudades" => $ocultosCiudades,
        "ocultosMedios" => $ocultosMedios,
        "validacionNombre" => validateField("nombre", $camposPendientes, $camposErroneos),
        "valorNombre" => setValue("nombre"),
        "validacionApellidos" => validateField("apellidos", $camposPendientes, $camposErroneos),
        "valorApellidos" => setValue("apellidos"),
        "validacionDireccion" => validateField("direccion", $camposPendientes, $camposErroneos),
        "valorDireccion" => setValue("direccion"),
        "validacionTelefono" => validateField("telefono", $camposPendientes, $camposErroneos),
        "valorTelefono" => setValue("telefono"),
        "validacionEmail" => validateField("email", $camposPendientes, $camposErroneos),
        "valorEmail" => setValue("email"),
        "validacionFoto" => validateField("foto1", $camposPendientes, $camposErroneos, $mensajeErrorImagen)
    );
    $plantilla = "plantillas/formulario.html";
    $formulario = vista($datos, $plantilla);
    $datos = array(
        "titulo" => TITULO,
        "formulario" => $formulario
    );
    $plantilla = "plantillas/plantilla.html";
    $html = vista($datos, $plantilla);
    print ($html);
}

function processForm2() {
    //rellenar datos del segundo formulario
    $nombre = $_POST["nombre"];
    $urlFoto = "./files/" . $_POST["foto1"];
    $datos = array(
        "nombre" => $nombre,
        "urlFoto" => $urlFoto
    );
    $plantilla = 'plantillas/confirmSolicitud.html';
    $salida = vista($datos, $plantilla);
    $datos = array(
        "titulo" => TITULO,
        "formulario" => $salida
    );
    $plantilla = "plantillas/plantilla.html";
    $html = vista($datos, $plantilla);
    print ($html);
}

function vista($resultados, $plantilla) {
    $html = file_get_contents($plantilla);
    foreach ($resultados as $key1 => $valor1)
        if (count($valor1) > 1) {
            foreach ($valor1 as $key2 => $valor2) {
                $cadena = "{" . $key1 . " " . $key2 . "}";
                $html = str_replace($cadena, $valor2, $html);
            }
        } else {
            $cadena = '{' . $key1 . '}';
            $html = str_replace($cadena, $valor1, $html);
        }
    return $html;
}
