<?php


namespace app\Controller\Admin;


use app\App;
use app\Entity\Lists;
use app\Entity\Projects;

class ProjectsController extends AppController
{

    private $error_message = "";

    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Projects");
        $this->loadModel("Users");
        $this->loadModel("Lists");
        $this->loadModel("Tasks");
        $this->loadModel("Stickers");
    }

    public function index()
    {
        $projects = $this->Projects->findProject($this->user->getId());
        $updated_project = $this->Projects->findLastModified($this->user->getId());
        $message = $this->error_message;
        App::getInstance()->titre = "Mes tableaux";

        $this->render("admin.projects.index", compact("projects", "updated_project", "message"));
    }

    public function  add()
    {
        $login_error ="";
        //Traitement des informations en $_POST
        if(isset($_POST["project_name"]) && !empty($_POST["project_name"]))
        {
            $today      = date("Y-m-d H:i:s");
            $is_inserted= $this->Projects->insert(
                ["name"=>$_POST['project_name'],
                    "description"=>'Votre description du projet',
                    'picture'=>'images/projects/ps.jpg',
                    'users'=>$this->user->getId()]);
            $current_project_id  = $this->Projects->getLastId();

            //Creat 3 defaults lists form each project created
            $default_list_title = ["A faire","En cours", "Terminé"];
            foreach ($default_list_title as $default_title) {
                $this->Lists->insert([
                    "name"=>$default_title,
                    "description"=>"A compléter",
                    "project"=>$current_project_id
                ]);
            }

            if($is_inserted)
            {
                return $this->index();
            }else
            {
                $login_error =  "<div class=\"alert alert-warning\" align='center'>Erreur pendant l'enregistrement.</div>";
            }
        } else {
            $this->error_message =  "Oups .. Merci d'indiquer un nom de projet.";
        }
        return $this->index();
    }

    public function  edit()
    {
        $login_error ="";
        //Traitement des informations en $_POST
        $project = $this->Projects->find($_GET['id']);
        if(isset($_POST) && !empty($_POST))
        {
            $today      = date("Y-m-d H:i:s");
            $is_inserted= $this->Projects->update($_GET['id'],
                ["name"=>$_POST['project_name'],
                    "description"=>'Tableau modifié',
                    "create_at"=>$today,
                    'modified_at'=>$today,
                    'picture'=>'images/projects/ps.jpg',
                    'users'=>$this->user->getId()]);

            if($is_inserted)
            {
                return $this->index();
            } else {
                $login_error =  "Erreur pendant l'enregistrement";
            }

        }
        $method = "edit&id=".$project->getId();
        $this->render('admin.projects.edit', compact('project','login_error','method'));

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

    public function show()
    {
        $project = $this->Projects->find($_GET['id']);

        if ($project) {
            $lists = $this->Lists->findList($project->getId());
            foreach ($lists as $list) {

                $list->setTasks($this->Tasks->findTask($list->getId()));
                $tasks = $list->getTasks();
                // TODO prepare members for each task
                foreach ($tasks as $task) {
                    $task->setCreatedByObj($this->Users->find($task->getCreatedBy()));
                    $task->setStickerObj($this->Stickers->find($task->getSticker()));
                }
            }

            $stickers = $this->Stickers->findAll();
            App::getInstance()->titre = "Tableau ".$project->getName();
            $this->render("admin.projects.show", compact('project', 'lists', 'stickers'));
        }else {
            $this->index();
        }
    }
}
