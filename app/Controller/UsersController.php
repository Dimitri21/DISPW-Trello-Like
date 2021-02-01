<?php

class UsersController extends Controller
{
    public function __construct()
    {
        $this->loadModel("Users");
    }

    public function index() {
        $users = $this->Users->all();
        $this->render("users.index",compact('users'));
    }

    public function edit($id) {
        $user = $this->Users->findBy($id);
        $this->render("users.edit",compact('user'));
    }

    public function show($id,$slug) {
        $user = $this->Users->findBy($id);
        $this->render("users.show",compact('user'));
    }

}