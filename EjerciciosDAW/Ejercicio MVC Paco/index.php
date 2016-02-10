<?php

require_once("funcionesRelleno.php");
require_once("funciones.php");

switch (true) {
    case (isset($_POST["toStep2"])):
        veriForm1();
        break;
    case (isset($_POST["toStep3"])):
        processForm2();
        break;
    default :
        displayForm1();
}