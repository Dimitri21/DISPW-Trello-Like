<?php

namespace app\Controller\Admin;


class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Users", 'sprinto');
    }

    public function index()
    {
        $users = $this->Users->all();
        $this->render("admin.users.index", compact('users'));
    }

    public function edit()
    {
        //Getting id on GET variable

        //Removing empty attribut
        if (isset($_POST) && !empty($_POST)) {
            $post_traited = $_POST;
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    unset($post_traited[$key]);
                }
            }
            //We don't need this field
            unset($post_traited['password-conf']);
            $this->Users->update($_GET['id'], $post_traited);
        }
        $user = $this->Users->find($_GET['id']);

        $this->render("admin.users.edit", compact('user'));
    }

    public function show($id, $slug)
    {
        $user = $this->Users->findBy($id);
        $this->render("admin.users.show", compact('user'));
    }
}
