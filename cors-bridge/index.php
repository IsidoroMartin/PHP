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

$app->post('/simulate-request', function (Request $request, Response $response, array $args) {
    $_request = json_decode($request->getBody()); 
    $response_data = array();
    $httpreq = null;
    if(!isset($_request -> target) || empty($_request -> target) || !isset($_request -> method) || empty($_request -> method) ){
        $response_data["code"] = 96;
        $response_data["msg"]="Debe pasar los parametros obligatorios: Target y Method";
        $response = $response -> withStatus(400);
        $response = $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', array('Content-Type', 'X-Requested-With', 'Authorization'))
            ->withHeader('Access-Control-Allow-Methods', array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'))
            ->withHeader('Content-type', 'application/json');
        $response = $response -> getBody()->write(json_encode($response_data));
        return $response;
    }
    
    //$method = strtoupper($method);
    switch($_request -> method){
        case "GET":
            $httpreq = \Httpful\Request::get($_request -> target);
            break;
        case "POST":
            $httpreq = \Httpful\Request::post($_request -> target);    
            break;
        case "PUT":
            $httpreq = \Httpful\Request::put($_request -> target);
            break;
        case "DELETE":
            $httpreq = \Httpful\Request::delete($_request -> target);
            break;
        default:
            $response_data["code"] = 95;
            $response_data["msg"]="Method invalido";
            $response = $response -> withStatus(400);
            $response = $response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader('Access-Control-Allow-Headers', array('Content-Type', 'X-Requested-With', 'Authorization'))
                ->withHeader('Access-Control-Allow-Methods', array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'))
                ->withHeader('Content-type', 'application/json');
            $response = $response -> getBody()->write(json_encode($response_data));
            return $response;
    }

    if(isset($_request -> headers) && !empty($_request -> headers)){
        foreach ($_request -> headers as $name => $value) {
            $httpreq -> addHeader($name, $value);
        }
    }
    
    if(isset($_request -> body) && !empty($_request -> body)){
        $httpreq -> body($_request -> body);
    }
    $httpResp = $httpreq -> send();
    $response = $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', array('Content-Type', 'X-Requested-With', 'Authorization'))
        ->withHeader('Access-Control-Allow-Methods', array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'))
        ->withHeader('Content-type', 'application/json');
    $response = $response-> getBody()->write(json_encode($httpResp->body));
    return $response;


});

$app->run();

?>