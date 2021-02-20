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
        $this->loadModel("Members");
    }

    public function index()
    {
        $projects = $this->Projects->findProject($this->user->getId());
        $projects_like_Member = $this->Projects->findProjectLikeMember($this->user->getId());
        $updated_project = $this->Projects->findLastModified($this->user->getId());
        $message = $this->error_message;
        App::getInstance()->titre = "Mes tableaux";

        $this->render("admin.projects.index", compact("projects", "updated_project", "message","projects_like_Member"));
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

        //TODO - Faire les requetes sur ces 3 variables
        $out_date       = 0;
        $project_message= 0;
        $warning_date   = 0;
        $today          = date("Y-m-d H:i:s");
        $now            = new \DateTime($today);


        if ($project) {
            $lists = $this->Lists->findList($project->getId());
            foreach ($lists as $list) {

                $list->setTasks($this->Tasks->findTask($list->getId()));
                $tasks = $list->getTasks();
                foreach ($tasks as $task) {

                    $task->setCreatedByObj($this->Users->find($task->getCreatedBy()));
                    $task->setStickerObj($this->Stickers->find($task->getSticker()));
                    $end_at = new \DateTime($task->getEndAt());
                    $diff = date_diff($end_at,$now);
                    if ($diff->y == 0 && $diff->m == 0 && $diff->days == 0 && $task->getStickerObj()->getName()!=="closed") {
                        $out_date       += 1;
                    }else if ($diff->y == 0 && $diff->m == 0 && $diff->days <=2 && $task->getStickerObj()->getName()!=="closed") {
                        $warning_date   +=1 ;
                    }
                }
            }

            $stickers = $this->Stickers->findAll();
            App::getInstance()->titre = "Tableau ".$project->getName();
            $this->render("admin.projects.show",
                compact('project', 'lists',
                    'stickers','out_date','project_message',
                "warning_date"));
        }else {
            $this->index();
        }
    }

    /**
     * @brief insertion as member
     */
    public function member() {
        $return_message = [];
        if (isset($_POST['project_id']) && !empty($_POST['project_id'])) {
            $members = $_POST;
            $project_id = $_POST['project_id'];
            $role = $_POST['role'];
            unset($members['role']);
            unset($members['project_id']);
            unset($members['member_name']);
            $today      = date("Y-m-d H:i:s");
            foreach ($members as $member_id) {
                $user = $this->Users->find($member_id);
                if ($user) {
                    $is_inseted = $this->Members->insert([
                        "user"=>$member_id,
                        "project"=>$project_id,
                        "role"=>$role,
                        "invited_at"=>$today
                    ]);
                    if ($is_inseted) {
                        $return_message[] = $user->getNames()." ajouté(e) tant que membre";
                    }else {
                        $return_message[] = $user->getNames()." n'est pas ajouté(e) tant que membre";
                    }
                }
            }
        }
        $this->redirect("/admin-projects-show&id=".$project_id);
    }

    public function all() {
        $return_value = ["status"=>"error","users"=>[], "message"=> "Une erreur vient d'être detectée"];
        if (isset($_POST['message'])) {
            $users = $this->Users->findAll();
            foreach ($users as $user) {
                $return_value["users"][] = ["id"=>$user->getId(), "name"=> $user->getNames()];
            }
            $return_value['status'] = "success";
            unset($return_value['message']);
        }
        echo json_encode($return_value);
    }

    /**
     * @brief show all member of this project
     * @cond $project_id in $_GET['id']
     */
    public function members() {
        $users = [];
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $users = $this->Users->findMembers(htmlentities($_GET['id']));
        }
        $bootstrap = true;
        $project_id = htmlspecialchars($_GET['id']);
        $this->render("admin.projects.members", compact("bootstrap","users","project_id"));
    }

    /**
     * @brief Found all lists of this project
     */
    public function lists() {
        $lists= [];
        if (isset($_GET) && !empty($_GET['id'])) {
            $lists = $this->Lists->findList(htmlentities($_GET['id']));
        }
        $bootstrap = true;
        $project_id = htmlspecialchars($_GET['id']);
        $this->render("admin.projects.lists", compact("lists","bootstrap","project_id"));
    }

    public function del_member() {
        //TODO - have to send this message
        $message = "Erreur lors de suppresion";

        if (isset($_REQUEST['id']) && isset($_REQUEST['project_id'])) {
            $is_removed = $this->Members->deleteMember(htmlspecialchars($_REQUEST['id']),htmlspecialchars($_REQUEST['project_id']));
            if ($is_removed) {
                $message = "Suppresion avec succès";
            }
            $this->redirect("admin-projects-members&id=".$_REQUEST['project_id']);
        }
        $this->redirect("admin-projects-index");
    }
}
