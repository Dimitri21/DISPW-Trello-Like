<?php

namespace App\Controller;
use Core\Controller\Controller;

class  AppController extends  Controller
{
    //template page
    protected $template = "default";

    public function  __construct()
    {
        $this->viewPath = ROOT.'/app/Views/';
    }

    /**
     * @param $model_name = name of table
     * @param $db_name = name of database
     * @resume : Fonction qui prend en paramètre 2 arguments puis renvoit une table '$model_name' dans
     * la base de données '$db_name'
     */
    protected function loadModel($model_name,$db_name)
    {
        $this->$model_name = \App::getInstance($db_name)->getTable($model_name);
    }

}

?>