<?php

namespace app\Repository;

use app\Repository;

class UsersRepository extends Repository
{
    public function findAll() {
        return $this->query("SELECT * from users");
    }
}
