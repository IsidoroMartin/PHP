<?php



//$host= localhost;
$HOST = "pags.es.mysql";

//$user = root;
$USER = "pags_es";

//$password = '';
$PASSWORD = "cbCbVfxf";

function getTemasByCat($id) {
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT id,nombre FROM `tema` WHERE categoria_id=" . $id . " ORDER BY id";
    $temas = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $temas;
}

function getApartado($nombreTema, $idCat) {
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT * FROM apartado WHERE tema_nombre='" . $nombreTema . "' and categoria_id=" . $idCat;
    $apartado = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $apartado;
}

function getExamenes($idCat) {
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT * FROM examenes WHERE categoria_id=" . $idCat . " ORDER BY fecha_examen";
    $examenes = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $examenes;
}

function validarUsuario($usuario, $pass) {
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT count(*) FROM validacion WHERE usuario='" . $usuario . "' and password='" . $pass . "'";
    $validacion = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $validacion;
}

function getUsuario($usuario) {
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT usuario,nombre,admin_lvl FROM validacion WHERE usuario='" . $usuario . "'";
    $user = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $user;
}

function getCategorias() {
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT * FROM categoria WHERE 1";
    $categorias = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $categorias;
}
