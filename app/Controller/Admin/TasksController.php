<?php

namespace app\Controller\Admin;

use app\App;
use app\Entity\Lists;
use app\Entity\Projects;
use app\Entity\Tasks;

class TasksController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel("Users", 'sprinto');
        $this->loadModel("Tasks", 'sprinto');
        $this->loadModel("Lists", 'sprinto');
        $this->loadModel("Stickers", 'sprinto');
        $this->loadModel("Comments", 'sprinto');
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
        if (
            isset($_POST) && !empty($_POST) && isset($_GET['id']) &&
            !empty($_GET['id']) && is_numeric($_GET['id'])
        ) {
            $today          = date("Y-m-d H:i:s");
            $sticker        = 1;
            $is_inserted    = $this->Tasks->insert(
                [
                    "name" => $_POST['name'],
                    "description" => $_POST['description'],
                    "created_by" => $this->user->getId(),
                    "created_at" => $today,
                    "modified_at" => $today,
                    "start_at" => $today,
                    "end_at" => $today,
                    "sticker" => $_POST['sticker']?? 1,
                    "lists" => $_GET['id']
                ]
            );
            $members        = ['LastName NAME1'];
            if ($is_inserted) {
                $last_id = $this->Tasks->getLastId();
                $sticker = $this->Stickers->find(htmlentities($_POST['sticker']));
                $return_message['task_id']  = $last_id;
                $return_message['status']   = "success";
                $return_message['name']     = htmlentities($_POST['name']);
                $return_message['user']     = strtoupper($this->user->getName()) . " " . ucfirst($this->user->getLastname());
                $return_message['picture']  = $this->user->getPicture();
                $return_message['members']  = $members;
                $return_message['sticker']  = $sticker->getName();
                $return_message['project_id']  = htmlentities($_POST['project_id']);
                $return_message['message']  = "Tâche créée avec succès!";
            } else {
                $return_message['status']   = "success";
                $return_message['message']  = "Erreur lors de création de tâche";
            }
        }

        echo json_encode($return_message);
        exit(0);
    }

    public function  edit()
    {
        $error_message  = "";
        //Traitement des informations en $_POST
        $task           = null;

        if (isset($_POST) && !empty($_POST)) {
            $today      = date("Y-m-d H:i:s");
            $is_inserted = $this->Tasks->update(
                $_GET['id'],
                [
                    "name" => $_POST['name'],
                    "description" => $_POST['description'],
                    "end_at" => $_POST['end_at'],
                    'modified_at' => $today,
                    'sticker' => $_POST['sticker'],
                    'lists' => $_POST['list']
                ]
            );

            if ($is_inserted) {
                $this->redirect("/admin-projects-show&id={$_POST['project_id']}");
            } else {
                $login_error =  "Erreur pendant la modification de la tâche";
            }
        }

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $task =  $this->Tasks->find($_GET['id']);
        }

        if ($task) {
            $task->setCreatedByObj($this->Users->find($task->getCreatedBy()));
            $task->setComments($this->Comments->findBy($task->getId()));
            foreach ($task->getComments() as $comment) {
                $comment->setUserObj($this->Users->find($comment->getUser()));
            }
        }

        $method     = "edit&id=" . $task->getId();
        $stickers   = $this->Stickers->findAll();
        $project_id = $_GET['proj'];
        $lisks      = $this->Lists->findList($project_id);
        App::getInstance()->titre = "Edition de la tâche";
        $this->render('admin.tasks.edit', compact('task', 'error_message', 'method', 'stickers','lisks',"project_id"));
    }

    public function delete()
    {
        $return_message = "";
        $return_message ="Erreur lors de suppresion de la tâche";
        if (isset($_POST['task_id']) && !empty($_POST['task_id'])) {
            $is_deleted = $this->Tasks->delete($_POST['task_id']);
            if ($is_deleted) {
                $return_message ="Tâche supprimée avec succès";
            }
        }
        //TODO set session buffer for the message string
        return $this->redirect("/admin-projects-show&id=".$_POST['project_id']);
    }

    /**
     * @brief this function is called used Ajax method
     */
    public function comment()
    {
        $return_message = ["status"=>'',"message"=>''];
        if (isset($_POST['comment']) && !empty($_POST['comment'])) {
            $today      = date("Y-m-d H:i:s");
            $date       = date("d/m/Y H:i:s");
            $is_inserted = $this->Comments->insert([
                "comment"=> $_POST['comment'],
                "created_at"=>$today,
                "user"=>$this->user->getId(),
                "task"=>$_GET["id"]
            ]);

            if ($is_inserted) {

                $return_message['status'] = "success";
                $return_message['message'] ="Commentaire ajouté avec succès";
                $return_message['user'] = substr($this->user->getName(),0,1);
                $return_message['comment'] = $_POST['comment'];
                $return_message['date'] = explode(" ",$date)[0];
                $return_message['time'] = explode(" ",$date)[1];
            }else {
                $return_message['status'] = "error";
                $return_message['message'] = "Une erreur lors vient d'être detectée";
            }
        }
        echo json_encode($return_message);
    }

    public function show()
    {
        var_dump("List/show");
        die();
    }
}
