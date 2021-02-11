<?php


namespace app\Controller\Admin;


class ProjectController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Project", 'sprinto');
        $this->loadModel("Users", 'sprinto');
        //$this->loadModel("List", 'sprinto');
    }

    public function index() {
        $user = unserialize($_SESSION['user']);
        $projects = $this->Project->findProject($user->getId());
        $updated_project = $this->Project->findLastModified($user->getId());
        $this->render("admin.project.index",compact("projects","updated_project"));
    }

    public function show() {
        $project = $this->Project->find($_GET['id']);
        //$lists =
        $this->render("admin.project.show", compact('project'));
    }
}