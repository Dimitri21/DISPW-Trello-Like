<?php

namespace app\Repository;

use app\Repository;

class StickersRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from {$this->table}");
    }

    public function findList($projectId)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE project = ? ORDER  BY orders ASC ", [$projectId], false);
    }

   public function find($sticker_id) {
       return $this->query("SELECT * FROM {$this->table} WHERE id = ? ", [$sticker_id], true);
   }
}
