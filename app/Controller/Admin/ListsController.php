<?php


namespace app\Controller\Admin;


use app\Entity\Lists;
use app\Entity\Projects;

class ListsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Projects", 'sprinto');
        $this->loadModel("Users", 'sprinto');
        $this->loadModel("Lists", 'sprinto');
        $this->loadModel("Tasks", 'sprinto');
    }

    /**
     * @brief Method used for ajax request POST
     */
    public function  addAjax()
    {
        $return_message = [];

        //Traitement des informations en $_POST
        if (isset($_POST) && !empty($_POST) && isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
            $is_inserted = $this->Lists->insert(
                [
                    "name" => $_POST['name'],
                    "description" => $_POST['description'],
                    "project" => $_GET['id'],
                    "orders" => $this->user->getId()
                ]
            );
            if ($is_inserted) {
                $return_message['status'] = "success";
                $return_message['id'] = $this->Lists->getLastId();
                $return_message['message'] = "Liste créée avec succès!";
            } else {
                $return_message['status'] = "error";
                $return_message['message'] = "Erreur lors de création d'une liste";
            }
        }

        echo json_encode($return_message);
        exit(0);
    }

    public function  edit()
    {
        $return_message = "";
        //Traitement des informations en $_POST
        if (isset($_POST) && !empty($_POST)) {
            $today      = date("Y-m-d H:i:s");
            $is_updated = $this->Lists->update($_GET['id'],[
                "name"=>$_POST['name'],
                "description"=>$_POST['description'],
                "modified_at"=>$today,
                "orders"=>$_POST['orders']
            ]);

            if ($is_updated) {
                $this->redirect("/admin-projects-show&id=".$_POST['project_id']);
            }else {
                $return_message = "Erreur lors d'actualisation de la liste";
            }
        }
        $list = $this->Lists->find($_GET['id']);
        //Update project attribut info
        $list->setProjectObj($this->Projects->find($list->getProject()));
        $this->render('admin.lists.edit', compact('list', 'return_message'));
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
