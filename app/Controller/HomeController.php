<?php

use App\Controller\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Users");
    }

    public function home() {
        $user = null;
        if(isset($_SESSION['auth'])) {
            $user = unserialize($_SESSION['user']);
        }
        $this->render("home.home", compact('user'));
    }

    public function connexion() {
        $this->render("home.login");
    }
    public function inscription() {
        $this->render("home.signup");
    }

    public function error404() {
        $this->notFound();
    }

}