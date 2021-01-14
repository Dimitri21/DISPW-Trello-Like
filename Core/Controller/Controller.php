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
        $message="FATAL ERROR 403";
        $this->render('notfound.index',compact('message'));
        exit(0);
    }
    
    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        $message="FATAL ERROR 404";
        $this->render('notfound.index',compact('message'));
        exit(0);
    }

}


