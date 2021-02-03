<?php

namespace app;
use app\Database\SprintoDatabase;

class App
{
    private static $_instance;
    public $titre = 'Sprinto';
    public $db_instance;
    public $db_name;
    private $configPage = "sprinto";
    private $settings = [];

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getRepository($name)
    {
        $class_name = '\\app\\Repository\\' . ucfirst($name) . 'Repository';
        return new $class_name($this->getDatabase($this->configPage));
    }

    public function getDatabase($file_db_name = null)
    {
        if (is_null($file_db_name)) {
            $this->settings = require(_ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'sprinto.php');
        } else {
            $this->settings = require(_ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR . $file_db_name . '.php');
        }
        if ($this->db_instance === null) {
            $this->db_instance = new SprintoDatabase($this->settings);
        }

        $this->db_name = $this->get("db_name");
        return $this->db_instance;
    }

    /**
     * Mise en place de autoloader fait maison
     */
    public function start()
    {
        session_start();
        require_once _ROOT.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
    }

    /**
     * @brief allow to get value from config array
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        if(!isset($this->settings[$key]))
        {
            return null;
        }

        return $this->settings[$key];
    }

    /**
     * @brief getting DAtabase config infos
     * @return array
     */
    public function getSetting()
    {
        return $this->settings;
    }

}
