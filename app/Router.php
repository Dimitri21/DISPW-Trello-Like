<?php


namespace app;


class Router
{
    private $altoRouter;

    private $viewAbsPath;

    public function __construct(string $viewAbsPath)
    {
        $this->viewAbsPath = $viewAbsPath;
        $this->altoRouter = new \AltoRouter();
    }

    public function getRouter(string $url, string $viewName, string $name = null):self
    {
        //formation de router
        $this->altoRouter->map("GET",$url,$viewName,$name);
        return $this;
    }
    public function postRouter(string $url, string $viewName, string $name = null):self
    {
        //formation de router
        $this->altoRouter->map("POST",$url,$viewName,$name);
        return $this;
    }


    public function start() {

        //Globals variables
        $error_404          = $this->viewAbsPath.DIRECTORY_SEPARATOR."home".DIRECTORY_SEPARATOR."404.php";
        $template_path      = $this->viewAbsPath.DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."base.php";
        $default_page_path  = $this->viewAbsPath.DIRECTORY_SEPARATOR."home".DIRECTORY_SEPARATOR."home.php";

        $match = $this->altoRouter->match();
        $currentViewName =  $match['target'];
        $currentParams=  $match['params'];
        ob_start();
        //todo to delete soon
        require_once $this->viewAbsPath."/{$match['target']}.php";

//        if ($match) {
//            if (is_callable($match['target'])) {
//                //Call method with parames
//
//                call_user_func_array($currentViewName,$currentParams);
//            } else {
//                //Static page
//                require_once $this->viewAbsPath."/{$match['target']}.php";
//            }
//            //extract($variables);
//        } else {
//
//            //Error
//            //require_once $error_404;
//        }

        //File content
        $content = ob_get_clean();

        //Template
        require($template_path);

        return $this;
    }
}