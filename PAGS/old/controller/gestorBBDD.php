<?php
/*******************************************************************Categorias*****************************************************************************/
function getCategorias() {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT * FROM categoria WHERE 1";
    $categorias = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $categorias;
}



/*******************************************************************Temas*****************************************************************************/
/**
 * Valida que el tema que se va a insertar no existe
 * @param type $id del tema INT
 * @param type $idCat de la categoria INT
 * @return type
 */
function getTemasById($id,$idCat) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT count(*) FROM `tema` where id=".$id." and categoria_id='".$idCat."'";
    $tema = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $tema;
}

function getTemasByCat($id) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT id,nombre FROM `tema` WHERE categoria_id=" . $id . " ORDER BY id";
    $temas = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $temas;
}
/**
 * Ejecuta una sentencia que inserta un Tema en la bbdd
 * @param type $catId
 * @param type $id
 * @param type $nombre
 */
function insertarTema($catId,$id,$nombre) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "INSERT INTO `tema`(`categoria_id`, `id`, `nombre`) VALUES (".$catId.",".$id.",'".$nombre."')";
    $db->query($sql);  //Ejecutar sentencia
    $db->close();
}
function modificarTema($idCategoria, $idTema, $nombreTema){
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "UPDATE INTO `tema`(`categoria_id`, `id`, `nombre`) VALUES (".$catId.",".$id.",'".$nombre."')";
    $db->query($sql);  //Ejecutar sentencia
    $db->close();
}


/*******************************************************************Apartados*****************************************************************************/


function getApartado($nombreTema,$idCat) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT * FROM apartado WHERE tema_nombre='".$nombreTema."' and categoria_id=".$idCat;
    $apartado = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $apartado;
}
/**
 * Ejecuta una sentecia que inserta un apartado
 * @param type $catId
 * @param type $nombreTema
 * @param type $idApartado
 * @param type $nombreApartado
 * @param type $contenido
 * @return type
 */
function insertarApartado($catId,$nombreTema,$idApartado,$nombreApartado,$contenido) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "INSERT INTO `apartado`(`categoria_id`, `tema_nombre`, `id`, `nombre`, `contenido`) VALUES (".$catId.",'".$nombreTema."',".$idApartado.",'".$nombreApartado."','".$contenido."')";
    $db->query($sql);  //Ejecutar sentencia
    $db->close();
}
/**
 * Valida que el apartado que se va a crear no exista
 * @param type $idCat
 * @param type $idApartado
 * @param type $nombreTema
 * @return type
 */
function validarApartado($idCat,$idApartado,$nombreTema) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');    
    $sql = "SELECT count(*) FROM `apartado` where id=".$idApartado." and categoria_id=".$idCat." and tema_nombre='".$nombreTema."'";
    $tema = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $tema;
}



/*******************************************************************Examenes*****************************************************************************/
function getExamenes($idCat) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT * FROM examenes WHERE categoria_id=".$idCat." ORDER BY fecha_examen";
    $examenes = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $examenes;
}


/*******************************************************************Usuarios*****************************************************************************/


function validarUsuario($usuario, $pass) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT count(*) FROM validacion WHERE usuario='" . $usuario . "' and password='" . $pass . "'";
    $validacion = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $validacion;
}

function getUsuario($usuario) {
//    $db = new mysqli('localhost', 'root', '', 'pags_es');
    $db = new mysqli("pags.es.mysql", "pags_es", "cbCbVfxf", 'pags_es');
    $sql = "SELECT usuario,nombre,admin_lvl FROM validacion WHERE usuario='" . $usuario . "'";
    $user = $db->query($sql);  //Ejecutar sentencia
    $db->close();
    return $user;
}