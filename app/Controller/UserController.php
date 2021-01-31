<?php


namespace app\Controller;

require_once "../vendor/autoload.php";

use App\Entity\User;

class UserController extends  Controller
{
    public function __construct()
    {

    }

    public function show(int $id) {
        $user = [];
        return compact('user');
    }
    public function edit(int $id) {
        $user = [];
        return compact('user');
    }
};