<?php


namespace app\Controller\Admin;


use app\Entity\Lists;
use app\Entity\Projects;

class ListsController extends AppController
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
        var_dump("List/index");
        die();
    }

    /**
     * @brief Method used for ajax request POST
     */
    public function  addAjax()
    {
        $login_error ="";

        //Traitement des informations en $_POST
        if(isset($_POST) && !empty($_POST) && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']))
        {
            $is_inserted= $this->Lists->insert(
                ["name"=>$_POST['name'],
                    "description"=>$_POST['description'],
                    "project"=>$_GET['id'],
                    "orders"=>$this->user->getId()]);

            if($is_inserted){
                $login_error = "success";
            }else {
                $login_error = "error";
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
