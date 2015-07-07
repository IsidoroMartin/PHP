<?php
if (isset($_GET['season']) && isset($_GET['type'])) {
    $seasonJSON = $_GET['season'];
    $type = $_GET['type'];
    $str_datos = file_get_contents($seasonJSON);
    $datos = json_decode($str_datos, true);
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>HearthStone</title>
        <link href="css/modal.css" rel="stylesheet" type="text/css"/>
        <link href="css/formulario.css" rel="stylesheet" type="text/css"/>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="js/Modal.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <?php
            include './php/menu.php';
            include './html/ventanaLogin.html';
            ?>
        </header>
        <div id="contenedor">
            <div class="título">
                <h1>Creación de cuenta</h1>
            </div>
            <div id='formulario'>
                <div id="labels">
                    <label>País de Residencia</label>
                    <br/>
                    <label>Fecha de Nacimiento</label>
                    <br/>
                    <label>Nombre</label>
                    <br/>
                    <label>Dirección de Email</label>
                    <br/>
                    <label>Contraseña</label>
                    <br/>
                    <label>Pregunta y Respuesta secreta</label>
                    <br/>
            
                </div>
                <form method="POST" action="">
                    <table id="tableForm" >
                        <tr><td colspan="3  ">
                                <select name="Pais" required>
                                    <option>Seleccione un país</option>
                                    <option>España</option>
                                    <option>Reino Unido</option>
                                    <option>BLABLABLABLA</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td align="right" required>
                                <select name="day">
                                    <option>Dia</option>
                                    <?php
                                    for ($i = 31; $i >= 1; $i--) {
                                        echo '<option>' . $i . '</option>';
                                    }
                                    ?>

                                </select>
                            </td>
                            <td>
                                <select name="month" required>
                                    <option>Mes</option>
                                    <option>Enero</option>
                                    <option>Febrero</option>
                                    <option>Marzo</option>
                                    <option>Abril</option>
                                    <option>Mayo</option>
                                    <option>Junio</option>
                                    <option>Julio</option>
                                    <option>Septiembre</option>
                                    <option>Octubre</option>
                                    <option>Noviembre</option>
                                    <option>Diciembre</option>

                                </select>
                            </td>
                            <td>
                                <select name="month" required>
                                    <option>Año</option>
                                    <?php
                                    for ($i = 2015; $i >= 1980; $i--) {
                                        echo '<option>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="nombre" name="nombre" Placeholder="Nombre" required/>
                            </td>
                            <td colspan="2">
                                <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" id="email" name="email" Placeholder="Direccion de correo" required/>
                                
                            </td>
                            <td colspan="2">
                                <input type="email" id="email2" name="email2" Placeholder="Direccion de correo" required/>
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <input type="password" id="pass" name="pass" placeholder="Contraseña" required/>
                            </td>
                            <td colspan="2">
                                <input type="password" id="pass2" name="pass2" placeholder="Contraseña" required/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="preguntasecreta">
                                    <option>Selecccione Pregunta</option>
                                    <option>Nombre de tu perro</option>
                                    <option>Nombre de tu gato</option>
                                    <option>Numero de hermanos</option>
                                </select>
                            </td>
                            <td colspan="2">
                                <input type="text" id="respuesta" name="respuesta" placeholder="Respuesta"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                  <input type="submit" id="submitform" name="submitform" value="Crear cuenta"/>
                            </td>
                            <td>
                                  <input type="reset" id="resetform" name="resetform" value="Vaciar Campos"/>
                            </td>
                        </tr>
                    </table>
                  
                </form>
            </div>
        </div>
        <div id="bg">
            <img src="img/bnet-background-1920.jpg" alt="">
        </div>
    </body>
</html>
