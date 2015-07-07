<?php
include_once './controller/gestorBBDD.php';
$idLengua = 1;
$idLiteratura = 2;
$idMatematicas = 3;
$idIngles = 4;
$temasLengua = getTemasByCat($idLengua);
$temasLiteratura = getTemasByCat($idLiteratura);
$lenguaExamenes = getExamenes($idLengua);
$matesExamenes = getExamenes($idMatematicas);
$inglesExamenes = getExamenes($idIngles);
?> 

<div id='cssmenu'>
    <ul>
        <li class='active' ><a href='index.php' id="home"><span>Home</span></a></li>
        <li class='has-sub'><a href='./lenguaylit.php' ><span>Lengua y Literatura</span></a>
            <ul>
                <li class='has-sub'><a href='./temas.php?id=1' ><span>Lengua</span></a>
                    <ul>
                        <?php
                        while ($temaLengua = mysqli_fetch_array($temasLengua)) {
                            $nombre = $temaLengua['nombre'];
                            $id = $temaLengua['id'];
                            ?>
                            <li><a href='contenido_lengua.php?idcat=<?php echo $idLengua; ?>&tema_nombre=<?php echo $nombre; ?>' class='top_menu'><span>Tema <?php echo $id . " " . $nombre ?></span></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class='has-sub'  ><a href='./temas.php?id=2' class="bot_menu"><span>Literatura</span></a>
                    <ul>
                        <?php
                        while ($temaLiteratura = mysqli_fetch_array($temasLiteratura)) {
                            $nombreLit = $temaLiteratura['nombre'];
                            $idLit = $temaLiteratura['id'];
                            ?>
                            <li><a href='contenido_lengua.php?idcat=<?php echo $idLiteratura; ?>&tema_nombre=<?php echo $nombreLit; ?>' class='top_menu'><span>Tema <?php echo $idLit . " " . $nombreLit ?></span></a></li>

                            <?php
                        }
                        ?>
<!--<li class='last'><a href='#' class="bot_menu"><span>Sub Item</span></a></li>-->
                    </ul>
                </li>
                <li class='has-sub'><a href='examenes.php?idcat=<?php echo $idLengua; ?>' class="bot_menu"><span>Examenes</span></a>
                    <ul>
                        <?php
                        while ($lenguaExamen = mysqli_fetch_array($lenguaExamenes)) {
                            $fechaExamenL = $lenguaExamen['fecha_examen'];
                            $examenUrlL = $lenguaExamen['url'];
                            ?>
                            <li><a href='<?php echo $examenUrlL; ?>' class='top_menu'><span> Examen<?php echo " " . $fechaExamenL ?></span></a></li>

                            <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </li>
        <li class='has-sub'><a href='./maths.php' ><span>Mates</span></a>
            <ul>
                <li class='has-sub'><a href='examenes.php?idcat=<?php echo $idMatematicas; ?>' ><span>Examenes</span></a>
                    <ul>
                        <?php
                        while ($matesExamen = mysqli_fetch_array($matesExamenes)) {
                            $fechaExamenM = $matesExamen['fecha_examen'];
                            $examenUrlM = $matesExamen['url'];
                            ?>
                            <li><a href='<?php echo $examenUrlM; ?>' class='top_menu'><span> Examen<?php echo " " . $fechaExamenM ?></span></a>

                            </li>

                            <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </li>
        <li class='has-sub'><a href='./ingles.php' ><span>Ingles</span></a>
            <ul>
                <li class='has-sub'><a href='examenes.php?idcat=<?php echo $idIngles; ?>' ><span>Examenes</span></a>
                    <ul>
                        <?php
                        while ($inglesExamen = mysqli_fetch_array($inglesExamenes)) {
                            $fechaExamenI = $inglesExamen['fecha_examen'];
                            $examenUrlI = $inglesExamen['url'];
                            ?>
                            <li><a href='<?php echo $examenUrlI; ?>' class='top_menu'><span> Examen<?php echo " " . $fechaExamenI ?></span></a></li>

                            <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href='#' class="withoutborder"><span>Agradecimientos</span></a></li>
        <li class='last'><a href="mailto:pags.whiteclown@gmail.com"><span>Contacto</span></a></li>
        <?php
        if ($userAdminLvl <= 4) {
            ?>


            <li class='has-sub'><a href='' class="bot_menu"><span>Administrador</span></a>
                <ul>
                    <li><a href='<?php ?>' class='top_menu'><span> Insertar</span></a>
                        <ul>
                            <li><a href='insertar_tema_form.php' class='top_menu'><span> Tema </span></a></li>
                            <li><a href='insertar_apartado_form.php' class='bot_menu'><span> Apartado </span></a></li>
                            <li><a href='' class='bot_menu'><span> Examen </span></a></li>
                        </ul>
                    </li>


                    <?php
                    if ($userAdminLvl <= 3) {
                        ?>

                        <li><a href='<?php ?>' class='top_menu'><span> Modificar</span></a>
                            <ul>
                                <li><a href='modificar_tema_form.php' class='top_menu'><span> Tema </span></a></li>
                                <li><a href='modificar_apartado_form.php' class='bot_menu'><span> Apartado </span></a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    if ($userAdminLvl <= 2) {
                        ?>

                        <li><a href='<?php ?>' class='top_menu'><span> Borrar</span></a></li>

                        <?php
                    }
                    ?>
                </ul>
            </li>
            <?php
        }
        ?>
        <div id ="login">

            <form method="POST" action="controller/validacion_controller.php">
                Login <input id="usuario" name="usuario" type="text" placeholder="Usuario" required>
                <input id="password" name="password" type="password" placeholder="Contraseña" required>
                <input type="submit" value="Ok">
            </form>
        </div>

    </ul>

</div>

<div id="area_notificacion"></div>