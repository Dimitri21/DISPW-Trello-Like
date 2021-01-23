<?php

$page = "default.php";
$_ROOT= "../app/Views/";

//Obtenir un lien
if (isset($_GET['p']) && !empty($_GET['p'])) {
    $page = $_GET['p'];

    //traitement de requetes GET
    $path_build = explode("/",$page);
    if (count($path_build) == 2) {
        $url = $_ROOT . strtolower($path_build[0]) . "/" . strtolower($path_build[1]) . ".php";
        var_dump($url);
    }
    
}


//vérification de l'existance de la page


if (file_exists($url)) {
    require_once $url;
} else {
    var_dump(__DIR__);
    die("Page not found");
}
