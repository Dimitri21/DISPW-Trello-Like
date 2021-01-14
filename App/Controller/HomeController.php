<?php
namespace App\Controller;

use Core\Controller\Controller;



class homeController extends AppController{
 

	private $db_name="trello_like"; 

	public function __construct(){
		parent::__construct();
	}


	public function index($null=null){

	     $message='<div class="container">';
	     $message.='<p class="text-center" style="font-size:1.9rem; font-family:sans-serif;color:#0099CC"> Welcome into '.__CLASS__.'</p>';
	     $message.='<p align="center"><img class="thumbnail" src="https://www.fondationbiodiversite.fr/wp-content/uploads/2019/05/Ecosystemes-forestiers-Nathan-Horrenberger.jpg" alt="les écosystèmes forestiers"></p>';
	     $message.='</div>';

		$this->render('home.index',compact('message'));
	}


}

?> 

