<?php

namespace app\Controller;

use app\Database\SprintoDatabase;

class AuthController extends AppController
{
    private $db;
    /**
     * DatabaseAuth constructor.
     * @param SprintoDatabase $getDatabase
     */
    public function __construct(SprintoDatabase $getDatabase)
    {
        $this->db = $getDatabase;
        $this->loadModel('Users','sprinto');
    }

    public function login($email, $password) {

        $user = $this->Users->findBy($email);
        if ($user->getPassword() === $password) {
            $_SESSION['user'] = 1;
        }else {
            $user = null;
        }
        return $user;
    }

    /**
     * @brief
     * @route "/deconnexion"
     */
    public function logout() {

        session_unset();
        session_destroy();
        return $this->render("home.home");
    }
    /**
     * @brief Vérification if user is logged in
     */
    public function isLogged() {
        return $_SESSION['user']?? null;
    }
}