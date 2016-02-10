<?php

define("VIEW_DIRECTORY", "./vistas/");
$directorys = array('./modelo/utils/constantes','./modelo/beans','./controlador');
/* Por cada directorio añadimos las clases de este */
foreach ($directorys as $directory) {
    foreach (glob("$directory/*.php") as $filename) {
        include_once $filename;
       
    }
}
/* En el caso de las vistas me genero un array global de constantes con todas las rutas de las vistas */
foreach (glob(VIEW_DIRECTORY . "*.html") as $filePath) {
    define("VIEW_" . strtoupper(basename($filePath, ".html")), $filePath);
}

