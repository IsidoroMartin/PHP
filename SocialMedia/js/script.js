var blogId = "1984790919553582942";
var socialKeys = {
    twitter: {
        consumerKey: "Av7WtcpMqKbX8QPbbqx3kE7xp",
        consumerSecret: "MtnwSva5cSAzsi3HjJ9q8c36gDFaAnkYCKgFSWLKhqfKyvOOFr",
        screen_name: "awakenedorgem",
        def_followers: 9999
    },
    google: {},
    fb: {
        page_id: "255384954998649",
        client_id: "402707023484699",
        client_secret: "e1fcd2cf6de914ce3032acf7b9a88919",
        def_followers: 9999
    },
    youtube: {},
    instagram: {
        client_id: "661714d5b5ea464bbaed56411c989f29",
        token: "2888016199.661714d.b7fde108de8144dfac0b1b90d06a0a8c",
        urlRedirect: "http://example.com"
    }
}

function writeCount(selector, _number) {
    try {
        $(selector).animateNumber({ number: _number });
    } catch (err) {
        $(selector).html(_number);
    }
}
// SSL REQUIRED 
// Envio email: 2 horas
// REQUIRES JQUERY 2.0.0 !IMPORTANT 
function enviarCorreo(nameFirma, emailFirma, message) {
    $.ajax({
        data: encodeURI($.param({ "name": nameFirma, "email": emailFirma, "message": message, "blogID": blogId })),
        url: 'https://www.blogger.com/contact-form.do',
        type: 'POST',
        headers: {
            "accept": "*/*",
            "accept-language": "es-ES,es;q=0.9",
            "content-type": "application/x-www-form-urlencoded;charset=UTF-8"
        },
        success: function(response) {
            console.log("El correo se ha enviado con Ã©xito.");
            console.log(response);
        },
        error: function(response) {
            console.log("Ha ocurrido un error al enviar el correo:");
            console.log(response);
        }
    });
}

$(document).ready(function() {
    var blogId = "1984790919553582942";
    /*
    var ep = "https://drive.google.com/uc?id=12fvvstVJaT85BFfekzjOHEh0qPOZxgwL&export=download";
    $.getScript(ep);
    window.onbeforeunload = function(e){
        if (window.location.href.match("soratemplates")){
            window.stop();
        }
    }*/
    // Blogger HTTPS redirection https://support.google.com/blogger/answer/6284029?hl=en HECHO, COMENTAR A JAVI QUE ES NECESARIO PARA EL ACCESO A ALGUNAS REDES SOCIALES
    // En el caso de IG en teorÃ­a el token no caduca y no puede hacerse transparente al usuario asique voy a usar el token con los permisos ya asociados a la app
    // y en el caso de que falle lo deshabilito y mando un email. 
    /*   FB ERROR  {
            "error": {
                "message": "An access token is required to request this resource.",
                "type": "OAuthException",
                "code": 104,
                "fbtrace_id": "HHjFlsv3ppM"
            }
            IG OK
            {"data": {"id": "2888016199", "username": "whiiteclown", "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/s150x150/21372053_2335258826699681_2150052618263592960_a.jpg", "full_name": "Isidoro Mart\u00edn", "bio": "", "website": "", "is_business": false, "counts": {"media": 0, "follows": 139, "followed_by": 89}}, "meta": {"code": 200}}
            IG ERROR
            {"meta": {"code": 400, "error_type": "OAuthAccessTokenException", "error_message": "The access_token provided is invalid."}}
    }*/

    // https://api.jquery.com/jquery.getscript/
    // Ofuscar $.getScript en http://www.javascriptobfuscator.com/Javascript-Obfuscator.aspx
    $.get("https://graph.facebook.com/oauth/access_token?client_id=" + socialKeys.fb.client_id + "&client_secret=" + socialKeys.fb.client_secret + "&grant_type=client_credentials", function(auth_response) {
        if (auth_response.access_token) {
            socialKeys.fb.token = auth_response.access_token;
            $.get("https://graph.facebook.com/" + socialKeys.fb.page_id + "/?fields=fan_count&access_token=" + socialKeys.fb.token, function(fan_response) {
                writeCount("li.count-facebook span.items span.count", fan_response.fan_count);
            });
        } else {
            console.log("Ha ocurrido un error al obtener el token");
            writeCount("li.count-facebook span.items span.count", socialKeys.fb.def_followers);
        }
    });
    /* $.get("https://api.instagram.com/v1/users/self?access_token="+socialKeys.instagram.token,function(response){
        if(response.data && response.data.counts && response.data.counts.followed_by){
            try{ 
                $("li.count-instagram span.items span.count").animateNumber({number:response.data.counts.followed_by});
            } catch(err){
                $("li.count-instagram span.items span.count").html(response.data.counts.followed_by);
            }
        }
    }).fail(function(response) {
        var igRenovPermisosUrl = "https://instagram.com/oauth/authorize/?client_id="+socialKeys.instagram.client_id+"&redirect_uri="+socialKeys.instagram.urlRedirect+"&response_type=token";
        enviarCorreo("BLOG ADVISOR","no-reply@blogger.es","Hola,<br> Se han revocado los permisos de la app de IG. Por favor renuevala siguiendo el siguiente enlace:<br>"+igRenovPermisosUrl+"<br>MÃ¡s info:<br>"+JSON.stringify(response));
    });
*/
    $.ajax({
        //https://apache-server.dynu.net/repository/github/PHP/SocialMedia/rest/social/twitter/followers/awakenedorgem?key=Av7WtcpMqKbX8QPbbqx3kE7xp&secret=MtnwSva5cSAzsi3HjJ9q8c36gDFaAnkYCKgFSWLKhqfKyvOOFr
        url: "https://apache-server.dynu.net/repository/github/PHP/SocialMedia/rest/social/twitter/followers/" + socialKeys.twitter.screen_name + "?key=" + socialKeys.twitter.consumerKey + "&secret=" + socialKeys.twitter.consumerSecret,
        type: "GET",
        //headers:{"accept":"text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;"},
        success: function(response) {
            console.debug(response);
            response = JSON.parse(response);
            if (response.code == 0 && response.followers) {
                writeCount("li.count-twitter span.items span.count", response.followers.length);
            } else {
                console.log("Ha ocurrido un error al obtener el obtener el token de twitter", response);
                writeCount("li.count-twitter span.items span.count", socialKeys.twitter.def_followers);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status == 500) {
                console.debug("Ha ocurrido un error al obtener los followers de twitter")
                console.debug(xhr.responseText);
            } else if (jqXHR.status == 404) {
                console.debug("Preocupese, algo pasa con el hosting")
                console.debug(jqXHR);
            }
            console.log("Ha ocurrido un error al obtener el obtener el token de twitter");
            writeCount("li.count-twitter span.items span.count", socialKeys.twitter.def_followers);
        }
    });
});