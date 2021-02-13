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
        $login_error = [];
        //Traitement des informations en $_POST
        if(isset($_POST) && !empty($_POST) && isset($_GET['id']) &&
            !empty($_GET['id']) && is_numeric($_GET['id']))
        {
            $today      = date("Y-m-d H:i:s");
            $sticker = 1;
            $is_inserted= $this->Tasks->insert(
                ["name"=>$_POST['name'],
                    "description"=>$_POST['description'],
                    "created_by"=>$this->user->getId(),
                    "created_at"=>$today,
                    "modified_at"=>$today,
                    "start_at"=>$today,
                    "end_at"=>$today,
                    "sticker"=>$sticker,
                    "lists"=>$_GET['id']]);
            $members = ['LastName NAME1'];
            if($is_inserted){
                $login_error['status'] = "success";
                $login_error['name'] = htmlspecialchars($_POST['name']);
                $login_error['user'] = strtoupper($this->user->getName()) . " ".ucfirst($this->user->getLastname());
                $login_error['picture'] = $this->user->getPicture();
                $login_error['members'] = $members;
                $login_error['sticker'] = Tasks::STICKERS[$sticker-1];
                $login_error['message'] = "Tâche créée avec succès!";

            }else {
                $login_error['status'] = "success";
                $login_error['message'] = "Erreur lors de création de tâche";
            }
        }

        echo json_encode($login_error);
        exit(0);
    }

    public function  edit()
    {
        var_dump("List/edi");
        die();
    }

    public function delete() {
        var_dump("List/del");
        die();
    }

    public function show()
    {
        var_dump("List/show");
        die();
    }
}
