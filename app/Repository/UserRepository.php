<?php


namespace app\Repositories;


use app\Repository\Repository;

class UserRepository extends Repository
{
    public function findAll() {
        return $this->query("SELECT * from users");
    }
}