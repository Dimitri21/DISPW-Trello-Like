<?php


namespace app\Controller;


use app\App;

class AppController extends Controller
{
    public function __construct()
    {
        $this->template = "base";
        $this->viewAbsPath = _ROOT.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR.'Views';
    }

    /**
     * @param string $model_name or Entity Name
     * @param string $db_name
     */
    protected function includeModel(string  $model_name, string $db_name)
    {
        $this->$model_name = App::getInstance()->getRepository($db_name);
    }
}