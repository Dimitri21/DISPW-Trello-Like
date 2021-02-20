<?php

namespace app\Repository;

use app\Repository;

class MembersRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from {$this->table}");
    }

   public function findBy($task_id) {
       return $this->query("SELECT * FROM {$this->table} WHERE task = ? ", [$task_id], false);
   }

    public function deleteMember($user_id,$project_id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE user = ? AND project= ?",[$user_id,$project_id],true);
    }

}
