<?php

use App\Controller\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        var_dump("controler");
        $this->template = "template";
        $this->viewPath = "app".DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR;
    }

    public function index() {
        $title = "Home";
        return $this->render("template.index",['title']);
    }

    public function login() {
        var_dump("controler");
        $title = "Home";
        require "../app/Views/home/login.php";
    }

}