<?php

namespace app\Controller\Admin;

use app\App;
use app\Controller;
use app\Security\AuthController;

class AppController extends Controller
{
    //Changed base page for admin side
    protected $template = "admin/base";

    public function __construct()
    {
        //TODO - Check is user is connected else send error or back to homepage
        //Authetification
        $app = App::getInstance();
        $auth = new AuthController($app->getDatabase());

        if(!$auth->isLogged())
        {
            return $this->render("home.login");
        }

        //TODO - add Admin keyword on the end of the next line
        $this->viewsPath = _ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR;
    }

    protected function loadModel(string $model_name,string $db_name)
    {
        //create attribute with $model_name name. eg : Users => $this->Users
        $this->$model_name = App::getInstance($db_name)->getRepository($model_name);
    }
}