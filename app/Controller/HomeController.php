<?php
namespace app\Controller;

use app\App;

class HomeController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home() {
        $user = null;
        App::getInstance()->titre = "Accueil";
        $this->render("home.home", compact('user'));
    }

    public function connexion() {
        App::getInstance()->titre = "Connexion";
        $this->render("home.login");
    }

    public function inscription() {
        App::getInstance()->titre = "Inscription";
        $this->render("home.signup");
    }

    public function reinit_mot_de_passe() {
        App::getInstance()->titre = "reinit mot de passe";
        $this->render("admin.users.resetpassword");
    }
    public function politique_de_confidentialite() {
        App::getInstance()->titre = "politique de confidentialite";
        $this->render("home.confidentialite");
    }
    public function mentions_legales() {
        App::getInstance()->titre = "mentions legales";
        $this->render("home.mentions");
    }
    public function conditions_generales_utilisation() {
        App::getInstance()->titre = "conditions generales utilisation";
        $this->render("home.cgu");
    }
    public function dashboard() {
        App::getInstance()->titre = "Dashboard";
        $this->render("home.dashboard");
    }

    public function error404() {
        $this->notFound();
    }

}