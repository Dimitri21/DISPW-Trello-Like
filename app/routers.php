<?php
/**
 * $app must exist where this one will be used
 */
$app->getRouter('/user_[show|edit:action]_[i:id]', 'UserController')
    ->getRouter('/', 'home/home', 'accueil')
    ->getRouter('/connexion', 'home/login')
    ->getRouter('/inscription', 'home/signup')
    ->getRouter('/reinit_mot_de_passe', 'users/resetpassword')
    ->getRouter('/profil', 'users/profile')
    ->getRouter('/project', 'users/project')
    ->getRouter('/mentions-legales', 'home/mentions')
    ->getRouter('/conditions-generales-utilisation', 'home/cgu')
    ->getRouter('/politique-de-confidentialite', 'home/confidentialite')
//    ->getRouter('/[*:slugger]-[i:id]', 'users/profile') //last one has error to fixe
    ->postRouter('/connexion', 'admin/login'); //last one has error to fixe
$app->start();

//-----------------------------------------------
//DYNAMICS PAGES
//-----------------------------------------------
//$router->map('GET', '/[*:slugger]-[i:id]', function ($slugger, $id) {
//slugger and id must br used soon when we are going to make request to database
//    $users = new UsersEntity();
//    $users->setName("Jean")
//        ->setLastname("DOE")
//        ->setAvatar("https://source.unsplash.com/collection/190727/1600x900")
//        ->setEmail("admin@tft.fr")
//        ->setId(0)
//        ->getPassword("admin");
//    $path = "../app/Views/users/profile.php";
//    require_once $path;
//});
