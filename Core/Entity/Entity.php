<?php
namespace Core\Entity;

class Entity
{

    /**
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