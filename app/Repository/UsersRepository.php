<?php

namespace app\Repository;

use app\Repository;

class UsersRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from users");
    }

    public function findBy($email)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE email = ? ",[$email],true);
    }
    public function findById($user_id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ? ",[$user_id],true);
    }
}
