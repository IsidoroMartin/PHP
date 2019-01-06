<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
    // whitelist of safe domains
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

}
/*
    function hash($u,$p){
        $options = [
            'cost' => 11,
        ];  
        return password_hash(base64_encode($a):base64_encode($p), PASSWORD_BCRYPT, $options);
    } 
    echo $_GET["token"];
    if(isset($_GET["token"])){
        $tokenContent  = base64_decode($_GET["token"]);
        $credentials = split (':' , $tokenContent);
        $password =  hash($credentials[0], $credentials[1]);
        $passwordOk = hash("BlAdministrt0r","E7Dat0inCoRru570");
        echo $passwordOk.'<br>\n';
        echo $password.'<br>\n';
        if(isset($_POST["action"])){
            
        } else {
            echo 'Debe introducir una accion';
        }
        /*# Our new data
        $data = array(
            'election' => 1,
            'name' => 'Test'
        );
        # Create a connection
        $url = '/api/update';
        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($data, '', '&');
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);*/
  /*  } else {
        echo 'A tu casa';
    }
*/
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
include('vendor/httpful.phar');

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$app = new \Slim\App;
$app->get('/social/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});
$app->get('/social/twitter/followers/{screen_name}', function (Request $request, Response $response, array $args) {
    
  /* if( $request->getMethod()=="OPTIONS"){
        exit;
   }*/
    $key =  $request->getQueryParam('key');
    $secret =  $request->getQueryParam('secret');

    if(isset($key) && isset($secret) && $args['screen_name']){
        $response_data = array();
        $bearer_token = twitterAuth($key, $secret);
        try{  
            if($bearer_token != null){
               $followers = twitterFollowers($bearer_token, $args['screen_name']);
                if($followers != null){
                    $response_data["code"] = 0;
                    $response_data["msg"]="Operacion realizada con  exito";
                    $response_data["followers"]=$followers;
                    $response->withStatus(200);
                } else {
                    $response_data["code"] = 97;
                    $response_data["msg"]="Ha ocurrido un error al recuperar los followers";
                    $response_data["followers"]=$followers;
                    $response->withStatus(500);
                }
            } else {
                $response_data["code"] = 98;
                $response_data["msg"]="Ha ocurrido un error al recuperar el token de autenticacion";
                $response->withStatus(500);
            }
        } catch (Exception $e) {
            $response_data["code"] = 99;
            $response_data["msg"]="Ha ocurrido un error interno";
            $response->withStatus(500);
        }
    } else {
        $response_data["code"] = 96;
        $response_data["msg"]="Debe pasar los parametros obligatorios";
        $response->withStatus(400);
    }
    $response
    //$response->withHeader('Access-Control-Allow-Origin', '');
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Headers', array('Content-Type', 'X-Requested-With', 'Authorization'))
    ->withHeader('Access-Control-Allow-Methods', array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'))
    ->withHeader('Content-type', 'application/json');
    $response-> getBody()->write(json_encode($response_data));
    return $response;
});
$app->run();

function twitterAuth($key,$secret){
    $bearer_token = null;

    $auth_token = base64_encode($key.":".$secret);
    $response = \Httpful\Request::post("https://api.twitter.com/oauth2/token?grant_type=client_credentials") 
        ->addHeader('Authorization', 'Basic '.$auth_token)     
        ->send();
    
    if(isset($response->body) && isset($response->body->access_token))
        $bearer_token = $response->body->access_token;
  
    return $bearer_token;
}
function twitterFollowers($bearer_token,$screen_name){
    $followers = null;
    $response = \Httpful\Request::get("https://api.twitter.com/1.1/followers/ids.json?screen_name=$screen_name")
    ->addHeader('Authorization', 'Bearer '.$bearer_token) 
    ->send();

    if(isset($response->body) && isset($response->body->ids))
        $followers = $response->body->ids;

    return $followers;
}

?>