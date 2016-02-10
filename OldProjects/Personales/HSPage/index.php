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
        <link href="css/indexStyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.1.js" type="text/javascript"></script>
        <script type="text/javascript">
            function redireccionar() {
                window.location = "home.php";
            }

            $(document).ready(function () {
                $("#mainButton").click(function () {
                    $("#mainButton").animate({"margin-top": "2%"}, {duration: 400, queue: false});
                    $("#mainButton img").animate({"height": "20%"}, {duration: 400, queue: false});
                    $("#mainButton img").animate({"width": "20%"}, {duration: 400, queue: false});
                    setTimeout("redireccionar()", 400); //tiempo expresado en milisegundos            
                });
                $(document).mousedown(function () {
                    $('*').css("cursor", "url('./img/cursor/ceclosed.png'),help")
                });
                $(document).mouseup(function () {
                    $('*').css("cursor", "url('./img/cursor/ceopen.png'),help")
                });
            });




        </script>
    </head>
    <body>

        <div id="mainButton"><a href="#"><img src="img/mainButton.png" height="40%" width="40%"/></a></div>
        <audio id="sonido" src="audio/pull-up-a-chair.mp3" controls></audio>

    </body>
</html>
