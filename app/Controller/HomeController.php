<?php

namespace app\Controller;

use app\App;
use app\Entity\Projects;
use app\Entity\Users;

class HomeController extends AppController
{

    private $error_message = "";

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Users', 'sprinto');
        $this->loadModel('Projects', 'sprinto');
    }

    public function home()
    {
        $user = null;
        $message = $this->error_message;
        App::getInstance()->titre = "Accueil";
        $this->render("home.home", compact('user', 'message'));
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
                $this->render("admin.projects.index", compact('user','project'));
            }
        }
        $this->render("home.login");
    }

    public function inscription()
    {
        App::getInstance()->titre = "Inscription";
        $message = "Erreur lors de création de compte";
        $user = new  Users();
        if (isset($_POST) && !empty($_POST)) {
            $email      = $_POST['email'];
            $password   = $_POST['password'];
            $today      = date("Y-m-d H:i:s");

            $response = $this->Users->insert([
                "name"=>htmlentities($_POST['name']),
                "lastname"=>htmlentities($_POST['lastname']),
                "email "=>htmlentities($_POST['email']),
                "password"=>sha1(htmlentities($_POST['password'])),
                "subscriptionAt"=>$today,
                "picture"=>"photo_passe.jpg"
            ]);
            if ($response) {
                //TODO traite success message
                $project = [];
                $message = "Création de coompte avec succès";
                $this->redirect("/connexion");
            }
        }

        $this->render("home.signup", compact("user"));
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
        $this->render("home.mentionslegales");
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
        $projects = new Projects();
        $this->render("home.dashboard", compact('user','projects'));
    }

    public function error404()
    {
        $this->notFound();
    }

    public function contact() 
    {
        if(isset($_POST["submit"])) {
            $name = htmlentities($_POST["name"]);
            $email = htmlentities($_POST["email"]);
            $message = htmlentities($_POST["message"]);
            
            if (empty($name) or empty($email) or empty($message)) {
                $this->error_message = "Merci de compléter tous les champs requis";
                return $this->home();
            }

            // Send email

            $headers = 'FROM: ' . $email;

            mail('contact@trello.webo', 'Formulaire de contact de ' . $name, $message, $headers);
            return $this->home();
        }
    }
}
