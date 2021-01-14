<?php 

use Core\Database\MysqlDatabase;
use Core\Config;

class App
{

    private static $_instance;
    public $titre = 'Home';
    public $db_instance;
    public $db_name;

    private $configPage="test"; //a GENERER AUTOMATIQUE page dans /Config/*.php

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
        return new $class_name($this->getDatabase($this->configPage));
    }

    public function getDatabase($file_db_name = null)
    {
        $config = '';
       if(is_null($file_db_name))
        {
            $config = Config::getInstance(ROOT.'/Config/'.$this->configPage.'.php');
        }else
        {
            $config = Config::getInstance(ROOT.'/Config/'.$file_db_name.'.php');
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
        require ROOT.'/App/Autoloader.php';
        \App\Autoloader::register();
        require ROOT.'/Core/Autoloader.php';
        Core\Autoloader::register();
    }

}


?>