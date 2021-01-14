<?php 

use Core\Database\MysqlDatabase;
use Core\Config;

class App
{

    private static $_instance;
    public $titre = 'Sprinto';
    public $db_instance;
    public $db_name;


    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    public function getTable($name)
    {
        $class_name = '\\App\\Table\\'.ucfirst($name).'Table';
        return new $class_name($this->getDatabase("sprinto"));
    }

    public function getDatabase($file_db_name = null)
    {
        $config = '';
       if(is_null($file_db_name))
        {
            $config = Config::getInstance(ROOT.'/config/sprinto.php');
        }else
        {
            $config = Config::getInstance(ROOT.'/config/'.$file_db_name.'.php');
        }
        if($this->db_instance === null)
        {
            $this->db_instance= new MysqlDatabase($config->getSetting());
        }

        $this->db_name =$config->get("db_name");
        return $this->db_instance;
    }

    public static function load()
    {
        session_start();
        require ROOT.'/app/Autoloader.php';
        \App\Autoloader::register();
        require ROOT.'/core/Autoloader.php';
        Core\Autoloader::register();
    }

}


?>