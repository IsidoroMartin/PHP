<?php
include_once '../controller/gestorBBDD.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $val = $_GET['val'];
    $getTemas = getTemasByCat($id);
    while ($getTema = mysqli_fetch_array($getTemas)) {
        $nombreTema = $getTema['nombre'];
        $idTema = $getTema['id'];
        if ($val == "nombre") {
            ?>
            <option value="<?php echo $nombreTema; ?>"><?php echo $nombreTema; ?></option>
            <?php
        }
        if ($val == "id") {
            ?>
            <option  id="<?php echo $nombreTema; ?>" value="<?php echo $idTema; ?>"><?php echo $idTema; ?></option>
            <?php
        }
    }
}
