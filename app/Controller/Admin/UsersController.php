<?php

namespace app\Controller\Admin;


class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Users", 'sprinto');
    }

    public function edit()
    {
        $return_message = "";
        $class = "danger";
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
        $this->render("admin.users.profile", compact('user'));
    }

    public function delete() {

        //TODO - delete picture of this user is has one.
        $is_deleted = $this->Users->delete($this->user->getId());
        if ($is_deleted) {
            //TODO send message to tell user that the count will be deleted from 1 week
            $this->redirect("/auth-logout");
        }
    }
    public function upload() {
       if (isset($_FILES['uploadFile']) && !empty($_FILES['uploadFile'])) {
           //dir where picture will be store
           $profile_dir     = _ROOT.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR.
               "images".DIRECTORY_SEPARATOR."profile".DIRECTORY_SEPARATOR;
           $original_name   = basename($_FILES['uploadFile']['name']);
           $file_name       = $profile_dir.$original_name;
           $file_type       = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
           $file_size       = getimagesize($_FILES['uploadFile']['tmp_name']);
           $uploaded        = true;
            $message        = "";
           //check file type
           if ($file_type !== 'jpg' && $file_type !== 'png' && $file_type !== 'gif') {
               $uploaded = false;
               $message = "type non autorisé";
               var_dump($message);
           }

           //check if file exite
           if (file_exists($file_name)) {
               $uploaded = false;
               $message ="Fichier existe déjà";
               var_dump($message);
           }

           //check size
           if ($_FILES['uploadFile']['size'] > 500000) {
               $uploaded = false;
               $message ="image trop grande";
               var_dump($message);
           }
            //check if it can be uploaded
           if ($uploaded) {

                //move file
               if (move_uploaded_file($_FILES['uploadFile']["tmp_name"],$file_name)) {
                   $message = "Votre image a été bien uploadée";
                   var_dump($message);
               }else {
                   $message = "Erreur lors de chargement de votre image";
                   var_dump($message);
                   $uploaded = false;
               }

               //save image name on database
               if ($uploaded) {
                    //TODO after update image to the database, we have to delete the old image if existe
                   //TODO on the profile directory using the old name from the database
                   if ($this->Users->update($_SESSION['user'], ["picture"=>$original_name])) {
                        $message = "Modification de l'image avec succès";
                        var_dump($message);
                   }
               }
           }
       }
       //TODO - send message by session and update image on the navbar
       $this->redirect("/admin-users-profile");
    }

    public function show($id, $slug)
    {
        $user = $this->Users->findBy($id);
        $this->render("admin.users.show", compact('user'));
    }
}
