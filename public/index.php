<?php
/*
 * ROOT MANAGER
 */

use app\Entity\User;

//Including autoload file
require_once "../vendor/autoload.php";

//Globals variables
$_ROOT              = dirname(__DIR__); //dirname
$uri                = $_SERVER['REQUEST_URI']; //url
$error_404          = "../app/Views/home/404.php";
$template_path      = "../app/Views/template/base.php";
$default_page_path  = "../app/Views/home/home.php";

//Using Route
$router = new  AltoRouter();

//test user for profile page
$user   = new User();

//--------------------------------------------------
                    //STATICS PAGES
//--------------------------------------------------
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

//-----------------------------------------------
                //DYNAMICS PAGES
//-----------------------------------------------
$router->map('GET', '/[*:slugger]-[i:id]', function ($slugger, $id) {
    //slugger and id must br used soon when we are going to make request to database
    $user = new User();
    $user->setName("Jean")
        ->setLastname("DOE")
        ->setAvatar("https://source.unsplash.com/collection/190727/1600x900")
        ->setEmail("admin@tft.fr")
        ->setId(0)
        ->getPassword("admin");
    $path = "../app/Views/user/profile.php";
    require_once $path;
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
