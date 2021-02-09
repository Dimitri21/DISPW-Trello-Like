<?php

namespace app\Controller;

use app\App;
use app\Entity\Project;
use app\Entity\Users;

class HomeController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Users', 'sprinto');
        $this->loadModel('Project', 'sprinto');
    }

    public function home()
    {
        $user = null;
        App::getInstance()->titre = "Accueil";
        $this->render("home.home", compact('user'));
    }

    public function connexion()
    {
        //TODO - check if user is connected

        App::getInstance()->titre = "Connexion";
        if (isset($_POST) && !empty($_POST)) {
            $auth       = new AuthController(App::getInstance()->getDatabase());
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            $user = $auth->login($email,$password);
            if ($user) {
                $project = [];
                $this->render("admin.project.index", compact('user','project'));
            }
        }
        $this->render("home.login");
    }

    public function inscription()
    {
        App::getInstance()->titre = "Inscription";
        $this->render("home.signup");
    }

    public function reinit_mot_de_passe()
    {
        App::getInstance()->titre = "reinit mot de passe";
        $this->render("admin.users.resetpassword");
    }

    public function politique_de_confidentialite()
    {
        App::getInstance()->titre = "politique de confidentialite";
        $this->render("home.confidentialite");
    }

    public function mentions_legales()
    {
        App::getInstance()->titre = "mentions legales";
        $this->render("home.mentions");
    }

    public function conditions_generales_utilisation()
    {
        App::getInstance()->titre = "conditions generales utilisation";
        $this->render("home.cgu");
    }

    public function dashboard()
    {
        App::getInstance()->titre = "Dashboard";
        $user = new Users();
        $projects = new Project();
        $this->render("home.dashboard", compact('user','projects'));
    }

    public function error404()
    {
        $this->notFound();
    }
}
