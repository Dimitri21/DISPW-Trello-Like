<?php

define('ROOT',dirname(__DIR__));
require ROOT.'/app/App.php';

App::load();
/*Traitement de la page home*/
$banners = null;

if(isset($_GET['p']))
{
    $page = $_GET['p'];
}else
{
    //Home page
    $page = "home.home";
}

/**
 * @function explode
 * fonction met tout ce qui se trouve dans la "$page" dans un table
 */
$page = explode('.',$page);

$arguments = count($page); // conte le contenu du table
$controller ="";

if($arguments === 1 )
{
    //exemple : index.php?p=login
    if ($page[0] === 'login') {
        $controller = '\App\Controller\UtilisateurController';
        $action = $page[0];
    }elseif($page[0] === 'logout')
    {
        $controller = '\App\Controller\UtilisateurController';
        $action = $page[0];
    }
}

elseif ($arguments === 2 )
{
    //exemple : index.php?p=tutoriels.index
    $controller = '\App\Controller\\'.ucfirst($page[0]).'Controller';
    $action = $page[1];

}
elseif ($arguments===3)
{
    if($page[0] === 'admin')
    {
        $controller = '\App\Controller\Admin\\'.ucfirst($page[1]).'Controller';
        $action = $page[2]; //c'est le nom de la methode existante dans /admin/
    }
}
else
{
    $page = "modules.index";
    $page = explode('.',$page);
    $controller = '\App\Controller\\'.ucfirst($page[0]).'Controller';
    $action = $page[1]; //est le nom de method
}

if($controller === "" )
{
    //header('Location:index.php?p=notFound');//Traitement de page NOTFOUND
    die("Page not Found");
}

try
{
    $controller = new $controller();
    $controller->$action();

}catch (Exception $e)
{
    //header('Location:index.php?p=notFound');//Traitement de page NOTFOUND
    die("En contruction!!! : ".$e->getMessage());
}
