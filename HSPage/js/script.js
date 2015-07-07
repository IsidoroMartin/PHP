function redireccionar() {
    window.location = "index.php";
}
$(document).ready(function () {
    $("img").error(function () {
        $(this).hide();
    });
    $(document).mousedown(function () {
        $('*').css("cursor", "url('./img/cursor/ceclosed.png'),help")
    });
    $(document).mouseup(function () {
        $('*').css("cursor", "url('./img/cursor/ceopen.png'),help")
    });
    $("#mainButton").click(function () {
        $("#mainButton").animate({"margin-top": "0%"}, {duration: 400, queue: false});
        $("#mainButton img").animate({"height": "20%"}, {duration: 400, queue: false});
        $("#mainButton img").animate({"width": "20%"}, {duration: 400, queue: false});
        setTimeout("redireccionar()", 400); //tiempo expresado en milisegundos            
    });
    $(".imagen").mouseenter(function () {
        $("#audio").get(0).play();
    });

});