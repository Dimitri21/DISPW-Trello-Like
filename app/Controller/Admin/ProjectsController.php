<?php


namespace app\Controller\Admin;


use app\Entity\Projects;

class ProjectsController extends AppController
{

    private $user = null;
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Projects", 'sprinto');
        $this->loadModel("Users", 'sprinto');
        $this->loadModel("Lists", 'sprinto');
        $this->loadModel("Tasks", 'sprinto');
        $this->user = unserialize($_SESSION['user']);
    }

    public function index()
    {
        $projects = $this->Projects->findProject($this->user->getId());
        $updated_project = $this->Projects->findLastModified($this->user->getId());
        $this->render("admin.projects.index", compact("projects", "updated_project"));
    }

    public function  add()
    {
        $login_error ="";
        //Traitement des informations en $_POST
        if(isset($_POST) && !empty($_POST))
        {
            $today      = date("Y-m-d H:i:s");
            $is_inserted= $this->Projects->insert(
                ["name"=>$_POST['project_name'],
                    "description"=>'il faut écrire quelque chose ici',
                    "create_at"=>$today,
                    'modified_at'=>$today,
                    'picture'=>'images/projects/ps.jpg',
                    'users'=>$this->user->getId()]);
            if($is_inserted)
            {
                return $this->index();
            }else
            {
                $login_error =  "<div class=\"alert alert-warning\" align='center'>Erreur pendant l'enregistrement.</div>";
            }
        }
        header('location:/admin-projects-index');
    }

    public function  edit()
    {
        $login_error ="";
        //Traitement des informations en $_POST
        $project = $this->Projects->find($_GET['id']);
        if(isset($_POST) && !empty($_POST))
        {
            $today      = date("Y-m-d H:i:s");
            $is_inserted= $this->Projects->update(
                ["name"=>$_POST['project_name'],
                    "description"=>'Tableau modifié',
                    "create_at"=>$today,
                    'modified_at'=>$today,
                    'picture'=>'images/projects/ps.jpg',
                    'users'=>$this->user->getId()]);
            if($is_inserted)
            {
                return $this->index();
            }else
            {
                $login_error =  "Erreur pendant l'enregistrement";
            }

        }

        $this->render('admin.projects.edit', compact('project','login_error'));

    }

    public function delete() {

        //TODO - mettre en place l'envoi de ce message du retour
        $login_error ="";
        //Traitement des informations en $_POST
        if(isset($_POST['id']) && !empty($_POST['id']))
        {
            $id = $_POST['id'];
            $today      = date("Y-m-d H:i:s");
            $is_inserted= $this->Projects->delete($id);

            if(!$is_inserted)
            {
                $login_error =  "Erreur pendant la suppresion du tableau";
            }else {
                $login_error =  "Ajout du tableau avec succès";
            }
        }

        $this->index();
    }

//
//    public function add() {
//        if (isset($_POST) && !empty($_POST)) {
//
//            $project_name = htmlentities($_POST['project_name']);
//            $project = new Projects();
//            $project->setName($project_name)
//                ->setPicture("images/projects/ps.jpg")
//                ->setUser($this->user->getId())
//                ->setDescription("quelque chose à adapter");//TODO - to set on front-end
//            $this->Projects->insert($project);
//
//            die();
//        }
//    }
    public function show()
    {
        $project = $this->Projects->find($_GET['id']);
        $lists = $this->Lists->findList($project->getId());
        foreach ($lists as $list) {

            $list->setTasks($this->Tasks->findTask($list->getId()));
            /* TODO chercher le lead de chaque tâche
            $list->setLead($this->Users->find($list->getLead()));
            */
        }

        $this->render("admin.projects.show", compact('project', 'lists'));
    }
}
