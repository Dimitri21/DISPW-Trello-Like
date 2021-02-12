<?php

namespace app\Repository;

use app\Repository;

class ListsRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from {$this->table}");
    }

    public function findList($projectId)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE project = ?", [$projectId], false);
    }
}
