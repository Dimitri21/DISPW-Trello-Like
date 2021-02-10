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
        $user       = $this->Users->findBy($email);
        $login_info = $_REQUEST;

        if (isset($_REQUEST['email']) && !empty($_REQUEST['email'])) {
            $email      = htmlspecialchars($_REQUEST['email']);
            $password   = htmlspecialchars($_REQUEST['password']);
            //clean up array
            $user       = $this->Users->findBy($email);

            if ($user && $user->getPassword() === sha1($password) ) {
                $user->setPassword('');
                $_SESSION['auth'] = true;
                $_SESSION['user'] = serialize($user);
                $this->render('admin.project.index',compact('user'));
            }
        }
        $message = "Email ou mot de passe incorrect";
        $this->render('home.login',compact('message'));
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