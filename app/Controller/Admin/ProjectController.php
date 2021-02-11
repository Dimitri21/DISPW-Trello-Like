<?php


namespace app\Controller\Admin;


class ProjectController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $project = [];
        $this->render("admin.project.index",compact("project"));
    }
}