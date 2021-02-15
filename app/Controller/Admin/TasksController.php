<?php


namespace app\Controller\Admin;


use app\Entity\Lists;
use app\Entity\Projects;
use app\Entity\Tasks;

class TasksController extends AppController
{

    private $user = null;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Users", 'sprinto');
        $this->loadModel("Tasks", 'sprinto');
        $this->user = unserialize($_SESSION['user']);
    }

    public function index()
    {
        var_dump("List/index");
        die();
    }

    /**
     * @brief Method used for ajax request POST
     */
    public function  addAjax()
    {
        $return_message = [];
        //Traitement des informations en $_POST
        if(isset($_POST) && !empty($_POST) && isset($_GET['id']) &&
            !empty($_GET['id']) && is_numeric($_GET['id']))
        {
            $today          = date("Y-m-d H:i:s");
            $sticker        = 1;
            $is_inserted    = $this->Tasks->insert(
                ["name"=>$_POST['name'],
                    "description"=>$_POST['description'],
                    "created_by"=>$this->user->getId(),
                    "created_at"=>$today,
                    "modified_at"=>$today,
                    "start_at"=>$today,
                    "end_at"=>$today,
                    "sticker"=>$sticker,
                    "lists"=>$_GET['id']]);
            $members        = ['LastName NAME1'];
            if($is_inserted){
                $return_message['id']       = $this->Tasks->getLastId();
                $return_message['status']   = "success";
                $return_message['name']     = $_POST['name'];
                $return_message['user']     = strtoupper($this->user->getName()) . " ".ucfirst($this->user->getLastname());
                $return_message['picture']  = $this->user->getPicture();
                $return_message['members']  = $members;
                $return_message['sticker']  = Tasks::STICKERS[$sticker-1];
                $return_message['message']  = "Tâche créée avec succès!";
            }else {
                $return_message['status']   = "success";
                $return_message['message']  = "Erreur lors de création de tâche";
            }
        }

        echo json_encode($return_message);
        exit(0);
    }

    public function  edit()
    {
        $error_message ="";
        //Traitement des informations en $_POST
        $task = $this->Tasks->find($_GET['id']);
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

    public function delete() 
    {
        var_dump("List/del");
        die();
    }

    public function show()
    {
        var_dump("List/show");
        die();
    }
}
