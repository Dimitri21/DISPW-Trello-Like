<?php
namespace App\Controller;
use App;
use Core\HTML\BootstrapForm;
use Core\Auth\DatabaseAuth;

class UsersController extends \App\Controller\AppController
{
    private $db_name = 'sprinto';

    /**
     *
     */
    public function login()
    {
        //Vérification de l'existance de $_POST dans le système
        $login_error="";

        if(isset($_POST) && !empty($_POST))
        {
            $auth = new DatabaseAuth(App::getInstance()->getDatabase($this->db_name));
            if($auth->login($_POST['email'],$_POST['motdepass']))
            {
                //rediricte to the right page
                //header('Location:index.php?p=admin.entityName.index');
            }else
            {
                $login_error = "<div class=\"alert alert-danger\">Identifiants incorrect</div>";
            }

        }elseif (isset($_SESSION) && !empty($_SESSION))
        {
            //Relogin with SESSION coordinations
            //header('Location:index.php?p=admin.tutoriels.index');
        }
        $form = new BootstrapForm($_POST);
        //Regirite to login page with error message
        $this->render('users.login',compact('login_error','form'));

    }

    /**
     * @resume fonction qui fait simplement le logout d'un user
     */
    public function logout()
    {

        session_destroy();
        header('Location:index.php');

    }

}