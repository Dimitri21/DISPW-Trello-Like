<?php

namespace app\Repository;

use app\Repository;

class ProjectRepository extends Repository
{
    public function findAll()
    {
        return $this->query("SELECT * from project");
    }

    public function findProject()
    {
        $idUser = $_SESSION['auth'] ?? 0;
        $sql = "SELECT * from project WHERE id_users = ?";
        $this->query($sql, ['id' => $idUser]);
    }
}
