<?php

namespace app;

class Entity
{
    protected $tableName;
    /**
     * @brief allowes us to call method as attribut $user->name instead $user->getName()
     * @param $key
     * @return mixed
     */
    public function  __get($key)
    {
        $method = 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

}