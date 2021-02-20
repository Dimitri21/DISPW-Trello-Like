<?php


namespace app\Controller\Admin;


use app\App;
use app\Entity\Lists;
use app\Entity\Projects;

class ListsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Projects");
        $this->loadModel("Users");
        $this->loadModel("Lists");
        $this->loadModel("Tasks");
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
            $is_updated = $this->Lists->update(htmlentities($_GET['id']),[
                "name"=>htmlentities($_POST['name']),
                "description"=>htmlentities($_POST['description']),
                "modified_at"=>$today,
                "orders"=>$_POST['orders']<0?0: htmlentities($_POST['orders'])
            ]);

            if ($is_updated) {
                $this->redirect("/admin-projects-show&id=".htmlentities($_POST['project_id']));
            }else {
                $return_message = "Erreur lors d'actualisation de la liste";
            }
        }
        $list = $this->Lists->find(htmlentities($_GET['id']));
        //Update project attribut info
        $list->setProjectObj($this->Projects->find($list->getProject()));
        App::getInstance()->titre = "Edition de la liste ".$list->getName();
        $this->render('admin.lists.edit', compact('list', 'return_message'));
    }

    public function delete()
    {
        $message = "Erreur lors de suppression de la liste";
        if (isset($_GET['id']) && !empty($_GET['id']) &&
            isset($_GET['proj']) && !empty($_GET['proj'])) {
            if ($this->Lists->delete(htmlentities($_GET['id']))) {
                //TODO message to set in session
                $message = "suppression de la liste avec succès";
            }
            $this->redirect("/admin-projects-show&id=".htmlentities($_GET['proj']));
        }
        $this->redirect("/admin-project-index");
    }

    public function show()
    {
        var_dump("List/show");
        die();
    }
}
