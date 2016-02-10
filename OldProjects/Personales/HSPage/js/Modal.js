$(document).ready(function () {
    $(document).keyup(function (event) {
        if (event.which === 27) {
            window.location.href = "#close";
        }
    });


    $("#desconectar").click(function () {
        $.get("php/destroySession.php");
        location.reload();
    });

});
