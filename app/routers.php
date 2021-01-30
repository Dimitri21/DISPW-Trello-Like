<?php
/**
 * $app must exist where this one will be used
 */
$app->getRouter('/', 'home/home', 'accueil')
    ->getRouter('/connexion', 'home/login')
    ->getRouter('/inscription', 'home/signup')
    ->getRouter('/reinit_mot_de_passe', 'user/resetpassword')
    ->getRouter('/profil', 'user/profile')
    ->getRouter('/project', 'user/project')
    ->getRouter('/mentions-legales', 'home/mentions')
    ->getRouter('/conditions-generales-utilisation', 'home/cgu')
    ->getRouter('/politique-de-confidentialite', 'home/confidentialite')
    ->getRouter('/[*:slugger]-[i:id]', 'user/profile') //last one has error to fixe
    ->postRouter('/connexion', 'admin/login'); //last one has error to fixe
$app->start();

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
