<?php

namespace app\Controller;

use app\Database\SprintoDatabase;
use app\Entity\Users;

class AuthController extends AppController
{
    private $db;
    /**
     * DatabaseAuth constructor.
     * @param SprintoDatabase $getDatabase
     */
    public function __construct(SprintoDatabase $getDatabase = null)
    {
        $this->db = $getDatabase;
        $this->loadModel('Users');
    }

    public function login($email, $password)
    {
        //Search email on database
        $user       = $this->Users->findBy($email);
        if ($user) {
            $user       = $this->Users->findBy($email);
            if ($user && $user->getPassword() === sha1($password)) {
                $_SESSION['auth'] = true;
                $_SESSION['user'] = $user->getId();
                return true;
            }
        }
        return false;
    }

    /**
     * @brief
     * @route "/auth-logout"
     */
    public function logout()
    {
        session_unset();
        session_destroy();
        return $this->render("home.home");
    }
    /**
     * @brief Vérification if user is logged in
     */
    public function isLogged()
    {
        return $_SESSION['auth'] ?? null;
    }
}
