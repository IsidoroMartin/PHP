<script>
    $(document).ready(function() {
        var status = "<?php echo $status ?>";
        var userName = "<?php echo $userName ?>";
        var userAdminLvl = "<?php echo $userAdminLvl ?>";
        var notificacion = "<?php echo $notificacion ?>";
        var notifMsg = "<?php echo $notifMsg ?>";
        if (status === "conectado") {
            $("#login").html("Bienvenido " + userName + "<div id='salir'> <a href='php/logout.php' class='enlaces'>Salir</a></div>");
        }
        if (status === "errorBBDD") {
            $("#area_notificacion").html(errorMsg);
        }
        if (notificacion === "ON") {
            $("#area_notificacion").html(notifMsg);
        }

    });
</script>