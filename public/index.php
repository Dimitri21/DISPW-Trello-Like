<?php
/*
 * ROOT MANAGER
 */

use app\Entity\User;
use app\Router;

//Including autoload file
require_once "../vendor/autoload.php";

//Globals variables
$_ROOT              = dirname(__DIR__);
$viewAbsPath        = $_ROOT.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."Views";

//--------------------------------------------------
                    //DEV-TO DELETE ON PROD
//--------------------------------------------------
$whoops = new Whoops\Run;
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
$whoops->register();
//-------------------------------------------------

//Using our Router
$router = new  Router($viewAbsPath);

//test user for profile page
$user   = new User();

//TODO Possibilités de créer un fichier que pour les routes
//--------------------------------------------------
//STATICS PAGES
//--------------------------------------------------
$router->getRouter('/', 'home/home','accueil')
    ->getRouter( '/connexion', 'home/login')
    ->getRouter('/inscription', 'home/signup')
    ->getRouter( '/reinit_mot_de_passe', 'user/resetpassword')
    ->getRouter(  '/profil', 'user/profile')
    ->getRouter( '/mentions-legales', 'home/mentions')
    ->getRouter( '/conditions-generales-utilisation', 'home/cgu')
    ->getRouter( '/politique-de-confidentialite', 'home/confidentialite')
    ->getRouter( '/[*:slugger]-[i:id]','user/profile')//last one has error to fixe
    ->postRouter( '/connexion','admin/login');//last one has error to fixe
$router->start();

//-----------------------------------------------
//DYNAMICS PAGES
//-----------------------------------------------
//$router->map('GET', '/[*:slugger]-[i:id]', function ($slugger, $id) {
    //slugger and id must br used soon when we are going to make request to database
//    $user = new User();
//    $user->setName("Jean")
//        ->setLastname("DOE")
//        ->setAvatar("https://source.unsplash.com/collection/190727/1600x900")
//        ->setEmail("admin@tft.fr")
//        ->setId(0)
//        ->getPassword("admin");
//    $path = "../app/Views/user/profile.php";
//    require_once $path;
//});


