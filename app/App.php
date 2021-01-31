<?php


namespace app;


use app\Controller\UserController;
use app\Database\SprintoDatabase;

class App
{
    /**
     * @var App
     */
    private static $_instance;
    /**
     * @var \AltoRouter
     */
    private $altoRouter;
    /**
     * @var string
     */
    private $viewAbsPath;

    /**
     * @var array for Database infos
     */
    private $DBconfig = [];

    /**
     * @var Database name
     */
    public $db_name;

    /**
     * @var SprintoDatabase Instance
     */
    private $_dbInstance;

    /**
     * singleton
     * @return App
     */
    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * @param string $viewAbsPath : absolute path for views directory
     * @return $this
     */
    public function setViewAbsPath(string $viewAbsPath):self
    {
        $this->viewAbsPath = $viewAbsPath;
        $this->altoRouter = new \AltoRouter();
        return $this;
    }

    /**
     * @param string $url
     * @param string $viewName
     * @param string|null $name
     * @return $this
     * @throws \Exception
     * @brief method to set GET router
     */
    public function getRouter(string $url, string $viewName, string $name = null): self
    {
        //Traitement de $uri
        $url_exploded = explode("-",$url);
        if (count($url_exploded) === 3) {
            $this->altoRouter->map("GET", $url, function ($action,$id) {
                return "Salut";
            } ,$viewName);
        }else {
            $this->altoRouter->map("GET", $url, $viewName, $name);
        }
        return $this;
    }

    /**
     * @param string $url
     * @param string $viewName
     * @param string|null $name
     * @return $this
     * @throws \Exception
     * @bried method to set POST router
     */
    public function postRouter(string $url, string $viewName, string $name = null): self
    {
        $this->altoRouter->map("POST", $url, $viewName, $name);
        return $this;
    }

    /**
     * @param string $fileName where are database info to connect into
     */
    public function setDBInfos(string $fileName)
    {
        $this->DBconfig = require($fileName);
    }

    /**
     * @brief return database instance
     * @return SprintoDatabase
     */
    public function getDatabase() {
        $db = null;
        if (is_null($this->_dbInstance) && $this->DBconfig) {
            $this->_dbInstance = new SprintoDatabase($this->DBconfig);
        }
        //Share database name
        $this->db_name = $this->DBconfig['db_name'];
        return $this->_dbInstance;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getRepository($name)
    {
        $class_name = '\\App\\Repository\\' . ucfirst($name) . 'Repository';
        return new $class_name($this->getDatabase());
    }

    /**
     * @brief start function
     * @return $this
     */
    public function start()
    {
        //session_start();
        //Globals variables
        $error_404          = $this->viewAbsPath . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "404.php";
        $template_path      = $this->viewAbsPath . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "base.php";
        $default_page_path  = $this->viewAbsPath . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "home.php";

        $match = $this->altoRouter->match();
        $currentViewName =  $match['target'];
        $currentParams =  $match['params'];
        $something= "";
        //TODO to move into App\Controller in the render method
        ob_start();
        //todo to delete soon
        //require_once $this->viewAbsPath."/{$match['target']}.php";

        if ($match) {
            if (is_callable($match['target'])) {
                //Call method with parames
                //Controller
                if (count($currentParams) === 2 && array_key_exists("name",$match)) {
                    $action = $currentParams['action'];
                    $id = intval($currentParams["id"]);
                    $controllerNameShort = $match['name'];
                    require_once _ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Controller'.
                        DIRECTORY_SEPARATOR.$match['name'].'.php';
                    $controllerName = 'app'.DIRECTORY_SEPARATOR.'Controller'.
                        DIRECTORY_SEPARATOR.$match['name'];//controller
                    try {
                        $controller = new $controllerName();
                        if (method_exists($controller, $action)) {
                            $instances = $controller->$action($id);
                            require_once $this->viewAbsPath.DIRECTORY_SEPARATOR.strtolower(explode("Controller",$controllerNameShort)[0]).DIRECTORY_SEPARATOR.$action.'.php';
                        } else {
                            exit(0);
                        }
                    } catch (Exception $e) {
                        //header('Location:index.php?p=notFound');//Traitement de page NOTFOUND
                        die("Hahahahahha Bien essayé!!! : " . $e->getMessage());
                    }
                }
                $something = call_user_func_array($currentViewName, $currentParams);
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

}