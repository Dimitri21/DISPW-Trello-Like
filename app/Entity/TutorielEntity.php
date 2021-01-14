<?php
namespace App\Entity;

use \Core\Entity\Entity;

class  TutorielEntity extends Entity
{
    public  function  getUrl()
    {
        return 'index.php?p=tutoriels.show&id='.$this->id_tuto;
    }

    public function  getExtrait()
    {
        $html = '<p>'.substr($this->title,0,50).'...</p>';
        $html .= '<p class="btn btn-success"><a href="'.$this->getUrl().'">Voir la suite</a></p>';
        return $html;
    }

    public function  getAuteur()
    {
        return $this->auteur;
    }

    //To modifiy according your Entity attributes

}


?>