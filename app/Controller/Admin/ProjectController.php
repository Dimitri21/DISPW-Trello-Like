<?php


namespace app\Controller\Admin;


class ProjectController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Project", 'sprinto');
        $this->loadModel("Users", 'sprinto');
        $this->loadModel("Lists", 'sprinto');
        $this->loadModel("Tasks", 'sprinto');
    }

    public function index() {
        $user = unserialize($_SESSION['user']);
        $projects = $this->Project->findProject($user->getId());
        $updated_project = $this->Project->findLastModified($user->getId());
        $this->render("admin.project.index",compact("projects","updated_project"));
    }

    public function show() {
        $project = $this->Project->find($_GET['id']);
        $lists = $this->Lists->findList($project->getId());
        foreach ($lists as $list) {
          
            $list->setTasks($this->Tasks->findTask($list->getId()));
            /* TODO chercher le lead de chaque tâche
            $list->setLead($this->Users->find($list->getLead()));
            */

        }
       
        $this->render("admin.project.show", compact('project', 'lists'));
    }
}