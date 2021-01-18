<?php

namespace App\Controller;
use Core\Controller\Controller;
use \App;


class  HomeController extends  AppController
{
    private $db_name ='';

    public function  __construct()
    {
        parent::__construct();
        //Load elements to show on the home page
       // $this->loadModel('Tutoriel','tutofree_openclassroom');
        $this->db_name = App::getInstance()->db_name;
    }

    public function  index()
    {
        $this->render('home.index',compact('[]'));
        //$this->render('modules.index',compact('modules','banners','math_et_matik','tutoriels','portofolios'));
    }

}
