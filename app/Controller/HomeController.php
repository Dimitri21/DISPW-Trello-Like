<?php

namespace app\Controller;

use app\App;
use app\Entity\Projects;
use app\Entity\Users;

class HomeController extends AppController
{
    private $error_message = "";

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Users', 'sprinto');
        $this->loadModel('Projects', 'sprinto');
    }

    public function home()
    {
        $user       = null;
        $message    = $this->error_message;
        App::getInstance()->titre = "Accueil";
        $this->render("home.home", compact('user', 'message'));
    }

    /**
     * @brief function connection
     */
    public function connexion()
    {
        App::getInstance()->titre = "Connexion";
        $message ="";
        //check if user is already connected
        if (isset($_SESSION['auth']) && !empty($_SESSION['auth'])) {
            $this->redirect("/admin-projects-index");
        }
        if (isset($_POST) && !empty($_POST)) {
            $auth       = new AuthController(App::getInstance()->getDatabase());
            $email      = htmlentities($_POST['email']);
            $password   = htmlentities($_POST['password']);
            if ($auth->login($email,$password)) {
                $this->redirect("/admin-projects-index");
            }
            $message = "Email ou mot de passe incorrect";
        }

        $this->render("home.login", compact("message"));
    }

    public function inscription()
    {
        App::getInstance()->titre = "Inscription";
        $message = "";
        $user = new  Users();
        if (isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['name']) && !empty($_POST['name']) &&
            isset($_POST['lastname']) && !empty($_POST['lastname']) &&
            isset($_POST['password']) && !empty($_POST['password']) &&
            isset($_POST['password-conf']) && !empty($_POST['password-conf']
            )
        ) {
            $user->setEmail($_POST['email'])
                ->setPassword(sha1(htmlentities($_POST['password'])))
                ->setName(htmlentities($_POST['name']))
                ->setLastname(htmlentities($_POST['lastname']));
            $today      = date("Y-m-d H:i:s");

            if ($_POST['password'] !== $_POST['password-conf']) {
                $message = "Mots de passe sont differents";
            }else {
                try {
                    $response = $this->Users->insert([
                        "name"=>$user->getName(),
                        "lastname"=>$user->getLastname(),
                        "email "=>$user->getEmail(),
                        "password"=>$user->getPassword(),
                        "subscriptionAt"=>$today
                    ]);
                    //TODO traite success message
                    $_SESSION['message'] = "Création de compte avec succès";
                    $this->redirect("/connexion");

                }catch (\Exception $e) {
                    $message = "Cet email existe déjà, veuillez en un autre";
                }
            }
        }

        $this->render("home.signup", compact("user","message"));
    }

    public function reinit_mot_de_passe()
    {
        //TODO to verifie on host online
        $message = "";
        $id = $_GET['id'];
        $user = null;
        if ($id) {
            $user = $this->Users->find($id);
        }else {
            $message = "Vous éssayez de violer la privacité";
        }

        if ( $user &&
            isset($_POST['password'])&&
            !empty($_POST['password']) &&
            isset($_POST['password-conf']) &&
            !empty($_POST['password-conf']) &&
            $_POST['password'] === $_POST['password-conf'] )
        {
            $password = htmlentities($_POST['password']);
            $is_updated = $this->Users->update($user->getId(),[
                "password" =>sha1($password)
            ]);
            if ($is_updated) {
                $_SESSION['message'] = "Reinitialisation de mot de passe avec succès";
                $this->redirect("/connexion");
            }
            $message = "Veuillez tenter plus plutard";
        }

        App::getInstance()->titre = "reinit mot de passe";
        $this->render("admin.users.resetpassword", compact('message','id'));
    }

    public function forgotpassword()
    {
        App::getInstance()->titre = "reinit mot de passe";
        $message = "";
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = htmlentities($_POST['email']);
            $user = $this->Users->findBy($email);
            //TODO - send email to this user to reset his/her password
            //url = /home-resetpassword&id=number

            $message = "Vous récéverez un email de confirmation";
        }

        $this->render("home.forgotpassword", compact('message'));
    }

    public function politique_de_confidentialite()
    {
        App::getInstance()->titre = "politique de confidentialite";
        $this->render("home.confidentialite");
    }

    public function mentions_legales()
    {
        App::getInstance()->titre = "mentions legales";
        $this->render("home.mentionslegales");
    }

    public function conditions_generales_utilisation()
    {
        App::getInstance()->titre = "conditions generales utilisation";
        $this->render("home.cgu");
    }

    public function dashboard()
    {
        App::getInstance()->titre = "Dashboard";
        $user = new Users();
        $projects = new Projects();
        $this->render("home.dashboard", compact('user','projects'));
    }

    public function error404()
    {
        $this->notFound();
    }

    public function contact() 
    {
        $response = null;

        if(isset($_POST["name"])) {
            $name = htmlentities($_POST["name"]);
            $email = htmlentities($_POST["email"]);
            $message = htmlentities($_POST["message"]);
            
            if (empty($name) or empty($email) or empty($message)) {
                $this->error_message = "Merci de compléter tous les champs requis";
            }

            // Send email

            $headers = 'FROM: ' . $email;

            try {
                mail('contact@trello.webo', 'Formulaire de contact de ' . $name, $message, $headers);
                $response["status"] = "success";
                $response["message"] = "Nous vous remercions pour votre message";

            } catch (Exception $e) {
                $response["status"] = "error";
                $response["message"] = "Merci de compléter tous les champs requis";
            }
           
    
        }

        echo json_encode($response);
    }
}
