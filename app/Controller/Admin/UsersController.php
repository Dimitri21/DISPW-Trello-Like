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
                    $class = "success";
                }
            } else {

                $return_message = "Informations incorrectes";
            }
        }
        //TODO - to refactor
        $this->message['message']   = $return_message;
        $this->message['class']     = $class;
        $_SESSION['message'] = $this->message;
        $this->redirect("?path=admin-users-profile");
    }

    public function profile()
    {
        $message = [];
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        $user = $this->Users->find($_SESSION['user']);
        App::getInstance()->titre = "Profil de " . $this->user->getLastname();
        $this->render("admin.users.profile", compact('user', 'message'));
    }

    public function delete()
    {
        //Dir where picture are stored
        $profile_dir     = _ROOT . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR .
            "images" . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR;
        //Delete user'picture from disk
        if (file_exists($profile_dir . $this->user->getPicture())) {
            unlink($profile_dir . $this->user->getPicture());
        }

        $this->sendEmail(
            $this->user->getEmail(),
            $this->user->getName(),
            "alss-dipsw20-kdu@ccicampus.fr",
            "Suppression de compte",
            "Votre compte sera supprimer d'ici 5 jours. A bientôt!"
        );
        //check if delete came from current user
        if (isset($_GET['id']) && !empty($_GET['id']) && intval($_GET['id']) == $this->user->getId()) {
            $is_deleted = $this->Users->delete($this->user->getId());
            if ($is_deleted) {
                $this->redirect("?path=auth-logout");
            }
        }

        $this->redirect("?path=admin-users-profile");
    }

    /**
     * @brief it allows user to edit profile picture
     * and delete the old one
     */
    public function upload()
    {

        if (isset($_FILES['uploadFile']) && !empty($_FILES['uploadFile'])) {

            //dir where picture will be store
            $profile_dir     = _ROOT . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR .
                "images" . DIRECTORY_SEPARATOR . "profile" . DIRECTORY_SEPARATOR;
            $original_name   = basename($_FILES['uploadFile']['name']);
            $file_name       = $profile_dir . $original_name;
            $file_type       = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $uploaded        = true;
            $this->message['message']   = "";
            $this->message['class']     = "";

            //check file type
            if ($file_type !== 'jpg' && $file_type !== 'png' && $file_type !== 'gif') {
                $uploaded                   = false;
                $this->message['message']   = "type non autorisé";
                $this->message['class']     = "danger";
            }

            //check if file exite
            if (file_exists($file_name)) {
                $uploaded                   = false;
                $this->message['message']   = "Fichier existe déjà";
                $this->message['class']     = "danger";
            }

            //check size
            if ($_FILES['uploadFile']['size'] > 500000) {
                $uploaded                   = false;
                $this->message['message']   = "image trop grande";
                $this->message['class']     = "danger";
            }
            //check if it can be uploaded
            if ($uploaded) {

                //Delete the old picture if existe
                if (file_exists($profile_dir . $this->user->getPicture())) {

                    if (unlink($profile_dir . $this->user->getPicture())) {
                        $this->message['message']   = "Nous somme désolé pour cette action, veuillez tenter plus";
                        $this->message['class']     = "danger";
                    }
                }

                //move file
                if (move_uploaded_file($_FILES['uploadFile']["tmp_name"], $file_name)) {
                    $this->message['message']   = "Votre image a été bien uploadée";
                    $this->message['class']     = "success";
                } else {
                    $this->message['message']   = "Erreur lors de chargement de votre image";
                    $this->message['class']     = "danger";
                    $uploaded = false;
                }

                //save image name on database
                if ($uploaded) {
                    //TODO after update image to the database, we have to delete the old image if existe
                    //TODO on the profile directory using the old name from the database
                    if ($this->Users->update($_SESSION['user'], ["picture" => $original_name])) {
                        $this->message['message']   = "Modification de l'image avec succès";
                        $this->message['class']     = "success";
                        $this->user->setPicture($original_name);
                    }
                }
            }
        }
        $_SESSION['message'] = $this->message;
        $this->redirect('?path=admin-users-profile');
    }

    public function show($id)
    {
        $user = $this->Users->findBy($id);
        App::getInstance()->titre = "Profil de " . $user->getLastname();
        $this->render("admin.users.show", compact('user'));
    }
}
