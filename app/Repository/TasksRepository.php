<?php

namespace app\Repository;

use app\Repository;

class TasksRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from {$this->table}");
    }

    public function findTask ($listId)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE lists = ?", [$listId],false);
    }
}
