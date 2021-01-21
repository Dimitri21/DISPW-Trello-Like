<?php
namespace Core\Controller;


class Controller
{
    protected $viewPath;
    protected $template;

    protected function render($view,$variables = [])
    {
        ob_start();
        extract($variables);
        $view = $this->viewPath.str_replace('.','/',$view).'.php';

        require $view;
        $content = ob_get_clean();
        require($this->viewPath.'templates/'.$this->template.'.php');
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


