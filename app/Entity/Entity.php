<?php

abstract class Entity
{
    /**
     * @brief array where are database info
     * @var array
     */
    protected $config = [];

    protected $db;

    protected $tableName;

    /**
     * @param $key
     * @return mixed|string
     */
    public function get($key)
    {
        return isset($this->config[$key]) ? $this->config[$key] : "";
    }


    public function getDatabase() {
        if (!$this->config) {
            $this->config = require(_ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'sprintoConfig.php');
        }

        if (is_null($this->db)) {
            $this->db = new \SprintoDatabase($this->config);
        }
        return $this->db;
    }

    public  function all() {
        $sql = "SELECT * from {$this->tableName}";
        return $this->db->query($sql, ucfirst($this->tableName).'Entity',false);
    }

    public  function findBy($id) {
        $sql = "SELECT * from {$this->tableName} WHERE id = {$id}";
        return $this->db->query($sql, ucfirst($this->tableName).'Entity',true);
    }
}