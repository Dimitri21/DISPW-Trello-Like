<?php
session_start();
use app\App;
/*
 * ROOT MANAGER CONSTANT
 */
//TODO to put on a file juste for variables ou constants
define('_ROOT', dirname(__DIR__));
$appPath        = _ROOT . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR ;
$viewsPath      = $appPath. "Views". DIRECTORY_SEPARATOR;
$controllerPath = $appPath. "Controller". DIRECTORY_SEPARATOR;
$entityPath     = $appPath. "Entity". DIRECTORY_SEPARATOR;

//MODEL et CONTROLLER Principal
require_once($controllerPath.'Controller.php');
require_once($entityPath.'Entity.php');
require_once($appPath.DIRECTORY_SEPARATOR.'Database'.DIRECTORY_SEPARATOR."SprintoDatabase.php");

//Traitement de paramètre d'URL
$home_page  = "home-home";
$path_uri   = isset($_GET["path"]) && !empty($_GET['path']) ? $_GET["path"] :$home_page;

if (!is_null($path_uri)) {

    $uri_params =(array) explode("-",$path_uri);

    //Pour un paramètre de longueur 3 => controller/action/slug , où slug = title-id
    if ( count($uri_params) == 1) {
        $uri_params = array_merge(array("home"),$uri_params);
    }
    $controller_name    = ucfirst($uri_params[0]).'Controller';
    $controller         = $controllerPath.$controller_name.'.php';
    $action             = $uri_params[1];

    require_once($controller);

    $controller_instance = new $controller_name();

    if (method_exists($controller_instance,$action)) {

        $params = $uri_params;
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller_instance,$action],$params);
    }else {
        var_dump("Action Page not Found");
        header("http/1.1 404 page not found");
    }
}
