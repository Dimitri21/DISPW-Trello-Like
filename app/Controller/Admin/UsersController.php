<?php

namespace app\Controller\Admin;


use app\App;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Users");
    }

    public function edit()
    {
        $return_message = "";
        $class = "danger";
        App::getInstance()->titre = "Edition";

        //Checking POST Values
        if (isset($_POST) && !empty($_POST)) {
            if (
                isset($_POST['lastname']) && !empty($_POST['lastname']) &&
                isset($_POST['name']) && !empty($_POST['name']) &&
                isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['password']) && !empty($_POST['password']) &&
                $_POST['password'] === $_POST['password-conf']
            ) {
                $post_traited = $_POST;
                //Removing empty attribut
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        unset($post_traited[$key]);
                    }
                }
                //We don't need this field
                unset($post_traited['password-conf']);
                $post_traited['password'] = sha1($post_traited['password']);
                $is_updated = $this->Users->update($this->user->getId(), $post_traited);
                if ($is_updated) {
                    $return_message = "Modification avec succès";
                    $class= "success";
                }
            } else {

                $return_message = "Informations incorrectes";
            }
        }
        $user = $this->Users->find($_GET['id']);

        $this->render("admin.users.profile", compact('user', 'return_message', 'class'));
    }

    public function profile()
    {
        $user = $this->Users->find($_SESSION['user']);
        $message = $_SESSION['message']??'';
        $class = $_SESSION['class']??'';
        unset($_SESSION['message']);
        unset($_SESSION['class']);
        App::getInstance()->titre = "Profil de ".$this->user->getLastname();
        $this->render("admin.users.profile", compact('user', "message","class"));
    }

    public function delete() {

        //Dir where picture are stored
        $profile_dir     = _ROOT.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR.
                       "images".DIRECTORY_SEPARATOR."profile".DIRECTORY_SEPARATOR;
        //Delete user'picture from disk
        if (file_exists($profile_dir.$this->user->getPicture())) {
            unlink($profile_dir.$this->user->getPicture());
        }
        //TODO send message to tell user that the count will be deleted from 1 week
        $this->sendEmail($this->user->getEmail(),$this->user->getName(),
            "alss-dipsw20-kdu@ccicampus.fr","Suppression de compte", "Votre compte sera supprimer d'ici 5 jours. A bientôt!");
        $is_deleted = $this->Users->delete($this->user->getId());
        if ($is_deleted) {
            $this->redirect("/auth-logout");
        }
    }

    /**
     * @brief it allows user to edit profile picture
     * and delete the old one
     */
    public function upload() {
       if (isset($_FILES['uploadFile']) && !empty($_FILES['uploadFile'])) {

           //dir where picture will be store
           $profile_dir     = _ROOT.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR.
               "images".DIRECTORY_SEPARATOR."profile".DIRECTORY_SEPARATOR;
           $original_name   = basename($_FILES['uploadFile']['name']);
           $file_name       = $profile_dir.$original_name;
           $file_type       = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
           $uploaded        = true;
            $message        = "";
            $class          = "success";
           //check file type
           if ($file_type !== 'jpg' && $file_type !== 'png' && $file_type !== 'gif') {
               $uploaded    = false;
               $message     = "type non autorisé";
               $class       = "danger";
           }

           //check if file exite
           if (file_exists($file_name)) {
               $uploaded    = false;
               $message     ="Fichier existe déjà";
               $class       = "danger";
           }

           //check size
           if ($_FILES['uploadFile']['size'] > 500000) {
               $uploaded    = false;
               $message     ="image trop grande";
               $class       = "danger";
           }
            //check if it can be uploaded
           if ($uploaded) {

               //Delete the old picture if existe
               if (file_exists($profile_dir.$this->user->getPicture())) {
                    if(unlink($profile_dir.$this->user->getPicture())) {
                        $class      = "danger";
                        $message    = "Nous somme désolé pour cette action, veuillez tenter plus";
                    }
               }

                //move file
               if (move_uploaded_file($_FILES['uploadFile']["tmp_name"],$file_name)) {
                   $message = "Votre image a été bien uploadée";
               }else {
                   $class   = "danger";
                   $message = "Erreur lors de chargement de votre image";
                   $uploaded= false;
               }

               //save image name on database
               if ($uploaded) {
                    //TODO after update image to the database, we have to delete the old image if existe
                   //TODO on the profile directory using the old name from the database
                   if ($this->Users->update($_SESSION['user'], ["picture"=>$original_name])) {
                        $message = "Modification de l'image avec succès";
                   }
               }
           }
       }
       //TODO - send message by session and update image on the navbar
        $_SESSION['class']  = $class;
        $_SESSION['message']= $message;
       $this->redirect("/admin-users-profile");
    }

    public function show($id)
    {
        $user = $this->Users->findBy($id);
        App::getInstance()->titre = "Profil de ".$user->getLastname();
        $this->render("admin.users.show", compact('user'));
    }
}
