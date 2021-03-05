<?php

namespace app\Repository;

use app\Repository;

class CommentsRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from {$this->table}");
    }

   public function findBy($task_id) {
       return $this->query("SELECT * FROM {$this->table} WHERE task = ? ", [$task_id], false);
   }

}
