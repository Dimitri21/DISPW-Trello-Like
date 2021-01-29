<?php
namespace App\Controller;


class Controller
{
    protected $viewPath;//../app/View/
    protected $template;//template

    protected function render($view,$variables = [])
    {
        ob_start();
        extract($variables);
        //template
        //$view = template.index => template/home.php
        //$view = ../app/View/template/home.php
        $view = $this->viewPath.str_replace('.','/',$view).'.php';

        require $view;
        $content = ob_get_clean();
        require($this->viewPath.'template/'.$this->template.'.php');
    }


    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('What!!!, accès interdit');

    }
    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}


