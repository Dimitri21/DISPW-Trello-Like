<?php


namespace app\Controller;


use app\App;

class HomeController extends AppController
{
    private $db_name;
    public function __construct()
    {
        parent::__construct();
        $this->db_name = App::getInstance()->db_name;
        $this->includeModel('User',$this->db_name);
    }

    public function home() {
        $users = $this->User->all();
        $this->render("home.home", compact('users'));
    }
}