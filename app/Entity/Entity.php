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

    /**
     * @brief having Database instance
     * @return SprintoDatabase
     */
    public function getDatabase() {
        if (!$this->config) {
            $this->config = require(_ROOT . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'sprinto.php');
        }

        if (is_null($this->db)) {
            $this->db = new \SprintoDatabase($this->config);
        }
        return $this->db;
    }

    /**
     * @biref finding all table' elements
     * @return mixed
     */
    public  function all() {
        $sql = "SELECT * from {$this->tableName}";
        return $this->db->query($sql, ucfirst($this->tableName).'Entity',false);
    }

    /**
     * @brief finding element by ID
     * @param $id
     * @return mixed
     */
    public  function findBy($id) {
        $sql = "SELECT * from {$this->tableName} WHERE id = {$id}";
        return $this->db->query($sql, ucfirst($this->tableName).'Entity',true);
    }

    /**
     * @param array $params => [key=>value], juste one value
     * @return mixed
     */
    public function findByArray(array $params) {
        $key    = array_key_first($params);
        $value  = $params[$key];
        $sql    = "SELECT * from {$this->tableName} WHERE {$key} = '{$value}'";
        return $this->db->query($sql, ucfirst($this->tableName).'Entity',true);
    }

    /**
     * @param array $params
     * @return mixed
     * @brief  to use for delete and update,delete and using prepare statement
     */
    public function findByArraydfsdfqsdf(array $params) {
        $attributs_key    = [];
        $attributs_value  = [];
        foreach ($params as $key => $value) {
            $params_keys[]      = "$key = ?";
            $params_values[]    = $value;
        }
        $sql_part   = implode(',',$params_keys);
        $sql        = "SELECT * from $this->tableName WHERE $sql_part";
        return $this->db->prepare($sql, $params_values, ucfirst($this->tableName).'Entity',true);
    }

}