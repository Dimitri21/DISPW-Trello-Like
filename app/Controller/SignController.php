<?php
namespace app\Controller;

use app\App;

class SignController extends AppController
{
    public function __construct()
    {
        $this->loadModel('Users','sprinto');
    }

    public function login() {
        $login_info = $_REQUEST;
        if (isset($_REQUEST['email']) && !empty($_REQUEST['email'])) {
            $email      = htmlspecialchars($_REQUEST['email']);
            $password   = htmlspecialchars($_REQUEST['password']);

            //clean up array
            $user = $this->Users->findByArray(['email'=>$email]);
            if ($user && $user->getPassword() === sha1($password) ) {
                $user->setPassword('');
                $_SESSION['auth'] = true;
                $_SESSION['user'] = serialize($user);
                $this->render('admin.profile',compact('user'));
                exit();
            }
        }
        header('Location:/connexion');
        exit();
    }
}

/**
unset($login_info['path']);
unset($login_info['remember-me']);
unset($login_info['submit']);
 */
