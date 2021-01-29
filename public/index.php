<?php
/*
 * ROOT MANAGER
 */

use app\Entity\User;

//Including autoload file
require_once "../vendor/autoload.php";

//Globals variables
$_ROOT = dirname(__DIR__); //dirname
$uri = $_SERVER['REQUEST_URI']; //url
$error_404 = "../app/Views/home/404.php";

//Using Route
//Init User
$router = new  AltoRouter();

//test user
$user = new User();

$template_path = "../app/Views/templates/default.php";
$default_page_path = "../app/Views/home/home.php";

//ROUTE MANUEL

//PAGES STATIQUES
$router->map('GET', '/', 'home/home');

//Formulaires---
//  public
$router->map('GET', '/connexion', 'home/login');
$router->map('GET', '/inscription', 'home/signup');

//  personnel
$router->map('GET', '/reinit_mot_de_passe', 'user/resetpassword');
$router->map('GET', '/profil', 'user/profile');

//Pages Docs
$router->map('GET', '/mentions-legales', 'home/mentions');
$router->map('GET', '/conditions-generales-utilisation', 'home/cgu');
$router->map('GET', '/politique-de-confidentialite', 'home/confidentialite');


//Test
$router->map('GET', '/toto', function () {
    var_dump("Je suis en de travailler ");
    die();
});

//PAGE DYNAMIQUE
//$router->map('GET','/user/[:slug]-[:id]','user/');
$router->map('GET', '/user/[*:slug]-[i:id]', function ($slug, $id) {
    $user = new User();
    $user->setName("Jean")
        ->setLastname("DOE")
        ->setAvatar("https://source.unsplash.com/collection/190727/1600x900")
        ->setEmail("admin@tft.fr")
        ->setId(0)
        ->getPassword("admin");

    return require_once "../app/Views/user/profile.php";
});

$match = $router->match();

ob_start();
if ($match) {
    if (is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {

        require_once "../app/Views/{$match['target']}.php";
    }
    //extract($variables);
} else {
    require_once $error_404;
}
$content = ob_get_clean();

require($template_path);
