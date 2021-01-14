<?php

namespace App\Controller\Admin;
use Core\Controller\Controller;

use App;
use Core\HTML\BootstrapForm;
use Core\Auth\DatabaseAuth;

class  AdminController extends  AppController
{

    private $db_name;
    public function __construct()
    {
        parent::__construct();

    }

    public function  index()
    {
        /*if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
            $message="Administrateur";
            $this->render('admin.admin.index',compact('message'));
            exit(0);
        }
        $message="Administrateur";
        $this->render('index',compact('message'));*/
    }

    public function  module()
    {
        echo "module";
    }

    public function  tutoriel()
    {
        echo "tutoriels";
    }
}

?>
