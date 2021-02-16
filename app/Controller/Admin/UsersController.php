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
        $is_deleted = $this->Users->delete($this->user->getId());
        if ($is_deleted) {
            //TODO send message to tell user that the count will be deleted from 1 week
            $this->redirect("/auth-logout");
        }
    }
    public function show($id, $slug)
    {
        $user = $this->Users->findBy($id);
        $this->render("admin.users.show", compact('user'));
    }
}
