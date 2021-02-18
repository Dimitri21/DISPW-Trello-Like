<?php

namespace app\Controller;

use app\App;
use app\Controller;

class AppController extends Controller
{
    protected $template = "base";

    public function __construct()
    {
        //TODO - vérification de authentification de utilisateur
        $this->viewsPath = _ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR;
        if (empty(App::getInstance()->picture) && isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $this->loadModel("Users","sprinto");
            $user = $this->Users->find($_SESSION['user']);
            App::getInstance()->picture = $user->getPicture();
        }
    }

    protected function loadModel(string $model_name, string $db_name)
    {
        //create attribute with $model_name name. eg : Users => $this->Users
        $this->$model_name = App::getInstance($db_name)->getRepository($model_name);
    }
}
