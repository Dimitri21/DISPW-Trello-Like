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
        return $this->query("SELECT id, name, description, create_at, picture FROM  
        {$this->table} WHERE users  = ? ORDER BY modified_at desc ", [$user_id], false);
    }
    public function findLastModified($user_id)
    {
        return $this->query("SELECT p.id,p.name, p.description, p.create_at, p.picture FROM  
        {$this->table} p INNER JOIN users u ON p.users = u.id WHERE u.id = ? HAVING max(p.modified_at)", [$user_id], true);
    }

    /**
     * @brief projects who user is member
     * @param $user_id
     * @return mixed
     */
    public function findProjectLikeMember($user_id)
    {
        return $this->query("SELECT p.id, name, p.description, p.create_at, p.picture 
        FROM  members m 
        INNER JOIN {$this->table} p 
        ON m.project = p.id 
        WHERE m.user  = ? ORDER BY modified_at desc ", [$user_id], false);
    }


}
