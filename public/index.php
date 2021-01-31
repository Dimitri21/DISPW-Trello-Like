<?php
session_start();
use app\App;
/*
 * ROOT MANAGER CONSTANT
 */
define('_ROOT', dirname(__DIR__));
$viewAbsPath        = _ROOT . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "Views";

//Including autoload file
require_once "../vendor/autoload.php";

//Create App instance
$app = App::getInstance();

//Globals variables
$app->setViewAbsPath($viewAbsPath);

//--------------------------------------------------
//DEV-TO DELETE ON PROD
//--------------------------------------------------
$whoops = new Whoops\Run;
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
$whoops->register();
//-------------------------------------------------

//TODO Possibilités de créer un fichier que pour les routes
//--------------------------------------------------
//ROUTERS
//--------------------------------------------------
require_once(_ROOT.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."routers.php");

