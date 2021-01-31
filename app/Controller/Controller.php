<?php


namespace app\Controller;


class Controller
{
    /**
     * @var string
     */
    protected $viewAbsPath;

    protected $template;

    //TODO TO delete
    protected function render($view,$variables = [])
    {

        ob_start();
        extract($variables);
        $view = $this->viewAbsPath.str_replace('.','/',$view).'.php';

        require $view;
        $content = ob_get_clean();
        require($this->viewAbsPath.'template/'.$this->template.'.php');
    }

    protected  function renderRouter() {

        $match = $this->altoRouter->match();
        $currentViewName =  $match['target'];
        $currentParams =  $match['params'];

        //TODO to move into App\Controller in the render method
        ob_start();
        //todo to delete soon
        //require_once $this->viewAbsPath."/{$match['target']}.php";

        if ($match) {
            if (is_callable($match['target'])) {
                //Call method with parames

                call_user_func_array($currentViewName, $currentParams);
            } else {
                //Static page
                require_once $this->viewAbsPath . "/{$match['target']}.php";
            }
            //extract($variables);
        } else {

            //Error
            require_once $error_404;
        }

        //File content
        $content = ob_get_clean();

        //Template
        require($template_path);

        return $this;
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