<?php

namespace app\Repository;

use app\Repository;

class TasksRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from {$this->table} ORDER BY orders ASC ");
    }

    public function findTask ($listId)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE lists = ? ORDER BY orders ASC ", [$listId],false);
    }

    public function findTasksNbrs ($listId)
    {
        return $this->query("SELECT COUNT(id) tasks FROM {$this->table} WHERE lists = ?", [$listId]);
    }
}
