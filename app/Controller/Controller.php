<?php

namespace App\Controller;

class Controller
{
    public function __construct()
    {
        //Check is is log in

    }

    public function loadModel(string $modelName) {
        $model = ucfirst($modelName).'Entity';
        require_once(_ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Entity'.DIRECTORY_SEPARATOR.$model.'.php');
        $this->$modelName = new $model();
    }

    protected function render(string $view, array  $variables = [])
    {
        ob_start();
        extract($variables);
        $viewsPath      = _ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR;
        $current_view   = $viewsPath.str_replace('.',DIRECTORY_SEPARATOR,$view).'.php';
        require $current_view;
        $content        = ob_get_clean();
        require_once($viewsPath.'template'.DIRECTORY_SEPARATOR.'base.php');
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        $message="Erreur de Module";
        $this->render('notfound.index',compact('message'));
        exit(0);
    }

    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        $message = "Page Not Found";
        $this->render('error.404',compact('message'));
        exit(0);
    }

}