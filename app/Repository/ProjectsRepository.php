<?php

namespace app\Repository;

use app\Repository;

class ProjectsRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from {$this->table} ORDER BY id DESC ");
    }

    public function findProject($user_id)
    {
        return $this->query("SELECT p.id,p.name, p.description, p.create_at, p.picture FROM  
        {$this->table} p INNER JOIN {$this->table} u ON p.users = u.id WHERE u.id = ? ORDER BY p.modified_at desc ", [$user_id], false);
    }
    public function findLastModified($user_id)
    {
        return $this->query("SELECT p.id,p.name, p.description, p.create_at, p.picture FROM  
        {$this->table} p INNER JOIN {$this->table} u ON p.users = u.id WHERE u.id = ? HAVING max(p.modified_at)", [$user_id], true);
    }
}
