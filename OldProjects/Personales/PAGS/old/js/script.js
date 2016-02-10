$(document).ready(function() {
    var altoNavegador = $(window).height();
    var anchoNavegador = $(window).width();
    var altoLogo = $("#logo").height();
    var altoMenu = $("#menu").height();
    $(window).resize(function() {
        location.reload();
    });
    if (anchoNavegador < 1040) {
        var heightImage = $("img").attr("height");
        var widthImage = $("img").attr("width");
        $("#login").appendTo("#login2");
        $("#menu").css("width", "100%");
        $("#menu").css("margin-left", "0%");
    }
    $("#contenedor").css("margin-top", altoMenu + 20 + "px");
});