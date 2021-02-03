<?php

namespace app;

class Controller
{

    protected $viewsPath;
    protected $template;

    protected function render(string $view, array  $variables = [])
    {
        ob_start();
        extract($variables);
        $this->viewsPath= _ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR."Views".DIRECTORY_SEPARATOR;
        $current_view   = $this->viewsPath.str_replace('.',DIRECTORY_SEPARATOR,$view).'.php';
        require $current_view;
        $content        = ob_get_clean();
        require_once($this->viewsPath. 'template' . DIRECTORY_SEPARATOR . 'base.php');
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