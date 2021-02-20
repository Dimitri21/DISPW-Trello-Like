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

    public  function findMembers($project_id) {
        return $this->db->query("SELECT u.id, u.name, u.lastname, u.email, m.role ,m.project FROM {$this->table} u INNER JOIN members m ON u.id = m.user WHERE m.project = {$project_id}");
    }
}
