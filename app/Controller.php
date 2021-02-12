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
        if (!file_exists($current_view)) {
            $this->notFound();
        }
        require $current_view;
        $content        = ob_get_clean();
        require_once($this->viewsPath. 'template' . DIRECTORY_SEPARATOR . $this->template.'.php');
    }

    protected function redirect(string $url)
    {
        header("location:{$url}");
        exit(0);
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        $message="Forbidden to access this page.";
        $this->render('error.404',compact('message'));
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