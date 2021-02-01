<?php

class HomeController extends Controller
{
    public function __construct()
    {
        $this->loadModel("Users");
    }

    public function home() {
        $this->render("home.home");
    }

    public function connexion() {
        $this->render("home.login");
    }

    public function error404() {
        $this->notFound();
    }

}