<?php
namespace Core\Entity;
/**
 * Created by PhpStorm.
 * User: algo
 * Date: 13/07/18
 * Time: 15:08
 */

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