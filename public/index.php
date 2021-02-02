<?php

/*
 * ROOT MANAGER CONSTANT
 */
//TODO to put on a file juste for variables ou constants
define('_ROOT', dirname(__DIR__));
require _ROOT .DIRECTORY_SEPARATOR .'app'.DIRECTORY_SEPARATOR.'App.php';
\App\App::start();

//Traitement de paramètre d'URL
$home_page  = "home-home";
$path_uri   = isset($_GET["path"]) && !empty($_GET['path']) ? $_GET["path"] :$home_page;

//Variables globals
$appPath        = _ROOT . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR ;
$viewsPath      = $appPath. "Views". DIRECTORY_SEPARATOR;
$controllerPath = $appPath. "Controller". DIRECTORY_SEPARATOR;
$entityPath     = $appPath. "Entity". DIRECTORY_SEPARATOR;

if (!is_null($path_uri)) {

    $uri_params = (array) explode("-",$path_uri);
    $controller_name = $controller_path = "";

    //Pour un paramètre de longueur 3 => controller/action/slug , où slug = title-id
    $url_length = count($uri_params);

    if ( $url_length <= 1) {
        $uri_params         = array_merge(array("home"),$uri_params);
        $controller_name    .= DIRECTORY_SEPARATOR.ucfirst($uri_params[0]).'Controller';
        $controller_path    = $controllerPath.$controller_name.'.php';
        $action             = end($uri_params);
    }else if ($url_length=== 3){
        $controller_name    = 'Admin';
        $controller_name    = ucfirst($uri_params[1]).'Controller';
        $controller_path    = $controllerPath.'Admin'.DIRECTORY_SEPARATOR.$controller_name.'.php';
        $action             = end($uri_params);
    }else {
        $controller_name    .= DIRECTORY_SEPARATOR.ucfirst($uri_params[0]).'Controller';
        $controller_path    = $controllerPath.$controller_name.'.php';
        $action             = $uri_params[1];
    }


    if (file_exists($controller_path)) {
        require_once($controller_path);
        $controller_instance = new $controller_name();

        if (method_exists($controller_instance,$action)) {
            $params = $uri_params;
            unset($params[0]);
            unset($params[1]);
            call_user_func_array([$controller_instance,$action],$params);
        }else {
//            var_dump("Action {$action} doen't existe");
//            header("http/1.1 404 page not found");
            $params = [];
            $action = "error404";
            call_user_func_array([$controller_instance,$action],$params);
        }
    }else {
        var_dump("Controller Page not Found");
        header("http/1.1 404 page not found");
    }

}
