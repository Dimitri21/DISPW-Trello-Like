<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class  HomeController extends  AppController
{
    private $db_name = '';

    public function  __construct()
    {
        parent::__construct();
        //Load elements to show on the home page
        // $this->loadModel('Tutoriel','tutofree_openclassroom');
        $this->db_name = App::getInstance()->db_name;
    }

    public function  home()
    {
        $variable = "rien du tout";
        $this->render('home.index', compact('variable'));
        //$this->render('modules.index',compact('modules','banners','math_et_matik','tutoriels','portofolios'));
    }

    public function  login()
    {
        $user = "rien du tout";
        $this->render('home.login', compact('user'));
        //$this->render('modules.index',compact('modules','banners','math_et_matik','tutoriels','portofolios'));
    }

    public function  signup()
    {
        $variable = "rien du tout";
        $this->render('home.signup', compact('variable'));
        //$this->render('modules.index',compact('modules','banners','math_et_matik','tutoriels','portofolios'));
    }

    public function  resetpassword()
    {
        $variable = "rien du tout";
        $this->render('home.resetpassword', compact('variable'));
        //$this->render('modules.index',compact('modules','banners','math_et_matik','tutoriels','portofolios'));
    }
}
