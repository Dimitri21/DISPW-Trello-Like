<?php


namespace app\Controller;


class Controller
{
    /**
     * @var string
     */
    protected $viewAbsPath;

    protected $template;

    protected function render($view,$variables = [])
    {
        ob_start();
        extract($variables);
        $view = $this->viewAbsPath.str_replace('.','/',$view).'.php';

        require $view;
        $content = ob_get_clean();
        require($this->viewAbsPath.'template/'.$this->template.'.php');
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
        $message="Erreur de Module";
        $this->render('notfound.index',compact('message'));
        exit(0);
    }

}